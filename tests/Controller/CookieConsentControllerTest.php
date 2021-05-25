<?php
/**
 *  This file is part of the Symfony package.
 *  
 *  (c) Bruno Di Miceli <dimicelibruno@gmail.com>
 *  
 *  For the full copyright and license information, please view the LICENSE
 *  file that was distributed with this source code.
 */

namespace DiMiceli\CookieConsentBundle\Tests\Controller;

use DiMiceli\CookieConsentBundle\DMCookieConsentBundle;
use PHPUnit\Framework\TestCase;
use Symfony\Bundle\FrameworkBundle\FrameworkBundle;
use Symfony\Bundle\FrameworkBundle\Kernel\MicroKernelTrait;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Routing\Loader\Configurator\RoutingConfigurator;

class CookieConsentControllerTest extends TestCase
{
    public function testView()
    {
        $kernel = new DiMiceliCookieConsentControllerKernel();
        $client = new KernelBrowser($kernel);
        $client->request('GET', '/gdpr/cookie-consent');
        $this->assertSame(200, $client->getResponse()->getStatusCode());
    }
}

class DiMiceliCookieConsentControllerKernel extends Kernel
{
    use MicroKernelTrait;

    public function __construct()
    {
        parent::__construct('test', true);
    }

    public function registerBundles()
    {
        return [
            new DMCookieConsentBundle(),
            new FrameworkBundle(),
        ];
    }

    protected function configureRoutes(RoutingConfigurator $routes)
    {
        $routes->import(__DIR__.'/../../src/Resources/config/routes.xml');
    }

    protected function configureContainer(ContainerBuilder $c, LoaderInterface $loader)
    {
        $c->loadFromExtension('framework', [
            'router' => ['utf8' => true]
        ]);
    }

    public function getCacheDir()
    {
        return __DIR__.'/../cache/'.spl_object_hash($this);
    }
}