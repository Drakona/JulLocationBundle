<?php

namespace Jul\LocationBundle\Twig;

class LocationExtension extends \Twig_Extension
{
    private $helper;

    /**
     * @param Helper $helper
     */
    public function __construct(Helper $helper)
    {
        $this->helper = $helper;
    }

    public function getFunctions()
    {
        return array(
             new \Twig_SimpleFunction('jul_location_render', array($this, 'render'), array('is_safe' => array('html'))),
        );
    }

    /**
     * Renders a menu with the specified renderer.
     *
     * @param ItemInterface|string|array $menu
     * @param array                      $options
     * @param string                     $renderer
     *
     * @return string
     */
    public function render(array $options = array())
    {
        return $this->helper->render($options);
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'jul_location';
    }
}
