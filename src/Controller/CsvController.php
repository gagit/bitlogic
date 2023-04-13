<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/csv", name="app_csv")
 */
class CsvController extends AbstractController
{
    /**
     * @Route("/toTxt", name="app_csv")
     */
    public function index(): Response
    {
        return $this->render('csv/index.html.twig', [
            'controller_name' => 'CsvController',
        ]);
    }
}
