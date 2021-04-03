<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Mime\Message;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    /**
     * @Route("/login", name="login")
     */
    public function login(AuthenticationUtils $authenticationUtils)
    {
        $error = $authenticationUtils->getLastAuthenticationError();
        $lastusername = $authenticationUtils->getLastUsername();
       /*  if($error['message'] ===  "Bad credentials.") {
            $error['message'] = 'Identifiant ou mot de passe invalides';
        } */
        return $this->render('security/index.html.twig', [
            'last_username' => $lastusername,
            'error' => $error
        ]);
    }
    
    
}