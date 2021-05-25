<?php
/**
 *  This file is part of the Symfony package.
 *
 *  (c) Bruno Di Miceli <dimicelibruno@gmail.com>
 *
 *  For the full copyright and license information, please view the LICENSE
 *  file that was distributed with this source code.
 */

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
                    ->values(['bottom', 'top'])
                ->end()
            ->end();
        return $treeBuilder;
    }
}