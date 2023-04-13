<?php

namespace App\Controller;

use App\Entity\Client;
use App\Entity\ClientTramasica;
use App\Form\ClientTramasicaType;
use App\Form\ClientTramasicaFilterType;
use App\Repository\ClientTramasicaRepository;
use App\Service\ClientHelper;
use Doctrine\ORM\EntityManagerInterface;
use Exception;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/clientes")
 */
class ClientTramasicaController extends AbstractController
{
    /**
     * @Route("/index", name="app_client_tramasica_index", methods={"GET"})
     */
    public function index(ClientTramasicaRepository $clientRepository,Request $request, PaginatorInterface $paginator): Response
    {
        $formFilter = $this->createForm(ClientTramasicaFilterType::class, null,[
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
                $clientRepository->getClientTramasicaFilter($filter), /* query NOT result */
                $request->query->getInt('page', 1)/*page number*/,
                20 /*limit per page*/
            );

        return $this->render('client_tramasica/index.html.twig', [
            'formFilter' => $formFilter->createView(),
            'clients' => $clients,
        ]);
    }

    /**
     * @Route("/new", name="app_client_tramasica_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EntityManagerInterface $entityManager, Session $session): Response
    {
        $tramasicaClient = new ClientTramasica();
        if($request->getMethod()=='GET'){
            $client = new Client();
            $client->setEnabled(true);
            $client->setLegalPerson(false);
            $tramasicaClient->setClient($client);
        }
        $form = $this->createForm(ClientTramasicaType::class, $tramasicaClient);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            try{
                $entityManager->persist($tramasicaClient);
                $entityManager->flush();
                $session->getFlashBag()->add('notice', 'El cambio se realizó correctamente!');
                return $this->redirectToRoute('app_client_tramasica_index', [], Response::HTTP_SEE_OTHER);
            } catch (Exception $ex) {
                $session->getFlashBag()->add('error', 'Upss! - '.$ex->getMessage());
            }
        }

        return $this->renderForm('client_tramasica/new.html.twig', [
            'client' => $tramasicaClient,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_client_tramasica_show", methods={"GET"})
     */
    public function show(ClientTramasica $client): Response
    {
        return $this->render('client_tramasica/show.html.twig', [
            'client' => $client,
        ]);
    }


    /**
     * @Route("/{id}/edit", name="app_client_tramasica_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, ClientTramasica $client, EntityManagerInterface $entityManager,Session $session): Response
    {
        $form = $this->createForm(ClientTramasicaType::class, $client);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            try{
                $entityManager->flush();
                $session->getFlashBag()->add('notice', 'El cambio se realizó correctamente!');

                return $this->redirectToRoute('app_client_tramasica_index', [], Response::HTTP_SEE_OTHER);
            } catch (Exception $ex) {
                $session->getFlashBag()->add('error', 'Upss! - '.$ex->getMessage());
            }
       }

        return $this->renderForm('client_tramasica/edit.html.twig', [
            'client' => $client,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_client_tramasica_delete", methods={"POST"})
     */
    public function delete(Request $request, ClientTramasica $client, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$client->getId(), $request->request->get('_token'))) {
            $entityManager->remove($client);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_client_tramasica_index', [], Response::HTTP_SEE_OTHER);
    }
}
