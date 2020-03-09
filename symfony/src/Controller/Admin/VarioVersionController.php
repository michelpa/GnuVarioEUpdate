<?php

namespace App\Controller\Admin;

use App\Entity\VarioVersion;
use App\Form\VarioVersionType;
use App\Repository\VarioFichierRepository;
use App\Repository\VarioVersionDownloadLogRepository;
use App\Repository\VarioVersionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/adminz/vario/version", name="adminz_varioversion_")
 */

class VarioVersionController extends AbstractController
{
    /**
     * @Route("/", name="index", methods={"GET"})
     */
    public function index(VarioVersionRepository $varioVersionRepository): Response
    {
        return $this->render('admin/vario_version/index.html.twig', [
            'vario_versions' => $varioVersionRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="new", methods={"GET","POST"})
     */
    public function new(Request $request, VarioVersionRepository $varioVersionRepo): Response
    {
        $varioVersion = new VarioVersion();
        $form = $this->createForm(VarioVersionType::class, $varioVersion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            if ($varioVersion->getIsActive()) {
                //on desactive toutes les autres pour le meme modele
                $varioVersionRepo->desactiveForType($varioVersion->getFirmwareType());
                $varioVersion->setIsActive(true);
            }

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($varioVersion);
            $entityManager->flush();

            return $this->redirectToRoute('adminz_varioversion_index');
        }

        return $this->render('admin/vario_version/new.html.twig', [
            'vario_version' => $varioVersion,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/show/{id}", name="show", methods={"GET"})
     */
    public function show(VarioVersion $varioVersion): Response
    {
        return $this->render('admin/vario_version/show.html.twig', [
            'vario_version' => $varioVersion,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="edit", methods={"GET","POST"})
     */
    public function edit(Request $request, VarioVersionRepository $varioVersionRepo, VarioVersion $varioVersion): Response
    {
        $form = $this->createForm(VarioVersionType::class, $varioVersion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            if ($varioVersion->getIsActive()) {
                //on desactive toutes les autres pour le meme modele
                $varioVersionRepo->desactiveForType($varioVersion->getFirmwareType());
                $varioVersion->setIsActive(true);
            }
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('adminz_varioversion_index');
        }

        return $this->render('admin/vario_version/edit.html.twig', [
            'vario_version' => $varioVersion,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/delete/{id}", name="delete", methods={"DELETE"})
     */
    public function delete(Request $request, VarioVersion $varioVersion): Response
    {
        if ($this->isCsrfTokenValid('delete' . $varioVersion->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($varioVersion);
            $entityManager->flush();
        }

        return $this->redirectToRoute('adminz_varioversion_index');
    }

    /**
     * @Route("/liste-maj", name="liste_maj", methods={"GET"})
     */
    public function listeMaj(Request $request, VarioVersionDownloadLogRepository $varioVersionLogRepo): Response
    {
        $majs = $varioVersionLogRepo->findBy([], ['created' => 'DESC']);

        return $this->render('admin/vario_version/liste-maj.html.twig', [
            'majs' => $majs
        ]);
    }
}
