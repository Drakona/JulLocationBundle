<?php

namespace Jul\LocationBundle\Twig;

use Jul\LocationBundle\Renderer\RendererInterface;

/**
 * Helper class containing logic to retrieve and render menus from templating engines
 *
 */
class Helper
{
    private $renderer;

    /**
     * @param RendererInterface  $renderer
     */
    public function __construct(RendererInterface $renderer)
    {
        $this->renderer = $renderer;
    }

    /**
     * @param array $options
     *
     * @return string
     *
     * @throws \InvalidArgumentException
     */
    public function render(array $options = array())
    {
        return $this->renderer->render($options);
    }
}
