<?php
/**
 *  This file is part of the Symfony package.
 *  
 *  (c) Bruno Di Miceli <dimicelibruno@gmail.com>
 *  
 *  For the full copyright and license information, please view the LICENSE
 *  file that was distributed with this source code.
 */

namespace DiMiceli\CookieConsentBundle\Cookie;

use Symfony\Component\HttpFoundation\Cookie;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class CookieHandler
{
    /**
     * @var string
     */
    private $cookieName;

    const COOKIE_NAME_DEFAULT = 'cookie-consent';

    /**
     * @var bool
     */
    private $secure = false;

    /**
     * @var bool
     */
    public $httpOnly = false;

    public function __construct(?string $cookieName = null, $secure = false, $httpOnly = false)
    {
        $this->cookieName = $cookieName ?? self::COOKIE_NAME_DEFAULT;
        $this->secure = $secure;
        $this->httpOnly = $httpOnly;
    }

    /**
     * Add the cookie consent header to the response
     */
    public function setCookie(Response $response): void
    {
        $response->headers->setCookie(Cookie::create(
            $this->cookieName,
            true,
            date_create(strtotime('+1 year')),
            '/',
            null,
            $this->secure,
            $this->httpOnly
        ));
    }

    /**
     * Check if the request has the cookie consent
     *
     * @param Request $request
     *
     * @return bool
     */
    public function hasCookie(Request $request): bool
    {
        return $request->cookies->has($this->cookieName);
    }
}
