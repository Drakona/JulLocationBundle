<?php

namespace Jul\LocationBundle\Renderer;

class TwigRenderer implements RendererInterface
{
    /**
     * @var \Twig_Environment
     */
    private $environment;
    private $matcher;
    private $defaultOptions;
    private $bundleOptions;

    /**
     * @param \Twig_Environment $environment
     * @param string            $template
     * @param array             $bundleOptions
     * @param array             $defaultOptions
     */
    public function __construct(\Twig_Environment $environment, $template, array $bundleOptions = [], array $defaultOptions = [])
    {
        $this->environment    = $environment;
        $this->bundleOptions  = $bundleOptions;
        $this->defaultOptions = array_merge([
            'template'        => $template,
            'locationForm'    => null,
            'zoomDefault'     => 3,
            'zoomResolved'    => 17,
            'latitude'        => 45,
            'longitude'       => 0,
            'mapDiv'          => 'map_canvas',
            'mapOptions'      => [],
            'acFields'        => null,
            'addressFallback' => false,
            'maxImageWidth'   => 200,
            'maxImageHeight'  => 200,
        ], $defaultOptions);
    }

    public function render(array $options = [])
    {
        $options = $this->handleOptions($options);

        return $this->environment->render($options['template'], $options);
    }

    protected function handleOptions($options = [])
    {
        $options         = array_merge($this->defaultOptions, $options);

        $locationForm    = $options['locationForm'];
        $zoomResolved    = $options['zoomResolved'];
        $zoomDefault     = $options['zoomDefault'];
        $latitude        = $options['latitude'];
        $longitude       = $options['longitude'];
        $mapDiv          = $options['mapDiv'];
        $mapOptions      = $options['mapOptions'];
        $acFields        = $options['acFields'];
        $addressFallback = $options['addressFallback'];
        $maxImageWidth   = $options['maxImageWidth'];
        $maxImageHeight  = $options['maxImageHeight'];
        $template        = $options['template'];

        /*
         * Find top level entity
         */
        $locationTypes = array('location', 'city', 'state', 'country');

        foreach ($locationTypes as $locationType) {
            if (array_key_exists($locationType, $locationForm->children)) {
                $topLevel = $locationType;

                $topLevelForm = $locationForm->children[$topLevel];

                break;
            }

            if ($locationForm->children['blockPrefix'] == 'Jul'.ucfirst($locationType).'Field') {
                $topLevel = $locationType;
                $topLevelForm = $locationForm;

                break;
            }
        }

        /*
         * Top level not found
         */

        if (!isset($topLevel)) {
            throw new \Exception('There is no location field in the form sent to the controller JulLocationBundle:Googlemaps:placesAutocomplete');
        }

        /*
         * Default map center and zoom
         */
        if (array_key_exists('latitude', $topLevelForm->children) && ($latForm = $topLevelForm->children['latitude']->vars['value']) != 0) {
            /*
             * If the form has been sent with a location
             */
            $latitude = $latForm;

            $longitude = $topLevelForm->children['longitude']->vars['value'];

            $zoomDefault = $zoomResolved;
        }

        /*
         * Default map options array
         */
        $mapOptions = array_merge(array(
            'zoom' => $zoomDefault,
        ), $mapOptions);

        /*
         * Default autocomplete input field
         */
        if (!isset($acFields[0]['acInput'])) {
            $acFields[0]['acInput'] = (array_key_exists('long_name', $topLevelForm->children)) ? $topLevelForm->children['long_name']->vars['id'] : $topLevelForm->children['name']->vars['id'];
        }

        /*
         * Default autocomplete Types
         */
        if (!isset($acFields[0]['acOptions']['types'])) {
            switch ($topLevel) {
                case 'location':
                    $acFields[0]['acOptions']['types'] = array('establishment');
                    break;
                case 'city':
                    $acFields[0]['acOptions']['types'] = array('(cities)');
                    break;
                default:
                    $acFields[0]['acOptions']['types'] = array('(regions)');
            }
        }

        /*
         * Address autocomplete fallback
         */
        if ($addressFallback && $topLevel == 'location' && !isset($acFields[1]['acInput']) && array_key_exists('long_address', $topLevelForm->children)) {
            $acFields[1]['acInput'] = (array_key_exists('long_name', $topLevelForm->children)) ? $topLevelForm->children['long_address']->vars['id'] : $topLevelForm->children['address']->vars['id'];
            $acFields[1]['acOptions']['types'] = array('geocode');
        }

        /*
         * Build javascript field IDs array using JulLocationBundle config
         */
        $jsFieldIds = array();
        $tmpLevel = $locationForm;

        foreach ($this->bundleOptions as $level => $options) {
            $fields = $options['fields'];
            $tmpArray = array();

            if (array_key_exists($level, $tmpLevel->children)) {
                $tmpLevel = $tmpLevel->children[$level];

                foreach ($fields as $field => $fieldArray) {
                    /*
                     * Check if field is active in config && exists in the form
                     */
                    if ($fieldArray['enabled'] && array_key_exists($field, $tmpLevel->children)) {
                        $tmpArray[$field] = $tmpLevel->children[$field]->vars['id'];
                    }
                }
            }

            $jsFieldIds[$level] = $tmpArray;
        }

        return [
            'mapDiv'         => $mapDiv,
            'mapOptions'     => json_encode($mapOptions),
            'acFields'       => json_encode($acFields),
            'topLevel'       => $topLevel,
            'zoomResolved'   => $zoomResolved,
            'latitude'       => $latitude,
            'longitude'      => $longitude,
            'jsFieldIds'     => json_encode($jsFieldIds),
            'maxImageWidth'  => $maxImageWidth,
            'maxImageHeight' => $maxImageHeight,
            'template'       => $template,
            'locationForm'   => $locationForm,
        ];
    }
}
