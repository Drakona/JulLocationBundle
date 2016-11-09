<?php

namespace Jul\LocationBundle\Form\Type;

class CountryType extends LocationType
{
    public function getBlockPrefix()
    {
        return $this->getName();
    }

    public function getName()
    {
        return 'JulCountryField';
    }
}
