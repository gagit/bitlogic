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
     * @Route("/index", name="app_client_index", methods={"GET"})
     */
    public function index(ClientRepository $clientRepository,Request $request, PaginatorInterface $paginator): Response
    {
        $formFilter = $this->createForm(ClientFilterType::class, null,[
                'method' => 'GET',
                'attr' => [
                    'id' => 'idFilter',
                    'name' => 'filter',
                    'class' => 'px-4 py-3',
                ]
            ]
        );
        $formFilter->handleRequest($request);
        $filter = $formFilter->isSubmitted() ? $formFilter->getData() : [];

        $clients = $paginator->paginate(
                $clientRepository->getClientFilter($filter), /* query NOT result */
                $request->query->getInt('page', 1)/*page number*/,
                20 /*limit per page*/
            );

        return $this->render('client/index.html.twig', [
            'formFilter' => $formFilter->createView(),
            'clients' => $clients,
        ]);
    }

    /**
     * @Route("/new", name="app_client_new", methods={"GET", "POST"})
     */
    public function new(Request $request, Session $session): Response
    {
        $form = $this->createForm(QrType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            try{
                $siteUrl = $form->getData('url');
                if(array_key_exists('url',$siteUrl)){
                    $result = Builder::create()
                        ->encoding(new Encoding('UTF-8'))
                        ->errorCorrectionLevel(new ErrorCorrectionLevelHigh())
                        ->data($siteUrl['url'])
                        ->size(250)
                        ->margin(-5)
                        ->build();
                }


                return new Response($result->getString(), 200, ['Content-Type' => 'image/png']);
            } catch (Exception $ex) {
                $session->getFlashBag()->add('error', 'Upss! - '.$ex->getMessage());
            }
        }

        return $this->renderForm('qr/new.html.twig', [
//            'client' => $client,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_client_show", methods={"GET"})
     */
    public function show(Client $client): Response
    {
        return $this->render('client/show.html.twig', [
            'client' => $client,
        ]);
    }
    /**
     * @Route("/convert/from/clientesnew/{id}", name="app_client_convert_from_clientesnew", methods={"GET"})
     */
    public function convertFromClientesnew(Clientesnew $clientesnew, ClientHelper $clientHelper): Response
    {
        $client = $clientHelper->convertClientenewToClient($clientesnew);

        return $this->render('client/show.html.twig', [
            'client' => $client,
        ]);
    }

    /**
     * @Route("/convert/from/distribucionpedidosclientes/{id}", name="app_client_convert_from_distribucionpedidosclientes", methods={"GET"})
     */
    public function convertFromDistribucionpedidosclientes(Distribucionpedidosclientes $distribucionpedidosclientes, ClientHelper $clientHelper): Response
    {
        $client = $clientHelper->convertDistribucionpedidosclientesToClient($distribucionpedidosclientes);

        return $this->render('client/show.html.twig', [
            'client' => $client,
        ]);
    }

    /**
     * @Route("/convert/from/vtmclh/{id}", name="app_client_convert_from_vtmclh", methods={"GET"})
     */
    public function convertFromVtmclh(Vtmclh $vtmclh, ClientHelper $clientHelper): Response
    {
        $client = $clientHelper->convertVtlmclhToClient($vtmclh);

        return $this->render('client/show.html.twig', [
            'client' => $client,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_client_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Client $client, EntityManagerInterface $entityManager,Session $session): Response
    {
        $form = $this->createForm(ClientType::class, $client);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            try{
                $entityManager->flush();
                $session->getFlashBag()->add('notice', 'El cambio se realizó correctamente!');

                return $this->redirectToRoute('app_client_index', [], Response::HTTP_SEE_OTHER);
            } catch (Exception $ex) {
                $session->getFlashBag()->add('error', 'Upss! - '.$ex->getMessage());
            }
       }

        return $this->renderForm('client/edit.html.twig', [
            'client' => $client,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_client_delete", methods={"POST"})
     */
    public function delete(Request $request, Client $client, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$client->getId(), $request->request->get('_token'))) {
            $entityManager->remove($client);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_client_index', [], Response::HTTP_SEE_OTHER);
    }
}
