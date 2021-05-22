<?php

namespace DiMiceli\CookieConsentBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class CookieConsentController extends AbstractController
{
    public function view()
    {
        return new Response("Bisous");
    }
}