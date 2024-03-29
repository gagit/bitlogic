<?php

namespace App\Controller;

use App\Entity\Client;
use App\Entity\Clientesnew;
use App\Entity\Distribucionpedidosclientes;
use App\Entity\Vtmclh;
use App\Form\ClientType;
use App\Form\ClientFilterType;
use App\Form\QrType;
use App\Repository\ClientRepository;
use App\Service\ClientHelper;
use Doctrine\ORM\EntityManagerInterface;
use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelHigh;
use Exception;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/qr")
 */
class QrController extends AbstractController
{

    /**
     * @Route("/new", name="app_qr_new", methods={"GET", "POST"})
     */
    public function new(Request $request, Session $session): Response
    {
        $form = $this->createForm(QrType::class);
        $form->handleRequest($request);
        $img = null;
        $url = "";
        if ($form->isSubmitted() && $form->isValid()) {
            try {
                $siteUrl = $form->getData('url');
                if (array_key_exists('url', $siteUrl)) {
                    $result = Builder::create()
                        ->encoding(new Encoding('UTF-8'))
                        ->errorCorrectionLevel(new ErrorCorrectionLevelHigh())
                        ->data($siteUrl['url'])
                        ->size(250)
                        ->margin(-5)
                        ->build();
                    $url = $siteUrl['url'];
                }
                $img = base64_encode($result->getString());
            } catch (Exception $ex) {
                $session->getFlashBag()->add('error', 'Upss! - ' . $ex->getMessage());
            }
        }

        return $this->renderForm('qr/new.html.twig', [
            'form' => $form,
            'image' => $img,
            'url' => $url,
        ]);
    }

     /**
     * @Route("/getImageQr/", name="app_client_getImageQr", methods={"GET", "POST"})
     */
    public function getImageQr(Request $request, Session $session): Response
    {
        $url = $request->get('urlQr');
        if ($url) {
            try{
                $result = Builder::create()
                    ->encoding(new Encoding('UTF-8'))
                    ->errorCorrectionLevel(new ErrorCorrectionLevelHigh())
                    ->data($url)
                    ->size(250)
                    ->margin(-5)
                    ->build();

                return new Response($result->getString(), 200,
                    [
                        'Content-Disposition' => 'attachment; filename="QrCode-'.random_int(1,50000).'.png"',
                        'Content-Type' => 'image/png'
                    ]
                );
            } catch (Exception $ex) {
                $session->getFlashBag()->add('error', 'Upss! - '.$ex->getMessage());
            }
        }

        return new Response('Resourse No Found',404);
    }


}
