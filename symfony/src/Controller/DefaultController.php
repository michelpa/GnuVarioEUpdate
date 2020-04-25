<?php

namespace App\Controller;

use App\Entity\VarioFichier;
use App\Repository\VarioVersionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\VarioVersion;
use App\Entity\VarioVersionDownloadLog;
use App\Repository\VarioFichierRepository;
use App\Tools\ZipFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\KernelInterface;
use Vich\UploaderBundle\Handler\DownloadHandler;
use Vich\UploaderBundle\Templating\Helper\UploaderHelper;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index(Request $request, VarioVersionRepository $versionRepo, VarioFichierRepository $fichierRepo)
    {
        $versions = $versionRepo->findBy(['isActive' => true], ['updated' => 'DESC']);
        $fichiers = $fichierRepo->findBy(['isActive' => true], ['updated' => 'DESC']);

        return $this->render('default/index.html.twig', [
            'versions' => $versions,
            'fichiers' => $fichiers
        ]);
    }


    /**
     * @Route("/lang/{_locale}", name="setlang")
     */
    public function setLang()
    {
        return $this->redirectToRoute('index');
    }

    /**
     * @Route("/update/{firmwareTypeWithBin}", name="dl_firmwarebin")
     * 
     */
    public function downloadFirmwareByType(DownloadHandler $downloadHandler,  VarioVersionRepository $versionRepo, $firmwareTypeWithBin)
    {
        $firmwareType = substr($firmwareTypeWithBin, 0, strpos($firmwareTypeWithBin, '.'));

        if ($version = $versionRepo->findOneBy([
            'isActive' => true,
            'firmwareType' => $firmwareType
        ])) {
            return $downloadHandler->downloadObject($version, $fileField = 'bin' . 'File', null, 'update.bin');
        };

        return $this->render('default/dl_introuvable.html.twig', ['message' => 'Version de firmware introuvable']);
    }

    /**
     * @Route("/firmware/{version}", name="dl_firmware")
     * 
     */
    public function downloadFirmware(DownloadHandler $downloadHandler,  VarioVersion $version)
    {
        return $downloadHandler->downloadObject($version, $fileField = 'bin' . 'File');
    }



    /**
     * @Route("/dl-web/{firmwareType}", name="dl_web_by_type")
     * 
     */
    public function downloadWebByType(UploaderHelper $uploadHelper, KernelInterface $kernel,  VarioVersionRepository $versionRepo, $firmwareType)
    {
        if ($version = $versionRepo->findOneBy([
            'isActive' => true,
            'firmwareType' => $firmwareType
        ])) {
            $zip = new ZipFile();

            for ($i = 1; $i < 11; $i++) {
                $method = 'getWww' . $i;
                if ($wname = $version->$method()) {
                    $zip->addFile(file_get_contents($kernel->getRootDir() . '/../../public_html' . $uploadHelper->asset($version, 'www' . $i . 'File')), $wname);
                }
            }

            return new Response($zip->file(), 200, [
                "Content-type" => "application/octet-stream",
                "Content-Disposition" => "attachment; filename=www.zip"
            ]);
        };

        return $this->render('default/dl_introuvable.html.twig', ['message' => 'Version des fichiers web introuvable']);
    }
    /**
     * @Route("/dlweb/{version}", name="dl_web")
     * 
     */
    public function downloadWeb(UploaderHelper $uploadHelper, KernelInterface $kernel, VarioVersion $version)
    {
        $zip = new ZipFile();

        for ($i = 1; $i < 11; $i++) {
            $method = 'getWww' . $i;
            if ($wname = $version->$method()) {
                $zip->addFile(file_get_contents($kernel->getRootDir() . '/../../public_html' . $uploadHelper->asset($version, 'www' . $i . 'File')), $wname);
            }
        }

        return new Response($zip->file(), 200, [
            "Content-type" => "application/octet-stream",
            "Content-Disposition" => "attachment; filename=www.zip"
        ]);
    }


    /**
     * @Route("/fichier/dl/{fichier}", name="dl_fichier")
     * 
     */
    public function downloadFichier(DownloadHandler $downloadHandler,  VarioFichier $fichier)
    {
        return $downloadHandler->downloadObject($fichier, $fileField = 'file');
    }

    /**
     * @Route("/fichier/{filename}", name="dl_fichier_by_name")
     * 
     */
    public function downloadFichierByNameFichier(DownloadHandler $downloadHandler, VarioFichierRepository $fichierRepo, $filename)
    {
        if ($fichier = $fichierRepo->findOneBy([
            'isActive' => true,
            'filename' => $filename
        ])) {

            return $downloadHandler->downloadObject($fichier, $fileField = 'file');
        } else {
            return $this->render('default/dl_introuvable.html.twig', ['message' => 'Fichier introuvable']);
        }
    }
}
