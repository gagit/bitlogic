<?php

namespace App\Controller;

use App\Entity\IdentificationType;
use App\Form\IdentificationTypeType;
use App\Form\IdentificationTypeFilterType;
use App\Repository\IdentificationTypeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/tipo/identificacion")
 */
class IdentificationTypeController extends AbstractController
{
    /**
     * @Route("/index", name="app_identification_type_index", methods={"GET"})
     */
    public function index(IdentificationTypeRepository $identificationTypeRepository,Request $request, PaginatorInterface $paginator): Response
    {
        $formFilter = $this->createForm(IdentificationTypeFilterType::class, null,[
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

        $identificationTypes = $paginator->paginate(
                $identificationTypeRepository->getIdentificationTypeFilter($filter), /* query NOT result */
                $request->query->getInt('page', 1)/*page number*/,
                20 /*limit per page*/
            );

        return $this->render('identification_type/index.html.twig', [
            'formFilter' => $formFilter->createView(),
            'identification_types' => $identificationTypes,
        ]);
    }

    /**
     * @Route("/new", name="app_identification_type_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $identificationType = new IdentificationType();
        $form = $this->createForm(IdentificationTypeType::class, $identificationType);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            try{
                $entityManager->persist($identificationType);
                $entityManager->flush();
                $this->get('session')->getFlashBag()->add('notice', 'El cambio se realizó correctamente!');
                return $this->redirectToRoute('app_identification_type_index', [], Response::HTTP_SEE_OTHER);
            } catch (\Doctrine\DBAL\DBALException $DBalEx) {
                $this->get('session')->getFlashBag()->add('error', 'Se ha producido un error en la base de datos!!. '. $DBalEx->getMessage() );
            } catch (\Exception $ex) {
                $this->get('session')->getFlashBag()->add('error', 'Upss! - '.$ex->getMessage());
            }
        }

        return $this->renderForm('identification_type/new.html.twig', [
            'identification_type' => $identificationType,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_identification_type_show", methods={"GET"})
     */
    public function show(IdentificationType $identificationType): Response
    {
        return $this->render('identification_type/show.html.twig', [
            'identification_type' => $identificationType,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_identification_type_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, IdentificationType $identificationType, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(IdentificationTypeType::class, $identificationType);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            try{
                $entityManager->flush();
                $this->get('session')->getFlashBag()->add('notice', 'El cambio se realizó correctamente!');

                return $this->redirectToRoute('app_identification_type_index', [], Response::HTTP_SEE_OTHER);
            } catch (\Doctrine\DBAL\DBALException $DBalEx) {
                $this->get('session')->getFlashBag()->add('error', 'Se ha producido un error en la base de datos!!. '. $DBalEx->getMessage() );
            } catch (\Exception $ex) {
                $this->get('session')->getFlashBag()->add('error', 'Upss! - '.$ex->getMessage());
            }
       }

        return $this->renderForm('identification_type/edit.html.twig', [
            'identification_type' => $identificationType,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_identification_type_delete", methods={"POST"})
     */
    public function delete(Request $request, IdentificationType $identificationType, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$identificationType->getId(), $request->request->get('_token'))) {
            $entityManager->remove($identificationType);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_identification_type_index', [], Response::HTTP_SEE_OTHER);
    }
}
