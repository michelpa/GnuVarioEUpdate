<?php

namespace App\Controller;

use App\Repository\VarioVersionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\VarioVersion;
use App\Entity\VarioVersionDownloadLog;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\KernelInterface;
use Vich\UploaderBundle\Handler\DownloadHandler;
use Vich\UploaderBundle\Templating\Helper\UploaderHelper;

/**
 * @Route("/webupdate", name="web_update_")
 */
class WebUpdateController extends AbstractController
{

    /**
     * @Route("/checkversion/{uid}", name="check_version")
     */
    public function checkVersion(Request $request, VarioVersionRepository $versionRepo, $uid)
    {
        $versions = $versionRepo->findBy(['isActive' => true]);
        $res = [];

        $checksum = $this->getChecksum($uid);

        /** @var VarioVersion $version  */
        foreach ($versions as $version) {
            //www
            $www = [];
            for ($i = 1; $i < 11; $i++) {
                $method = 'getWww' . $i;
                if ($filename = $version->$method()) {
                    $www[] = $this->generateUrl('web_update_dl_file_with_log', ['version' => $version->getId(), 'uid' => $uid, 'checksum' => $checksum, 'name' => 'www' . $i, 'filename' => $filename]);
                }
            }

            //composition de la réponse
            $res[$version->getFirmwareType()] = [
                'version' => $version->getVersion(),
                'subversion' => $version->getSubversion(),
                'betaversion' => $version->getBetaversion(),
                'host' => $request->getHttpHost(),
                'port' => 80,
                'bin' => $this->generateUrl('web_update_dl_file_with_log', ['version' => $version->getId(), 'uid' => $uid, 'checksum' => $checksum, 'name' => 'bin', 'filename' => 'update.bin'])
            ];

            if (count($www)) {
                $res[$version->getFirmwareType()]['www'] = $www;
            }
        }

        return new JsonResponse($res);
    }

    /**
     * @Route("/dl/{version}/{uid}/{checksum}/{name}/{filename}", name="dl_file_with_log")
     * 
     */
    public function downloadFileWithLog(UploaderHelper $uploadHelper, KernelInterface $kernel,  VarioVersion $version, $uid, $checksum,  $name, $filename)
    {
        $checksumAttendu = $this->getChecksum($uid);
        if ($checksumAttendu != $checksum) {
            throw $this->createAccessDeniedException();
        }

        if ($name == 'bin') {
            //enregistrement du log de telechargement
            $entityManager = $this->getDoctrine()->getManager();
            $log = new VarioVersionDownloadLog();
            $log->setUid($uid);
            $log->setVarioVersion($version);
            $entityManager->persist($log);
            $entityManager->flush();
        }

        // Generate response
        $response = new Response();
        $filePath = $kernel->getRootDir() . '/../../public_html' . $uploadHelper->asset($version, $name . 'File');
        // Set headers
        $response->headers->set('Cache-Control', 'private');
        $response->headers->set('Content-type', mime_content_type($filePath));
        $response->headers->set('Content-Disposition', 'attachment; filename="' . $filename . '";');
        $response->headers->set('Content-Length', filesize($filePath));

        // Send headers before outputting anything
        $response->sendHeaders();

        $response->setContent(file_get_contents($filePath));

        return $response;
    }

    private function getChecksum($uid)
    {
        return substr(sha1('gnuvarioe' . $uid), 0, 5);
    }
}
