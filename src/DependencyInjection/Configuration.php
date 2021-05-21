<?php

namespace DiMiceli\CookieConsentBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder('dimiceli_cookie_consent');
        $rootNode = $treeBuilder->getRootNode();
        $rootNode
            ->children()
                ->enumNode('position')
                    ->defaultValue('bottom')
                    ->values(['bottom', 'modal', 'top'])
                ->end()
            ->end();
        return $treeBuilder;
    }
}