<?php


/*
 * JulLocationBundle Symfony package.
 *
 * © 2013 Julien Tord <http://github.com/youlweb/JulLocationBundle>
 *
 * Full license information in the LICENSE text file distributed
 * with this source code.
 *
 */

namespace Jul\LocationBundle\Model;

use Symfony\Component\Validator\Constraints as Assert;

abstract class Country
{
    /**
     * @var int
     */
    protected $id = null;

    /**
     * @var string
     * @Assert\NotBlank(groups={"country_name"})
     */
    protected $name = null;

    /**
     * @var string
     * @Assert\NotBlank(groups={"country_short_name"})
     */
    protected $short_name = null;

    /**
     * @var string
     */
    protected $slug = null;

    /**
     * @var float
     * @Assert\NotBlank(groups={"country_latitude"})
     */
    protected $latitude = null;

    /**
     * @var float
     * @Assert\NotBlank(groups={"country_longitude"})
     */
    protected $longitude = null;

    /**
     * @var string
     * @Assert\NotBlank(groups={"country_iso"})
     */
    protected $iso = null;

    /*
     * --------------------------------------------------------
     */

    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name.
     *
     * @param string $name
     *
     * @return Country
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set short_name.
     *
     * @param string $shortName
     *
     * @return Country
     */
    public function setShortName($shortName)
    {
        $this->short_name = $shortName;

        return $this;
    }

    /**
     * Get short_name.
     *
     * @return string
     */
    public function getShortName()
    {
        return $this->short_name;
    }

    /**
     * Set slug.
     *
     * @param string $slug
     *
     * @return Country
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get slug.
     *
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set latitude.
     *
     * @param float $latitude
     *
     * @return Country
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;

        return $this;
    }

    /**
     * Get latitude.
     *
     * @return float
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * Set longitude.
     *
     * @param float $longitude
     *
     * @return Country
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;

        return $this;
    }

    /**
     * Get longitude.
     *
     * @return float
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * Set iso
     *
     * @param string $iso
     *
     * @return Country
     */
    public function setIso($iso)
    {
        $this->iso = $iso;

        return $this;
    }

    /**
     * Get iso
     *
     * @return string
     */
    public function getIso()
    {
        return $this->iso;
    }

    /**
     * Return string value.
     *
     * @return string
     */
    public function __toString()
    {
        return $this->getName();
    }
}
