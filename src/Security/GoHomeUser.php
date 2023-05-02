<?php

namespace App\Security;

use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Security\Core\Security;


class GoHomeUser
{
    private $urlGenerator;
    private $user;

    public function __construct(UrlGeneratorInterface $urlGenerator,Security $user)
    {
        $this->urlGenerator = $urlGenerator;
        $this->user = $user;
    }

   public function redirectToHome( ): RedirectResponse
   {
        return new RedirectResponse($this->routeToHome());
    }

    public function routeToHome(): string
    {
        $routeToHome=$this->urlGenerator->generate('app_login');
        if ($this->user->isGranted('ROLE_ADMIN')) {
            $routeToHome=$this->urlGenerator->generate('app_client_index');
        } elseif ($this->user->isGranted('ROLE_ADMIN_BARRIO')) {
            $routeToHome=$this->urlGenerator->generate('app_proyecto_habitacional_index');
        } elseif ($this->user->isGranted('ROLE_PROFESIONAL')) {
            $routeToHome=$this->urlGenerator->generate('app_proyecto_habitacional_index');
        } elseif ($this->user->isGranted('ROLE_PROPIETARIO')) {
            $routeToHome=$this->urlGenerator->generate('app_unidad_habitacional_index');
        }
        return $routeToHome;
    }

}
