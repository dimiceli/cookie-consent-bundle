<?php
/**
 *  This file is part of the Symfony package.
 *  
 *  (c) Bruno Di Miceli <dimicelibruno@gmail.com>
 *  
 *  For the full copyright and license information, please view the LICENSE
 *  file that was distributed with this source code.
 */

namespace DiMiceli\CookieConsentBundle\Twig;

use DiMiceli\CookieConsentBundle\Cookie\CookieHandler;
use Symfony\Component\HttpFoundation\RequestStack;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class DMCookieConsentExtension extends AbstractExtension
{
    private $request;
    private $cookieHandler;

    public function __construct(RequestStack $requestStack, CookieHandler $cookieHandler)
    {
        $this->request = $requestStack->getMasterRequest();
        $this->cookieHandler = $cookieHandler;
    }

    public function getFunctions()
    {
        return [
            new TwigFunction('DMCookieConsentBundle_has_cookie_consent', [$this, 'hasCookieConsent']),
            new TwigFunction('DMCookieConsentBundle_has_not_cookie_consent', [$this, 'hasNotCookieConsent'])
        ];
    }

    public function hasCookieConsent()
    {
        return $this->cookieHandler->hasCookie($this->request);
    }

    public function hasNotCookieConsent()
    {
        return !$this->cookieHandler->hasCookie($this->request);
    }
}