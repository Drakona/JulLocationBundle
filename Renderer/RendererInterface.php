<?php

namespace Jul\LocationBundle\Renderer;

interface RendererInterface
{
    /**
     * @param array $options some rendering options
     *
     * @return string
     */
    public function render(array $options = array());
}
