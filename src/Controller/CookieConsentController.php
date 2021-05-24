<?php

namespace DiMiceli\CookieConsentBundle\Controller;

use DiMiceli\CookieConsentBundle\Form\CookieConsentType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CookieConsentController extends AbstractController
{
    public function view()
    {
        $form = $this->createForm(CookieConsentType::class, null, [
            'action' => $this->generateUrl('dm_cookie_consent_save'),
            'method' => 'POST'
        ]);
        return $this->render('@DMCookieConsent/cookie_consent.html.twig', ['cookie_consent_form' => $form->createView()]);
    }

    public function save()
    {
        return $this->json([]);
    }
}