<?php

namespace App\Security;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\Security\Http\Authorization\AccessDeniedHandlerInterface;
use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

class CustomAccessDenied implements AccessDeniedHandlerInterface
{
    private $twig;


    public function __construct( Environment $twig)
    {
        $this->twig=$twig;
    }
    public function handle(Request $request, AccessDeniedException $accessDeniedException): ?Response
    {
        try {
            $content = $this->twig->render('security/accessDenied.html.twig', []);
        } catch (LoaderError $e) {
        } catch (RuntimeError $e) {
        } catch (SyntaxError $e) {
        }
        return new Response($content, 403);
    }
}