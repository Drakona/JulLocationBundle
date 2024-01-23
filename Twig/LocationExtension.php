<?php

namespace Jul\LocationBundle\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class LocationExtension extends AbstractExtension
{
    private Helper $helper;

    public function __construct(Helper $helper)
    {
        $this->helper = $helper;
    }

    public function getFunctions(): array
    {
        return [
             new TwigFunction('jul_location_render', [$this, 'render'], ['is_safe' => ['html']]),
        ];
    }

    /**
     * Renders a menu with the specified renderer.
     *
     * @param array $options
     *
     * @return string
     */
    public function render(array $options = [])
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
