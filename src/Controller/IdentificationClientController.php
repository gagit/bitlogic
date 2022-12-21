<?php

namespace App\Controller;

use App\Entity\IdentificationClient;
use App\Form\IdentificationClientType;
use App\Form\IdentificationClientFilterType;
use App\Repository\ClientRepository;
use App\Repository\IdentificationClientRepository;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/identification/client")
 */
class IdentificationClientController extends AbstractController
{
    /**
     * @Route("/index", name="app_identification_client_index", methods={"GET"})
     */
    public function index(IdentificationClientRepository $identificationClientRepository,Request $request, PaginatorInterface $paginator): Response
    {
        $formFilter = $this->createForm(IdentificationClientFilterType::class, null,[
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

        $identificationClients = $paginator->paginate(
                $identificationClientRepository->getIdentificationClientFilter($filter), /* query NOT result */
                $request->query->getInt('page', 1)/*page number*/,
                20 /*limit per page*/
            );

        return $this->render('identification_client/index.html.twig', [
            'formFilter' => $formFilter->createView(),
            'identification_clients' => $identificationClients,
        ]);
    }

    /**
     * @Route("/list/{id}", name="app_identifications_client_list", methods={"GET"}, options = {"expose" = true })
     */
    public function indexIdentifications(IdentificationClientRepository $identificationClientRepository,
                                         ClientRepository $clientRepository,
                                         Request $request): Response
    {
        $client  = $clientRepository->find($request->get('id'));
        $identificationsClient = $identificationClientRepository->findBy(['client'=>$client]);

        return $this->render('identification_client/listIdentifications.html.twig', [
            'client' => $client,
            'identifications_client' => $identificationsClient,
        ]);
    }

    /**
     * @Route("/new", name="app_identification_client_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $identificationClient = new IdentificationClient();
        $form = $this->createForm(IdentificationClientType::class, $identificationClient);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            try{
                $entityManager->persist($identificationClient);
                $entityManager->flush();
                $this->get('session')->getFlashBag()->add('notice', 'El cambio se realizó correctamente!');
                return $this->redirectToRoute('app_identification_client_index', [], Response::HTTP_SEE_OTHER);
            } catch (\Doctrine\DBAL\DBALException $DBalEx) {
                $this->get('session')->getFlashBag()->add('error', 'Se ha producido un error en la base de datos!!. '. $DBalEx->getMessage() );
            } catch (\Exception $ex) {
                $this->get('session')->getFlashBag()->add('error', 'Upss! - '.$ex->getMessage());
            }
        }

        return $this->renderForm('identification_client/new.html.twig', [
            'identification_client' => $identificationClient,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_identification_client_show", methods={"GET"})
     */
    public function show(IdentificationClient $identificationClient): Response
    {
        return $this->render('identification_client/show.html.twig', [
            'identification_client' => $identificationClient,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_identification_client_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, IdentificationClient $identificationClient, EntityManagerInterface $entityManager, Session $session): Response
    {
        $form = $this->createForm(IdentificationClientType::class, $identificationClient);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            try{
                $entityManager->flush();
                $session->getFlashBag()->add('notice', 'El cambio se realizó correctamente!');
                return $this->redirectToRoute('app_client_edit', ['id' => $identificationClient->getClient()->getId()], Response::HTTP_SEE_OTHER);
            } catch (\Exception $ex) {
                $session->getFlashBag()->add('error', 'Upss! - '.$ex->getMessage());
            }
       }

        return $this->renderForm('identification_client/edit.html.twig', [
            'identification_client' => $identificationClient,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_identification_client_delete", methods={"POST"})
     */
    public function delete(Request $request, IdentificationClient $identificationClient, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$identificationClient->getId(), $request->request->get('_token'))) {
            $entityManager->remove($identificationClient);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_client_edit', ['id' => $identificationClient->getClient()->getId()], Response::HTTP_SEE_OTHER);
    }
}
