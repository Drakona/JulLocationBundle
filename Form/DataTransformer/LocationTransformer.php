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

namespace Jul\LocationBundle\Form\DataTransformer;

use Doctrine\ORM\EntityManagerInterface;
use Jul\LocationBundle\Repository\LocationRepository;
use Symfony\Component\Form\DataTransformerInterface;

class LocationTransformer implements DataTransformerInterface
{
    public function __construct(
        private readonly string $entityType,
        private readonly EntityManagerInterface $om,
        private readonly array $configOptions
    ) {
    }

    public function transform($value): mixed
    {
        if (null === $value) {
            return null;
        }

        return $value;
    }

    public function reverseTransform($value)
    {
        /*
         * Check if Entity exists if demanded in configuration (default true)
         */
        $locationRepository = new LocationRepository($this->entityType, $this->om, $this->configOptions);

        if (!$value->getId() || !$this->configOptions[$this->entityType]['update']) {
            $entityDB = $locationRepository->findEntityObject($value);

            if ($entityDB) {
                // if Location found in DB

                if ($this->om->contains($value)) {
                    /*
                     * if entity is managed (update process):
                     * - restore the managed entity to its original state to preserve its data content
                     * - return the DB entity
                     */
                    $this->om->refresh($value);
                }

                return $entityDB;
            } elseif ($this->om->contains($value)) {
                /*
                 * if Location is not found in DB, but entity is managed (update process):
                 * - clone the entity
                 * - free the original from management to preserve its data content
                 * - persist the clone
                 */
                $newEntity = clone $value;
                $newEntity->setSlug(null);    // to trigger Gedmo slug
                $this->om->detach($value);
                $value = $newEntity;
            }
        }

        $this->om->persist($value);

        return $value;
    }
}
