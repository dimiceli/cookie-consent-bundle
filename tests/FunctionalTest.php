<?php
/**
 *  This file is part of the Symfony package.
 *
 *  (c) Bruno Di Miceli <dimicelibruno@gmail.com>
 *
 *  For the full copyright and license information, please view the LICENSE
 *  file that was distributed with this source code.
 */

namespace DiMiceli\CookieConsentBundle\Tests;

use DiMiceli\CookieConsentBundle\DMCookieConsentBundle;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpKernel\Kernel;

class DiMiceliCookieConsentTestingKernel extends Kernel
{
    public function registerBundles()
    {
        return [
            new DMCookieConsentBundle(),
        ];
    }

    public function registerContainerConfiguration(LoaderInterface $loader)
    {
    }
}

class FunctionalTest extends TestCase
{
    public function testServiceWiring()
    {
        $kernel = new DiMiceliCookieConsentTestingKernel("test", true);
        $kernel->boot();
        $container = $kernel->getContainer();

        $this->assertInstanceOf(ContainerInterface::class, $container);
    }
}