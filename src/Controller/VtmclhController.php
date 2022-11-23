<?php

namespace App\Controller;

use App\Entity\Vtmclh;
use App\Form\VtmclhType;
use App\Form\VtmclhFilterType;
use App\Repository\VtmclhRepository;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/vtmclh")
 */
class VtmclhController extends AbstractController
{
    /**
     * @Route("/index", name="app_vtmclh_index", methods={"GET"})
     */
    public function index(EntityManagerInterface $entityManager, VtmclhRepository $vtmclhRepository,
                          Request $request, PaginatorInterface $paginator): Response
    {
        $formFilter = $this->createForm(VtmclhFilterType::class, null,[
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

        $vtmclhs = $paginator->paginate(
            $vtmclhRepository->getVtmclhFilter($filter), /* query NOT result */
            $request->query->getInt('page', 1)/*page number*/,
            5 /*limit per page*/
        );

        return $this->render('vtmclh/index.html.twig', [
            'vtmclhs' => $vtmclhs,
            'formFilter' => $formFilter->createView(),
        ]);
    }

    /**
     * @Route("/new", name="app_vtmclh_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $vtmclh = new Vtmclh();
        $form = $this->createForm(VtmclhType::class, $vtmclh);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            try{
                $entityManager->persist($vtmclh);
                $entityManager->flush();
                $this->get('session')->getFlashBag()->add('notice', 'El cambio se realizó correctamente!');
                return $this->redirectToRoute('app_vtmclh_index', [], Response::HTTP_SEE_OTHER);
            } catch (\Doctrine\DBAL\DBALException $DBalEx) {
                $this->get('session')->getFlashBag()->add('error', 'Se ha producido un error en la base de datos!!. '. $DBalEx->getMessage() );
            } catch (\Exception $ex) {
                $this->get('session')->getFlashBag()->add('error', 'Upss! - '.$ex->getMessage());
            }
        }

        return $this->renderForm('vtmclh/new.html.twig', [
            'vtmclh' => $vtmclh,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{vtmclhNrocta}", name="app_vtmclh_show", methods={"GET"})
     */
    public function show(Vtmclh $vtmclh): Response
    {
        return $this->render('vtmclh/show.html.twig', [
            'vtmclh' => $vtmclh,
        ]);
    }

    /**
     * @Route("/{vtmclhNrocta}/edit", name="app_vtmclh_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Vtmclh $vtmclh, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(VtmclhType::class, $vtmclh);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            try{
                $entityManager->flush();
                $this->get('session')->getFlashBag()->add('notice', 'El cambio se realizó correctamente!');

                return $this->redirectToRoute('app_vtmclh_index', [], Response::HTTP_SEE_OTHER);
            } catch (\Doctrine\DBAL\DBALException $DBalEx) {
                $this->get('session')->getFlashBag()->add('error', 'Se ha producido un error en la base de datos!!. '. $DBalEx->getMessage() );
            } catch (\Exception $ex) {
                $this->get('session')->getFlashBag()->add('error', 'Upss! - '.$ex->getMessage());
            }
       }

        return $this->renderForm('vtmclh/edit.html.twig', [
            'vtmclh' => $vtmclh,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{vtmclhNrocta}", name="app_vtmclh_delete", methods={"POST"})
     */
    public function delete(Request $request, Vtmclh $vtmclh, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$vtmclh->getVtmclhNrocta(), $request->request->get('_token'))) {
            $entityManager->remove($vtmclh);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_vtmclh_index', [], Response::HTTP_SEE_OTHER);
    }
}
