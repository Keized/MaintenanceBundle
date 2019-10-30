<?php


namespace Keized\MaintenanceBundle\DependencyInjection;


use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder('keized_maintenance');

        $treeBuilder->getRootNode()
            ->children()
                ->scalarNode("template")->defaultValue(dirname(__DIR__) . "/Resources/views/maintenance.html")->end()
            ->end();
        return $treeBuilder;
    }
}
