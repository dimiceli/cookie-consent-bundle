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

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

class DMCookieConsentExtension extends Extension
{
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = $this->getConfiguration($configs, $container);
        $config = $this->processConfiguration($configuration, $configs);

        $loader = new XmlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.xml');

        $twigExtensionDefinition = $container->getDefinition('DiMiceli\CookieConsentBundle\Twig\DMCookieConsentExtension');
        $twigExtensionDefinition->setArgument(2, $config['show_title']);
    }
}
