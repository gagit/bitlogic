<?php

namespace App\Controller;

use App\Entity\Clientesnew;
use App\Form\ClientesnewType;
use App\Form\ClientesnewFilterType;
use App\Repository\ClientesnewRepository;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/clientesnew")
 */
class ClientesnewController extends AbstractController
{
    /**
     * @Route("/index", name="app_clientesnew_index", methods={"GET"})
     */
    public function index(EntityManagerInterface $entityManager,ClientesnewRepository $clientesnewRepository,
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

        $clientesnews = $paginator->paginate(
            $clientesnewRepository->getClientesnewFilter($filter), /* query NOT result */
            $request->query->getInt('page', 1)/*page number*/,
            20 /*limit per page*/
        );

//        return $this->render('tarea_etapa/index.html.twig', [
//            'formFilter' => $formFilter->createView(),
//            'tarea_etapas' => $tareaEtapas,
//        ]);
//        $clientesnews = $entityManager
//            ->getRepository(Clientesnew::class)
//            ->findAll();

        return $this->render('clientesnew/index.html.twig', [
            'formFilter' => $formFilter->createView(),
            'clientesnews' => $clientesnews,
        ]);
    }

    /**
     * @Route("/new", name="app_clientesnew_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $clientesnew = new Clientesnew();
        $form = $this->createForm(ClientesnewType::class, $clientesnew);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            try{
                $entityManager->persist($clientesnew);
                $entityManager->flush();
                $this->get('session')->getFlashBag()->add('notice', 'El cambio se realizó correctamente!');
                return $this->redirectToRoute('app_clientesnew_index', [], Response::HTTP_SEE_OTHER);
            } catch (\Doctrine\DBAL\DBALException $DBalEx) {
                $this->get('session')->getFlashBag()->add('error', 'Se ha producido un error en la base de datos!!. '. $DBalEx->getMessage() );
            } catch (\Exception $ex) {
                $this->get('session')->getFlashBag()->add('error', 'Upss! - '.$ex->getMessage());
            }
        }

        return $this->renderForm('clientesnew/new.html.twig', [
            'clientesnew' => $clientesnew,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_clientesnew_show", methods={"GET"})
     */
    public function show(Clientesnew $clientesnew): Response
    {
        return $this->render('clientesnew/show.html.twig', [
            'clientesnew' => $clientesnew,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_clientesnew_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Clientesnew $clientesnew, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ClientesnewType::class, $clientesnew);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            try{
                $entityManager->flush();
                $this->get('session')->getFlashBag()->add('notice', 'El cambio se realizó correctamente!');

                return $this->redirectToRoute('app_clientesnew_index', [], Response::HTTP_SEE_OTHER);
            } catch (\Doctrine\DBAL\DBALException $DBalEx) {
                $this->get('session')->getFlashBag()->add('error', 'Se ha producido un error en la base de datos!!. '. $DBalEx->getMessage() );
            } catch (\Exception $ex) {
                $this->get('session')->getFlashBag()->add('error', 'Upss! - '.$ex->getMessage());
            }
       }

        return $this->renderForm('clientesnew/edit.html.twig', [
            'clientesnew' => $clientesnew,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_clientesnew_delete", methods={"POST"})
     */
    public function delete(Request $request, Clientesnew $clientesnew, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$clientesnew->getId(), $request->request->get('_token'))) {
            $entityManager->remove($clientesnew);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_clientesnew_index', [], Response::HTTP_SEE_OTHER);
    }
}
