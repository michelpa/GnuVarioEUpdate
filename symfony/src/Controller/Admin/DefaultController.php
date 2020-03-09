<?php

namespace App\Controller\Admin;

use App\Repository\VarioFichierRepository;
use App\Repository\VarioVersionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;


/**
 * @Route("/adminz", name="adminz_")
 */

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index(VarioVersionRepository $varioVersionRepository, VarioFichierRepository $varioFichierRepository)
    {
        return $this->render('admin/default/index.html.twig', [
            'vario_versions' => $varioVersionRepository->findAll(),
            'vario_fichiers' => $varioFichierRepository->findAll(),
        ]);
    }
}
