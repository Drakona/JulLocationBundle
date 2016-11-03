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

namespace Jul\LocationBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('jul_location');

        $rootNode
            ->children()
                ->arrayNode('location')
                    ->addDefaultsIfNotSet()
                    ->children()
                        ->booleanNode('update')->defaultFalse()->end()
                        ->scalarNode('data_class')
                            ->defaultNull()
                        ->end()
                        ->arrayNode('fields')
                            ->addDefaultsIfNotSet()
                            ->children()
                                ->arrayNode('name')
                                    ->addDefaultsIfNotSet()
                                    ->children()
                                        ->booleanNode('enabled')->defaultTrue()->end()
                                        ->booleanNode('required')->defaultFalse()->end()
                                        ->booleanNode('identifier')->defaultTrue()->end()
                                        ->scalarNode('type')->defaultNull()->end()
                                        ->variableNode('options')->defaultValue(array())->end()
                                    ->end()
                                ->end()
                            ->end()
                            ->children()
                                ->arrayNode('long_name')
                                    ->addDefaultsIfNotSet()
                                    ->children()
                                        ->booleanNode('enabled')->defaultTrue()->end()
                                        ->booleanNode('required')->defaultFalse()->end()
                                        ->booleanNode('identifier')->defaultFalse()->end()
                                        ->scalarNode('type')->defaultNull()->end()
                                        ->variableNode('options')->defaultValue(array())->end()
                                    ->end()
                                ->end()
                            ->end()
                            ->children()
                                ->arrayNode('address')
                                    ->addDefaultsIfNotSet()
                                    ->children()
                                        ->booleanNode('enabled')->defaultTrue()->end()
                                        ->booleanNode('required')->defaultFalse()->end()
                                        ->booleanNode('identifier')->defaultFalse()->end()
                                        ->scalarNode('type')->defaultNull()->end()
                                        ->variableNode('options')->defaultValue(array())->end()
                                    ->end()
                                ->end()
                            ->end()
                            ->children()
                                ->arrayNode('long_address')
                                    ->addDefaultsIfNotSet()
                                    ->children()
                                        ->booleanNode('enabled')->defaultFalse()->end()
                                        ->booleanNode('required')->defaultFalse()->end()
                                        ->booleanNode('identifier')->defaultFalse()->end()
                                        ->scalarNode('type')->defaultNull()->end()
                                        ->variableNode('options')->defaultValue(array())->end()
                                    ->end()
                                ->end()
                            ->end()
                            ->children()
                                ->arrayNode('postcode')
                                    ->addDefaultsIfNotSet()
                                    ->children()
                                        ->booleanNode('enabled')->defaultTrue()->end()
                                        ->booleanNode('required')->defaultFalse()->end()
                                        ->booleanNode('identifier')->defaultFalse()->end()
                                        ->scalarNode('type')->defaultNull()->end()
                                        ->variableNode('options')->defaultValue(array())->end()
                                    ->end()
                                ->end()
                            ->end()
                            ->children()
                                ->arrayNode('latitude')
                                    ->addDefaultsIfNotSet()
                                    ->children()
                                        ->booleanNode('enabled')->defaultTrue()->end()
                                        ->booleanNode('required')->defaultFalse()->end()
                                        ->booleanNode('identifier')->defaultFalse()->end()
                                        ->scalarNode('type')->defaultValue('hidden')->end()
                                        ->variableNode('options')->defaultValue(array())->end()
                                    ->end()
                                ->end()
                            ->end()
                            ->children()
                                ->arrayNode('longitude')
                                    ->addDefaultsIfNotSet()
                                    ->children()
                                        ->booleanNode('enabled')->defaultTrue()->end()
                                        ->booleanNode('required')->defaultFalse()->end()
                                        ->booleanNode('identifier')->defaultFalse()->end()
                                        ->scalarNode('type')->defaultValue('hidden')->end()
                                        ->variableNode('options')->defaultValue(array())->end()
                                    ->end()
                                ->end()
                            ->end()
                            ->children()
                                ->arrayNode('image_url')
                                    ->addDefaultsIfNotSet()
                                    ->children()
                                        ->booleanNode('enabled')->defaultTrue()->end()
                                        ->booleanNode('required')->defaultFalse()->end()
                                        ->booleanNode('identifier')->defaultFalse()->end()
                                        ->scalarNode('type')->defaultValue('hidden')->end()
                                        ->variableNode('options')->defaultValue(array())->end()
                                    ->end()
                                ->end()
                            ->end()
                            ->children()
                                ->arrayNode('website_url')
                                    ->addDefaultsIfNotSet()
                                    ->children()
                                        ->booleanNode('enabled')->defaultTrue()->end()
                                        ->booleanNode('required')->defaultFalse()->end()
                                        ->booleanNode('identifier')->defaultFalse()->end()
                                        ->scalarNode('type')->defaultNull()->end()
                                        ->variableNode('options')->defaultValue(array())->end()
                                    ->end()
                                ->end()
                            ->end()
                            ->children()
                                ->arrayNode('phone')
                                    ->addDefaultsIfNotSet()
                                    ->children()
                                        ->booleanNode('enabled')->defaultTrue()->end()
                                        ->booleanNode('required')->defaultFalse()->end()
                                        ->booleanNode('identifier')->defaultFalse()->end()
                                        ->scalarNode('type')->defaultNull()->end()
                                        ->variableNode('options')->defaultValue(array())->end()
                                    ->end()
                                ->end()
                            ->end()
                        ->end()
                    ->end()
                ->end()
            ->end()
            ->children()
                ->arrayNode('city')
                    ->addDefaultsIfNotSet()
                    ->children()
                        ->booleanNode('update')->defaultFalse()->end()
                        ->scalarNode('data_class')
                            ->defaultNull()
                        ->end()
                        ->arrayNode('fields')
                            ->addDefaultsIfNotSet()
                            ->children()
                                ->arrayNode('name')
                                    ->addDefaultsIfNotSet()
                                    ->children()
                                        ->booleanNode('enabled')->defaultTrue()->end()
                                        ->booleanNode('required')->defaultFalse()->end()
                                        ->booleanNode('identifier')->defaultTrue()->end()
                                        ->scalarNode('type')->defaultNull()->end()
                                        ->variableNode('options')->defaultValue(array())->end()
                                    ->end()
                                ->end()
                            ->end()
                            ->children()
                                ->arrayNode('long_name')
                                    ->addDefaultsIfNotSet()
                                    ->children()
                                        ->booleanNode('enabled')->defaultFalse()->end()
                                        ->booleanNode('required')->defaultFalse()->end()
                                        ->booleanNode('identifier')->defaultFalse()->end()
                                        ->scalarNode('type')->defaultNull()->end()
                                        ->variableNode('options')->defaultValue(array())->end()
                                    ->end()
                                ->end()
                            ->end()
                            ->children()
                                ->arrayNode('latitude')
                                    ->addDefaultsIfNotSet()
                                    ->children()
                                        ->booleanNode('enabled')->defaultFalse()->end()
                                        ->booleanNode('required')->defaultFalse()->end()
                                        ->booleanNode('identifier')->defaultFalse()->end()
                                        ->scalarNode('type')->defaultValue('hidden')->end()
                                        ->variableNode('options')->defaultValue(array())->end()
                                    ->end()
                                ->end()
                            ->end()
                            ->children()
                                ->arrayNode('longitude')
                                    ->addDefaultsIfNotSet()
                                    ->children()
                                        ->booleanNode('enabled')->defaultFalse()->end()
                                        ->booleanNode('required')->defaultFalse()->end()
                                        ->booleanNode('identifier')->defaultFalse()->end()
                                        ->scalarNode('type')->defaultValue('hidden')->end()
                                        ->variableNode('options')->defaultValue(array())->end()
                                    ->end()
                                ->end()
                            ->end()
                        ->end()
                    ->end()
                ->end()
            ->end()
            ->children()
                ->arrayNode('state')
                    ->addDefaultsIfNotSet()
                    ->children()
                        ->booleanNode('update')->defaultFalse()->end()
                        ->scalarNode('data_class')
                            ->defaultNull()
                        ->end()
                        ->arrayNode('fields')
                            ->addDefaultsIfNotSet()
                            ->children()
                                ->arrayNode('name')
                                    ->addDefaultsIfNotSet()
                                    ->children()
                                        ->booleanNode('enabled')->defaultTrue()->end()
                                        ->booleanNode('required')->defaultFalse()->end()
                                        ->booleanNode('identifier')->defaultTrue()->end()
                                        ->scalarNode('type')->defaultNull()->end()
                                        ->variableNode('options')->defaultValue(array())->end()
                                    ->end()
                                ->end()
                            ->end()
                            ->children()
                                ->arrayNode('long_name')
                                    ->addDefaultsIfNotSet()
                                    ->children()
                                        ->booleanNode('enabled')->defaultFalse()->end()
                                        ->booleanNode('required')->defaultFalse()->end()
                                        ->booleanNode('identifier')->defaultFalse()->end()
                                        ->scalarNode('type')->defaultNull()->end()
                                        ->variableNode('options')->defaultValue(array())->end()
                                    ->end()
                                ->end()
                            ->end()
                            ->children()
                                ->arrayNode('short_name')
                                    ->addDefaultsIfNotSet()
                                    ->children()
                                        ->booleanNode('enabled')->defaultFalse()->end()
                                        ->booleanNode('required')->defaultFalse()->end()
                                        ->booleanNode('identifier')->defaultFalse()->end()
                                        ->scalarNode('type')->defaultNull()->end()
                                        ->variableNode('options')->defaultValue(array())->end()
                                    ->end()
                                ->end()
                            ->end()
                            ->children()
                                ->arrayNode('latitude')
                                    ->addDefaultsIfNotSet()
                                    ->children()
                                        ->booleanNode('enabled')->defaultFalse()->end()
                                        ->booleanNode('required')->defaultFalse()->end()
                                        ->booleanNode('identifier')->defaultFalse()->end()
                                        ->scalarNode('type')->defaultValue('hidden')->end()
                                        ->variableNode('options')->defaultValue(array())->end()
                                    ->end()
                                ->end()
                            ->end()
                            ->children()
                                ->arrayNode('longitude')
                                    ->addDefaultsIfNotSet()
                                    ->children()
                                        ->booleanNode('enabled')->defaultFalse()->end()
                                        ->booleanNode('required')->defaultFalse()->end()
                                        ->booleanNode('identifier')->defaultFalse()->end()
                                        ->scalarNode('type')->defaultValue('hidden')->end()
                                        ->variableNode('options')->defaultValue(array())->end()
                                    ->end()
                                ->end()
                            ->end()
                        ->end()
                    ->end()
                ->end()
            ->end()
            ->children()
                ->arrayNode('country')
                    ->addDefaultsIfNotSet()
                    ->children()
                        ->booleanNode('update')->defaultFalse()->end()
                        ->scalarNode('data_class')
                            ->defaultNull()
                        ->end()
                        ->arrayNode('fields')
                            ->addDefaultsIfNotSet()
                            ->children()
                                ->arrayNode('name')
                                    ->addDefaultsIfNotSet()
                                    ->children()
                                        ->booleanNode('enabled')->defaultTrue()->end()
                                        ->booleanNode('required')->defaultFalse()->end()
                                        ->booleanNode('identifier')->defaultTrue()->end()
                                        ->scalarNode('type')->defaultNull()->end()
                                        ->variableNode('options')->defaultValue(array())->end()
                                    ->end()
                                ->end()
                            ->end()
                            ->children()
                                ->arrayNode('short_name')
                                    ->addDefaultsIfNotSet()
                                    ->children()
                                        ->booleanNode('enabled')->defaultFalse()->end()
                                        ->booleanNode('required')->defaultFalse()->end()
                                        ->booleanNode('identifier')->defaultFalse()->end()
                                        ->scalarNode('type')->defaultNull()->end()
                                        ->variableNode('options')->defaultValue(array())->end()
                                    ->end()
                                ->end()
                            ->end()
                            ->children()
                                ->arrayNode('latitude')
                                    ->addDefaultsIfNotSet()
                                    ->children()
                                        ->booleanNode('enabled')->defaultFalse()->end()
                                        ->booleanNode('required')->defaultFalse()->end()
                                        ->booleanNode('identifier')->defaultFalse()->end()
                                        ->scalarNode('type')->defaultValue('hidden')->end()
                                        ->variableNode('options')->defaultValue(array())->end()
                                    ->end()
                                ->end()
                            ->end()
                            ->children()
                                ->arrayNode('longitude')
                                    ->addDefaultsIfNotSet()
                                    ->children()
                                        ->booleanNode('enabled')->defaultFalse()->end()
                                        ->booleanNode('required')->defaultFalse()->end()
                                        ->booleanNode('identifier')->defaultFalse()->end()
                                        ->scalarNode('type')->defaultValue('hidden')->end()
                                        ->variableNode('options')->defaultValue(array())->end()
                                    ->end()
                                ->end()
                            ->end()
                        ->end()
                    ->end()
                ->end()
            ->end()
        ->end()
        ;

        return $treeBuilder;
    }
}
