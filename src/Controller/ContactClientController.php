<?php

namespace App\Controller;

use App\Entity\Client;
use App\Entity\ContactClient;
use App\Form\ContactClientType;
use App\Form\ContactClientFilterType;
use App\Repository\ClientRepository;
use App\Repository\ContactClientRepository;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/contact/client")
 */
class ContactClientController extends AbstractController
{
    /**
     * @Route("/index", name="app_contact_client_index", methods={"GET"})
     */
    public function index(ContactClientRepository $contactClientRepository,Request $request, PaginatorInterface $paginator): Response
    {
        $formFilter = $this->createForm(ContactClientFilterType::class, null,[
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

        $contactClients = $paginator->paginate(
                $contactClientRepository->getContactClientFilter($filter), /* query NOT result */
                $request->query->getInt('page', 1)/*page number*/,
                20 /*limit per page*/
            );

        return $this->render('contact_client/index.html.twig', [
            'formFilter' => $formFilter->createView(),
            'contact_clients' => $contactClients,
        ]);
    }

    /**
     * @Route("/list/{id}", name="app_contacts_client_list", methods={"GET"}, options = {"expose" = true })
     */
    public function listContacts(ContactClientRepository $contactClientRepository,
                                 ClientRepository $clientRepository,
                                 Request $request): Response
    {

        $client  = $clientRepository->find($request->get('id'));
        $contactsClient = $contactClientRepository->findBy(['client'=>$client]);

        return $this->render('contact_client/listContacts.html.twig', [
            'client' => $client,
            'contacts_client' => $contactsClient,
        ]);
    }
    /**
     * @Route("/new/{id}", name="app_contact_client_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EntityManagerInterface $entityManager, Session $session): Response
    {
        $contactClient = new ContactClient();
        $client = $entityManager->getRepository(Client::class)->find($request->get('id'));
        $contactClient->setClient($client);
        $form = $this->createForm(ContactClientType::class, $contactClient);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            try{
                $entityManager->persist($contactClient);
                $entityManager->flush();
                $session->getFlashBag()->add('notice', 'El cambio se realizó correctamente!');
                return $this->redirectToRoute('app_client_tramasica_edit',
                    ['id' => $contactClient->getClient()->getClientTramasica()->getId()], Response::HTTP_SEE_OTHER);
            } catch (\Exception $ex) {
                $session->getFlashBag()->add('error', 'Upss! - '.$ex->getMessage());
            }
        }

        return $this->renderForm('contact_client/new.html.twig', [
            'contact_client' => $contactClient,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_contact_client_show", methods={"GET"})
     */
    public function show(ContactClient $contactClient): Response
    {
        return $this->render('contact_client/show.html.twig', [
            'contact_client' => $contactClient,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_contact_client_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, ContactClient $contactClient,
                         EntityManagerInterface $entityManager, Session $session): Response
    {
        $form = $this->createForm(ContactClientType::class, $contactClient);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            try{
                $entityManager->flush();
                $session->getFlashBag()->add('notice', 'El cambio se realizó correctamente!');
                return $this->redirectToRoute('app_client_tramasica_edit',
                    ['id' => $contactClient->getClient()->getClientTramasica()->getId()], Response::HTTP_SEE_OTHER);
            } catch (\Exception $ex) {
                $session->getFlashBag()->add('error', 'Upss! - '.$ex->getMessage());
            }
       }

        return $this->renderForm('contact_client/edit.html.twig', [
            'contact_client' => $contactClient,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_contact_client_delete", methods={"POST"})
     */
    public function delete(Request $request, ContactClient $contactClient, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$contactClient->getId(), $request->request->get('_token'))) {
            $entityManager->remove($contactClient);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_client_edit', ['id' => $contactClient->getClient()->getId()], Response::HTTP_SEE_OTHER);
    }
}
