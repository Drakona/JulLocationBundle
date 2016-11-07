<?php

namespace Jul\LocationBundle\Form\Type;

class StateType extends LocationType
{
    public function getBlockPrefix()
    {
        return $this->getName();
    }

    public function getName()
    {
        return 'JulStateField';
    }
}
