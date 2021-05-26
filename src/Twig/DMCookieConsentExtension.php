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
    private $showTitle;

    public function __construct(RequestStack $requestStack, CookieHandler $cookieHandler, bool $showTitle = true)
    {
        $this->request = $requestStack->getMasterRequest();
        $this->cookieHandler = $cookieHandler;
        $this->showTitle = $showTitle;
    }

    public function getFunctions()
    {
        return [
            new TwigFunction('DMCookieConsentBundle_has_cookie_consent', [$this, 'hasCookieConsent']),
            new TwigFunction('DMCookieConsentBundle_has_not_cookie_consent', [$this, 'hasNotCookieConsent']),
            new TwigFunction('DMCookieConsentBundle_show_title', [$this, 'showTitle']),
        ];
    }

    public function hasCookieConsent(): bool
    {
        return $this->cookieHandler->hasCookie($this->request);
    }

    public function hasNotCookieConsent(): bool
    {
        return !$this->cookieHandler->hasCookie($this->request);
    }

    public function showTitle(): bool
    {
        return $this->showTitle;
    }
}
