<?php

namespace App\Controller;

use App\Entity\Distribucionpedidosclientes;
use App\Form\ClientesnewFilterType;
use App\Form\DistribucionpedidosclientesType;
use App\Form\DistribucionpedidosclientesFilterType;
use App\Repository\DistribucionpedidosclientesRepository;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/distribucionpedidosclientes")
 */
class DistribucionpedidosclientesController extends AbstractController
{
    /**
     * @Route("/index", name="app_distribucionpedidosclientes_index", methods={"GET"})
     */
    public function index(EntityManagerInterface $entityManager, DistribucionpedidosclientesRepository $distribucionpedidosclientesRepository,
                          Request $request, PaginatorInterface $paginator): Response
    {
        $formFilter = $this->createForm(ClientesnewFilterType::class, null,[
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

        $distribucionpedidosclientes = $paginator->paginate(
            $distribucionpedidosclientesRepository->getDistribucionpedidosclientesFilter($filter), /* query NOT result */
            $request->query->getInt('page', 1)/*page number*/,
            20 /*limit per page*/
        );

        return $this->render('distribucionpedidosclientes/index.html.twig', [
            'distribucionpedidosclientes' => $distribucionpedidosclientes,
            'formFilter' => $formFilter->createView(),
        ]);
    }

    /**
     * @Route("/new", name="app_distribucionpedidosclientes_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $distribucionpedidoscliente = new Distribucionpedidosclientes();
        $form = $this->createForm(DistribucionpedidosclientesType::class, $distribucionpedidoscliente);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            try{
                $entityManager->persist($distribucionpedidoscliente);
                $entityManager->flush();
                $this->get('session')->getFlashBag()->add('notice', 'El cambio se realizó correctamente!');
                return $this->redirectToRoute('app_distribucionpedidosclientes_index', [], Response::HTTP_SEE_OTHER);
            } catch (\Doctrine\DBAL\DBALException $DBalEx) {
                $this->get('session')->getFlashBag()->add('error', 'Se ha producido un error en la base de datos!!. '. $DBalEx->getMessage() );
            } catch (\Exception $ex) {
                $this->get('session')->getFlashBag()->add('error', 'Upss! - '.$ex->getMessage());
            }
        }

        return $this->renderForm('distribucionpedidosclientes/new.html.twig', [
            'distribucionpedidoscliente' => $distribucionpedidoscliente,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_distribucionpedidosclientes_show", methods={"GET"})
     */
    public function show(Distribucionpedidosclientes $distribucionpedidoscliente): Response
    {
        return $this->render('distribucionpedidosclientes/show.html.twig', [
            'distribucionpedidoscliente' => $distribucionpedidoscliente,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_distribucionpedidosclientes_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Distribucionpedidosclientes $distribucionpedidoscliente, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(DistribucionpedidosclientesType::class, $distribucionpedidoscliente);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            try{
                $entityManager->flush();
                $this->get('session')->getFlashBag()->add('notice', 'El cambio se realizó correctamente!');

                return $this->redirectToRoute('app_distribucionpedidosclientes_index', [], Response::HTTP_SEE_OTHER);
            } catch (\Doctrine\DBAL\DBALException $DBalEx) {
                $this->get('session')->getFlashBag()->add('error', 'Se ha producido un error en la base de datos!!. '. $DBalEx->getMessage() );
            } catch (\Exception $ex) {
                $this->get('session')->getFlashBag()->add('error', 'Upss! - '.$ex->getMessage());
            }
       }

        return $this->renderForm('distribucionpedidosclientes/edit.html.twig', [
            'distribucionpedidoscliente' => $distribucionpedidoscliente,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_distribucionpedidosclientes_delete", methods={"POST"})
     */
    public function delete(Request $request, Distribucionpedidosclientes $distribucionpedidoscliente, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$distribucionpedidoscliente->getId(), $request->request->get('_token'))) {
            $entityManager->remove($distribucionpedidoscliente);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_distribucionpedidosclientes_index', [], Response::HTTP_SEE_OTHER);
    }
}
