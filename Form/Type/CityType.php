<?php

namespace Jul\LocationBundle\Form\Type;

class CityType extends LocationType
{
    public function getBlockPrefix()
    {
        return $this->getName();
    }

    public function getName()
    {
        return 'JulCityField';
    }
}
