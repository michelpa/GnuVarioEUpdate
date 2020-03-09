<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
/**
 * @ORM\Entity(repositoryClass="App\Repository\VarioVersionDownloadLogRepository")
 */
class VarioVersionDownloadLog
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;


    /**
     * @ORM\Column(type="datetime", nullable=true)
     *  @Gedmo\Timestampable(on="create")
     */
    private $created;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     *  @Gedmo\Timestampable(on="update")
     */
    private $updated;

     /**
     * @ORM\ManyToOne(targetEntity="VarioVersion", inversedBy="downloadLog")
     */
    private $varioVersion;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $uid;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUid(): ?string
    {
        return $this->uid;
    }

    public function setUid(string $uid): self
    {
        $this->uid = $uid;

        return $this;
    }

    public function getCreated(): ?\DateTimeInterface
    {
        return $this->created;
    }

    public function setCreated(?\DateTimeInterface $created): self
    {
        $this->created = $created;

        return $this;
    }

    public function getUpdated(): ?\DateTimeInterface
    {
        return $this->updated;
    }

    public function setUpdated(?\DateTimeInterface $updated): self
    {
        $this->updated = $updated;

        return $this;
    }

    public function getVarioVersion(): ?VarioVersion
    {
        return $this->varioVersion;
    }

    public function setVarioVersion(?VarioVersion $varioVersion): self
    {
        $this->varioVersion = $varioVersion;

        return $this;
    }
}
