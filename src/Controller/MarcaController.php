<?php

namespace App\Controller;

use App\Entity\Marca;
use App\Form\MarcaType;
use App\Form\MarcaFilterType;
use App\Repository\MarcaRepository;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/marca')]
class MarcaController extends AbstractController
{
    #[Route('/index', name: 'app_marca_index', methods: ['GET'])]
    public function index(MarcaRepository $marcaRepository,Request $request, PaginatorInterface $paginator): Response
    {
        $formFilter = $this->createForm(MarcaFilterType::class, null,[
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

        $marcas = $paginator->paginate(
                $marcaRepository->getMarcaFilter($filter), /* query NOT result */
                $request->query->getInt('page', 1)/*page number*/,
                20 /*limit per page*/
            );

        return $this->render('marca/index.html.twig', [
            'formFilter' => $formFilter->createView(),
            'marcas' => $marcas,
        ]);
    }

    #[Route('/new', name: 'app_marca_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $marca = new Marca();
        $form = $this->createForm(MarcaType::class, $marca);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            try{
                $entityManager->persist($marca);
                $entityManager->flush();
                $this->get('session')->getFlashBag()->add('notice', 'El cambio se realizó correctamente!');
                return $this->redirectToRoute('app_marca_index', [], Response::HTTP_SEE_OTHER);
            } catch (\Doctrine\DBAL\DBALException $DBalEx) {
                $this->get('session')->getFlashBag()->add('error', 'Se ha producido un error en la base de datos!!. '. $DBalEx->getMessage() );
            } catch (\Exception $ex) {
                $this->get('session')->getFlashBag()->add('error', 'Upss! - '.$ex->getMessage());
            }
        }

        return $this->renderForm('marca/new.html.twig', [
            'marca' => $marca,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_marca_show', methods: ['GET'])]
    public function show(Marca $marca): Response
    {
        return $this->render('marca/show.html.twig', [
            'marca' => $marca,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_marca_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Marca $marca, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(MarcaType::class, $marca);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            try{
                $entityManager->flush();
                $this->get('session')->getFlashBag()->add('notice', 'El cambio se realizó correctamente!');

                return $this->redirectToRoute('app_marca_index', [], Response::HTTP_SEE_OTHER);
            } catch (\Doctrine\DBAL\DBALException $DBalEx) {
                $this->get('session')->getFlashBag()->add('error', 'Se ha producido un error en la base de datos!!. '. $DBalEx->getMessage() );
            } catch (\Exception $ex) {
                $this->get('session')->getFlashBag()->add('error', 'Upss! - '.$ex->getMessage());
            }
       }

        return $this->renderForm('marca/edit.html.twig', [
            'marca' => $marca,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_marca_delete', methods: ['POST'])]
    public function delete(Request $request, Marca $marca, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$marca->getId(), $request->request->get('_token'))) {
            $entityManager->remove($marca);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_marca_index', [], Response::HTTP_SEE_OTHER);
    }
}
