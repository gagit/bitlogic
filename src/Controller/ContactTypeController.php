<?php

namespace App\Controller;

use App\Entity\ContactType;
use App\Form\ContactTypeType;
use App\Form\ContactTypeFilterType;
use App\Repository\ContactTypeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/tipo/contacto")
 */
class ContactTypeController extends AbstractController
{
    /**
     * @Route("/index", name="app_contact_type_index", methods={"GET"})
     */
    public function index(ContactTypeRepository $contactTypeRepository,Request $request, PaginatorInterface $paginator): Response
    {
        $formFilter = $this->createForm(ContactTypeFilterType::class, null,[
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

        $contactTypes = $paginator->paginate(
                $contactTypeRepository->getContactTypeFilter($filter), /* query NOT result */
                $request->query->getInt('page', 1)/*page number*/,
                20 /*limit per page*/
            );

        return $this->render('contact_type/index.html.twig', [
            'formFilter' => $formFilter->createView(),
            'contact_types' => $contactTypes,
        ]);
    }

    /**
     * @Route("/new", name="app_contact_type_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $contactType = new ContactType();
        $form = $this->createForm(ContactTypeType::class, $contactType);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            try{
                $entityManager->persist($contactType);
                $entityManager->flush();
                $this->get('session')->getFlashBag()->add('notice', 'El cambio se realizó correctamente!');
                return $this->redirectToRoute('app_contact_type_index', [], Response::HTTP_SEE_OTHER);
            } catch (\Doctrine\DBAL\DBALException $DBalEx) {
                $this->get('session')->getFlashBag()->add('error', 'Se ha producido un error en la base de datos!!. '. $DBalEx->getMessage() );
            } catch (\Exception $ex) {
                $this->get('session')->getFlashBag()->add('error', 'Upss! - '.$ex->getMessage());
            }
        }

        return $this->renderForm('contact_type/new.html.twig', [
            'contact_type' => $contactType,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_contact_type_show", methods={"GET"})
     */
    public function show(ContactType $contactType): Response
    {
        return $this->render('contact_type/show.html.twig', [
            'contact_type' => $contactType,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_contact_type_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, ContactType $contactType, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ContactTypeType::class, $contactType);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            try{
                $entityManager->flush();
                $this->get('session')->getFlashBag()->add('notice', 'El cambio se realizó correctamente!');

                return $this->redirectToRoute('app_contact_type_index', [], Response::HTTP_SEE_OTHER);
            } catch (\Doctrine\DBAL\DBALException $DBalEx) {
                $this->get('session')->getFlashBag()->add('error', 'Se ha producido un error en la base de datos!!. '. $DBalEx->getMessage() );
            } catch (\Exception $ex) {
                $this->get('session')->getFlashBag()->add('error', 'Upss! - '.$ex->getMessage());
            }
       }

        return $this->renderForm('contact_type/edit.html.twig', [
            'contact_type' => $contactType,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_contact_type_delete", methods={"POST"})
     */
    public function delete(Request $request, ContactType $contactType, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$contactType->getId(), $request->request->get('_token'))) {
            $entityManager->remove($contactType);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_contact_type_index', [], Response::HTTP_SEE_OTHER);
    }
}
