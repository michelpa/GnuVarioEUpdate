<?php

namespace App\Controller\Admin;

use App\Entity\VarioFichier;
use App\Form\VarioFichierType;
use App\Repository\VarioFichierRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * @Route("/adminz/vario/fichier", name="adminz_variofichier_")
 */
class VarioFichierController extends AbstractController
{
    /**
     * @Route("/", name="index", methods={"GET"})
     */
    public function index(VarioFichierRepository $varioFichierRepository): Response
    {
        return $this->render('admin/vario_fichier/index.html.twig', [
            'vario_fichiers' => $varioFichierRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $varioFichier = new VarioFichier();
        $form = $this->createForm(VarioFichierType::class, $varioFichier);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($varioFichier);
            $entityManager->flush();

            return $this->redirectToRoute('adminz_variofichier_index');
        }

        return $this->render('admin/vario_fichier/new.html.twig', [
            'vario_fichier' => $varioFichier,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="show", methods={"GET"})
     */
    public function show(VarioFichier $varioFichier): Response
    {
        return $this->render('admin/vario_fichier/show.html.twig', [
            'vario_fichier' => $varioFichier,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="edit", methods={"GET","POST"})
     */
    public function edit(Request $request, VarioFichierRepository $varioFichierRepository, VarioFichier $varioFichier): Response
    {
        $form = $this->createForm(VarioFichierType::class, $varioFichier);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('adminz_variofichier_index');
        }

        return $this->render('admin/vario_fichier/edit.html.twig', [
            'vario_fichier' => $varioFichier,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="delete", methods={"DELETE"})
     */
    public function delete(Request $request, VarioFichier $varioFichier): Response
    {
        if ($this->isCsrfTokenValid('delete' . $varioFichier->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($varioFichier);
            $entityManager->flush();
        }

        return $this->redirectToRoute('adminz_variofichier_index');
    }
}
