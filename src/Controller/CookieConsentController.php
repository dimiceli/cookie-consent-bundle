<?php

namespace DiMiceli\CookieConsentBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CookieConsentController extends AbstractController
{
    #[Route('/cookie_consent_rgpd', name: 'dm_cookie_consent_view')]
    public function view()
    {
        return new Response("Bisous");
    }
}