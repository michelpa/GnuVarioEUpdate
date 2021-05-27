<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ORM\Entity(repositoryClass="App\Repository\VarioVersionRepository")
 * @Vich\Uploadable
 */
class VarioVersion
{

    const TYPE_Gnuvario154 = "Gnuvario154";
    const TYPE_Gnuvario154b = "Gnuvario154b";

    const TYPE_Gnuvario254 = "Gnuvario254";
    const TYPE_Gnuvario254b = "Gnuvario254b";

    const TYPE_Gnuvario290 = "Gnuvario290";
    const TYPE_Gnuvario290b = "Gnuvario290b";

    const TYPE_Gnuvario291 = "Gnuvario291";
    const TYPE_Gnuvario291b = "Gnuvario291b";

    const TYPE_Gnuvario292 = "Gnuvario292";
    const TYPE_Gnuvario292b = "Gnuvario292b";

    const TYPE_Gnuvario293 = "Gnuvario293";
    const TYPE_Gnuvario293b = "Gnuvario293b";

    const TYPE_Gnuvario294 = "Gnuvario294";
    const TYPE_Gnuvario294b = "Gnuvario294b";

    const TYPE_Gnuvario354 = "Gnuvario354";
    const TYPE_Gnuvario354b = "Gnuvario354b";

    const TYPE_Gnuvario390 = "Gnuvario390";
    const TYPE_Gnuvario390b = "Gnuvario390b";

    const TYPE_Gnuvario391 = "Gnuvario391";
    const TYPE_Gnuvario391b = "Gnuvario391b";

    const TYPE_Gnuvario395 = "Gnuvario395";
    const TYPE_Gnuvario395b = "Gnuvario395b";

    const TYPE_Gnuvario396 = "Gnuvario396";
    const TYPE_Gnuvario396b = "Gnuvario396b";

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity="VarioVersionDownloadLog", mappedBy="varioVersion")
     * @ORM\OrderBy({"created" = "DESC"})
     */
    private $downloadLog;

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
     * @ORM\Column(type="string", length=255)
     */
    private $firmwareType;

    /**
     * @ORM\Column(type="integer")
     */
    private $version;

    /**
     * @ORM\Column(type="integer")
     */
    private $subversion;

    /**
     * @ORM\Column(type="integer")
     */
    private $betaversion;


    /**
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     * 
     * @Vich\UploadableField(mapping="update_file", fileNameProperty="bin")
     * 
     * @var File|null
     */
    private $binFile;

    /**
     * @ORM\Column(type="string", length=1024, nullable=true)
     */
    private $bin;

    /**
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     * 
     * @Vich\UploadableField(mapping="update_file", fileNameProperty="www1")
     * 
     * @var File|null
     */
    private $www1File;

    /**
     * @ORM\Column(type="string", length=1024, nullable=true)
     */
    private $www1;

    /**
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     * 
     * @Vich\UploadableField(mapping="update_file", fileNameProperty="www2")
     * 
     * @var File|null
     */
    private $www2File;

    /**
     * @ORM\Column(type="string", length=1024, nullable=true)
     */
    private $www2;

    /**
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     * 
     * @Vich\UploadableField(mapping="update_file", fileNameProperty="www3")
     * 
     * @var File|null
     */
    private $www3File;

    /**
     * @ORM\Column(type="string", length=1024, nullable=true)
     */
    private $www3;

    /**
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     * 
     * @Vich\UploadableField(mapping="update_file", fileNameProperty="www4")
     * 
     * @var File|null
     */
    private $www4File;

    /**
     * @ORM\Column(type="string", length=1024, nullable=true)
     */
    private $www4;

    /**
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     * 
     * @Vich\UploadableField(mapping="update_file", fileNameProperty="www5")
     * 
     * @var File|null
     */
    private $www5File;
    /**
     * @ORM\Column(type="string", length=1024, nullable=true)
     */
    private $www5;

    /**
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     * 
     * @Vich\UploadableField(mapping="update_file", fileNameProperty="www6")
     * 
     * @var File|null
     */
    private $www6File;

    /**
     * @ORM\Column(type="string", length=1024, nullable=true)
     */
    private $www6;

    /**
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     * 
     * @Vich\UploadableField(mapping="update_file", fileNameProperty="www7")
     * 
     * @var File|null
     */
    private $www7File;

    /**
     * @ORM\Column(type="string", length=1024, nullable=true)
     */
    private $www7;

    /**
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     * 
     * @Vich\UploadableField(mapping="update_file", fileNameProperty="www8")
     * 
     * @var File|null
     */
    private $www8File;

    /**
     * @ORM\Column(type="string", length=1024, nullable=true)
     */
    private $www8;

    /**
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     * 
     * @Vich\UploadableField(mapping="update_file", fileNameProperty="www9")
     * 
     * @var File|null
     */
    private $www9File;

    /**
     * @ORM\Column(type="string", length=1024, nullable=true)
     */
    private $www9;

    /**
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     * 
     * @Vich\UploadableField(mapping="update_file", fileNameProperty="www10")
     * 
     * @var File|null
     */
    private $www10File;

    /**
     * @ORM\Column(type="string", length=1024, nullable=true)
     */
    private $www10;

    /**
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     * 
     * @Vich\UploadableField(mapping="update_file", fileNameProperty="gzwww")
     * 
     * @var File|null
     */
    private $gzwwwFile;

    /**
     * @ORM\Column(type="string", length=1024, nullable=true)
     */
    private $gzwww;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isActive;

    const FirmwareTypeChoices = [
        self::TYPE_Gnuvario154 => self::TYPE_Gnuvario154,
        self::TYPE_Gnuvario154b => self::TYPE_Gnuvario154b,

        self::TYPE_Gnuvario254 => self::TYPE_Gnuvario254,
        self::TYPE_Gnuvario254b => self::TYPE_Gnuvario254b,

        self::TYPE_Gnuvario290 => self::TYPE_Gnuvario290,
        self::TYPE_Gnuvario290b => self::TYPE_Gnuvario290b,

        self::TYPE_Gnuvario291 => self::TYPE_Gnuvario291,
        self::TYPE_Gnuvario291b => self::TYPE_Gnuvario291b,
        
        self::TYPE_Gnuvario292 => self::TYPE_Gnuvario292,
        self::TYPE_Gnuvario292b => self::TYPE_Gnuvario292b,

        self::TYPE_Gnuvario293 => self::TYPE_Gnuvario293,
        self::TYPE_Gnuvario293b => self::TYPE_Gnuvario293b,

        self::TYPE_Gnuvario294 => self::TYPE_Gnuvario294,
        self::TYPE_Gnuvario294b => self::TYPE_Gnuvario294b,

        self::TYPE_Gnuvario354 => self::TYPE_Gnuvario354,
        self::TYPE_Gnuvario354b => self::TYPE_Gnuvario354b,

        self::TYPE_Gnuvario390 => self::TYPE_Gnuvario390,
        self::TYPE_Gnuvario390b => self::TYPE_Gnuvario390b,

        self::TYPE_Gnuvario391 => self::TYPE_Gnuvario391,
        self::TYPE_Gnuvario391b => self::TYPE_Gnuvario391b,

        self::TYPE_Gnuvario395 => self::TYPE_Gnuvario395,
        self::TYPE_Gnuvario395b => self::TYPE_Gnuvario395b,

        self::TYPE_Gnuvario396 => self::TYPE_Gnuvario396,
        self::TYPE_Gnuvario396b => self::TYPE_Gnuvario396b
    ];


    public function __construct()
    {
        $this->downloadLog = new ArrayCollection();
        $this->created = new \DateTime();
    }

    public function hasWeb()
    {
        for ($i = 1; $i < 11; $i++) {
            $method = 'getWww' . $i;
            $hasWeb = false;
            if ($w = $this->$method()) {
                $hasWeb = true;
            }
            return $hasWeb;
        }
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirmwareType(): ?string
    {
        return $this->firmwareType;
    }

    public function setFirmwareType(string $firmwareType): self
    {
        $this->firmwareType = $firmwareType;

        return $this;
    }

    public function getVersion(): ?int
    {
        return $this->version;
    }

    public function setVersion(int $version): self
    {
        $this->version = $version;

        return $this;
    }

    public function getSubversion(): ?int
    {
        return $this->subversion;
    }

    public function setSubversion(int $subversion): self
    {
        $this->subversion = $subversion;

        return $this;
    }

    public function getBetaversion(): ?int
    {
        return $this->betaversion;
    }

    public function setBetaversion(int $betaversion): self
    {
        $this->betaversion = $betaversion;

        return $this;
    }


    public function getWww1(): ?string
    {
        return $this->www1;
    }

    public function setWww1(?string $www1): self
    {
        $this->www1 = $www1;

        return $this;
    }

    public function getWww2(): ?string
    {
        return $this->www2;
    }

    public function setWww2(?string $www2): self
    {
        $this->www2 = $www2;

        return $this;
    }

    public function getWww3(): ?string
    {
        return $this->www3;
    }

    public function setWww3(?string $www3): self
    {
        $this->www3 = $www3;

        return $this;
    }

    public function getWww4(): ?string
    {
        return $this->www4;
    }

    public function setWww4(?string $www4): self
    {
        $this->www4 = $www4;

        return $this;
    }

    public function getWww5(): ?string
    {
        return $this->www5;
    }

    public function setWww5(?string $www5): self
    {
        $this->www5 = $www5;

        return $this;
    }

    public function getWww6(): ?string
    {
        return $this->www6;
    }

    public function setWww6(?string $www6): self
    {
        $this->www6 = $www6;

        return $this;
    }

    public function getWww7(): ?string
    {
        return $this->www7;
    }

    public function setWww7(?string $www7): self
    {
        $this->www7 = $www7;

        return $this;
    }

    public function getWww8(): ?string
    {
        return $this->www8;
    }

    public function setWww8(?string $www8): self
    {
        $this->www8 = $www8;

        return $this;
    }

    public function getWww9(): ?string
    {
        return $this->www9;
    }

    public function setWww9(?string $www9): self
    {
        $this->www9 = $www9;

        return $this;
    }

    public function getWww10(): ?string
    {
        return $this->www10;
    }

    public function setWww10(?string $www10): self
    {
        $this->www10 = $www10;

        return $this;
    }

    /**
     * If manually uploading a file (i.e. not using Symfony Form) ensure an instance
     * of 'UploadedFile' is injected into this setter to trigger the update. If this
     * bundle's configuration parameter 'inject_on_load' is set to 'true' this setter
     * must be able to accept an instance of 'File' as the bundle will inject one here
     * during Doctrine hydration.
     *
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile|null $imageFile
     */
    public function setBinFile(?File $binFile = null): void
    {
        $this->binFile = $binFile;

        if (null !== $binFile) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updated = new \DateTimeImmutable();
        }
    }

    public function getBinFile(): ?File
    {
        return $this->binFile;
    }

    /**
     * If manually uploading a file (i.e. not using Symfony Form) ensure an instance
     * of 'UploadedFile' is injected into this setter to trigger the update. If this
     * bundle's configuration parameter 'inject_on_load' is set to 'true' this setter
     * must be able to accept an instance of 'File' as the bundle will inject one here
     * during Doctrine hydration.
     *
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile|null $imageFile
     */
    public function setWww1File(?File $www1File = null): void
    {
        $this->www1File = $www1File;

        if (null !== $www1File) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updated = new \DateTimeImmutable();
        }
    }

    public function getWww1File(): ?File
    {
        return $this->www1File;
    }


    /**
     * If manually uploading a file (i.e. not using Symfony Form) ensure an instance
     * of 'UploadedFile' is injected into this setter to trigger the update. If this
     * bundle's configuration parameter 'inject_on_load' is set to 'true' this setter
     * must be able to accept an instance of 'File' as the bundle will inject one here
     * during Doctrine hydration.
     *
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile|null $imageFile
     */
    public function setWww2File(?File $www2File = null): void
    {
        $this->www2File = $www2File;

        if (null !== $www2File) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updated = new \DateTimeImmutable();
        }
    }

    public function getWww2File(): ?File
    {
        return $this->www2File;
    }


    /**
     * If manually uploading a file (i.e. not using Symfony Form) ensure an instance
     * of 'UploadedFile' is injected into this setter to trigger the update. If this
     * bundle's configuration parameter 'inject_on_load' is set to 'true' this setter
     * must be able to accept an instance of 'File' as the bundle will inject one here
     * during Doctrine hydration.
     *
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile|null $imageFile
     */
    public function setWww3File(?File $www3File = null): void
    {
        $this->www3File = $www3File;

        if (null !== $www3File) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updated = new \DateTimeImmutable();
        }
    }

    public function getWww3File(): ?File
    {
        return $this->www3File;
    }


    /**
     * If manually uploading a file (i.e. not using Symfony Form) ensure an instance
     * of 'UploadedFile' is injected into this setter to trigger the update. If this
     * bundle's configuration parameter 'inject_on_load' is set to 'true' this setter
     * must be able to accept an instance of 'File' as the bundle will inject one here
     * during Doctrine hydration.
     *
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile|null $imageFile
     */
    public function setWww4File(?File $www4File = null): void
    {
        $this->www4File = $www4File;

        if (null !== $www4File) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updated = new \DateTimeImmutable();
        }
    }

    public function getWww4File(): ?File
    {
        return $this->www4File;
    }


    /**
     * If manually uploading a file (i.e. not using Symfony Form) ensure an instance
     * of 'UploadedFile' is injected into this setter to trigger the update. If this
     * bundle's configuration parameter 'inject_on_load' is set to 'true' this setter
     * must be able to accept an instance of 'File' as the bundle will inject one here
     * during Doctrine hydration.
     *
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile|null $imageFile
     */
    public function setWww5File(?File $www5File = null): void
    {
        $this->www5File = $www5File;

        if (null !== $www5File) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updated = new \DateTimeImmutable();
        }
    }

    public function getWww5File(): ?File
    {
        return $this->www5File;
    }


    /**
     * If manually uploading a file (i.e. not using Symfony Form) ensure an instance
     * of 'UploadedFile' is injected into this setter to trigger the update. If this
     * bundle's configuration parameter 'inject_on_load' is set to 'true' this setter
     * must be able to accept an instance of 'File' as the bundle will inject one here
     * during Doctrine hydration.
     *
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile|null $imageFile
     */
    public function setWww6File(?File $www6File = null): void
    {
        $this->www6File = $www6File;

        if (null !== $www6File) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updated = new \DateTimeImmutable();
        }
    }

    public function getWww6File(): ?File
    {
        return $this->www6File;
    }


    /**
     * If manually uploading a file (i.e. not using Symfony Form) ensure an instance
     * of 'UploadedFile' is injected into this setter to trigger the update. If this
     * bundle's configuration parameter 'inject_on_load' is set to 'true' this setter
     * must be able to accept an instance of 'File' as the bundle will inject one here
     * during Doctrine hydration.
     *
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile|null $imageFile
     */
    public function setWww7File(?File $www7File = null): void
    {
        $this->www7File = $www7File;

        if (null !== $www7File) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updated = new \DateTimeImmutable();
        }
    }

    public function getWww7File(): ?File
    {
        return $this->www7File;
    }


    /**
     * If manually uploading a file (i.e. not using Symfony Form) ensure an instance
     * of 'UploadedFile' is injected into this setter to trigger the update. If this
     * bundle's configuration parameter 'inject_on_load' is set to 'true' this setter
     * must be able to accept an instance of 'File' as the bundle will inject one here
     * during Doctrine hydration.
     *
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile|null $imageFile
     */
    public function setWww8File(?File $www8File = null): void
    {
        $this->www8File = $www8File;

        if (null !== $www8File) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updated = new \DateTimeImmutable();
        }
    }

    public function getWww8File(): ?File
    {
        return $this->www8File;
    }


    /**
     * If manually uploading a file (i.e. not using Symfony Form) ensure an instance
     * of 'UploadedFile' is injected into this setter to trigger the update. If this
     * bundle's configuration parameter 'inject_on_load' is set to 'true' this setter
     * must be able to accept an instance of 'File' as the bundle will inject one here
     * during Doctrine hydration.
     *
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile|null $imageFile
     */
    public function setWww9File(?File $www9File = null): void
    {
        $this->www9File = $www9File;

        if (null !== $www9File) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updated = new \DateTimeImmutable();
        }
    }

    public function getWww9File(): ?File
    {
        return $this->www9File;
    }


    /**
     * If manually uploading a file (i.e. not using Symfony Form) ensure an instance
     * of 'UploadedFile' is injected into this setter to trigger the update. If this
     * bundle's configuration parameter 'inject_on_load' is set to 'true' this setter
     * must be able to accept an instance of 'File' as the bundle will inject one here
     * during Doctrine hydration.
     *
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile|null $imageFile
     */
    public function setWww10File(?File $www10File = null): void
    {
        $this->www10File = $www10File;

        if (null !== $www10File) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updated = new \DateTimeImmutable();
        }
    }

    public function getWww10File(): ?File
    {
        return $this->www10File;
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

    public function getIsActive(): ?bool
    {
        return $this->isActive;
    }

    public function setIsActive(bool $isActive): self
    {
        $this->isActive = $isActive;

        return $this;
    }

    public function getBin(): ?string
    {
        return $this->bin;
    }

    public function setBin(?string $bin): self
    {
        $this->bin = $bin;

        return $this;
    }

    /**
     * @return Collection|VarioVersionDownloadLog[]
     */
    public function getDownloadLog(): Collection
    {
        return $this->downloadLog;
    }

    public function addDownloadLog(VarioVersionDownloadLog $downloadLog): self
    {
        if (!$this->downloadLog->contains($downloadLog)) {
            $this->downloadLog[] = $downloadLog;
            $downloadLog->setVarioVersion($this);
        }

        return $this;
    }

    public function removeDownloadLog(VarioVersionDownloadLog $downloadLog): self
    {
        if ($this->downloadLog->contains($downloadLog)) {
            $this->downloadLog->removeElement($downloadLog);
            // set the owning side to null (unless already changed)
            if ($downloadLog->getVarioVersion() === $this) {
                $downloadLog->setVarioVersion(null);
            }
        }

        return $this;
    }

    public function getGzwww(): ?string
    {
        return $this->gzwww;
    }

    public function setGzwww(?string $gzwww): self
    {
        $this->gzwww = $gzwww;

        return $this;
    }

    /**
     * If manually uploading a file (i.e. not using Symfony Form) ensure an instance
     * of 'UploadedFile' is injected into this setter to trigger the update. If this
     * bundle's configuration parameter 'inject_on_load' is set to 'true' this setter
     * must be able to accept an instance of 'File' as the bundle will inject one here
     * during Doctrine hydration.
     *
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile|null $imageFile
     */
    public function setGzwwwFile(?File $gzwwwFile = null): void
    {
        $this->gzwwwFile = $gzwwwFile;

        if (null !== $gzwwwFile) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updated = new \DateTimeImmutable();
        }
    }

    public function getGzwwwFile(): ?File
    {
        return $this->gzwwwFile;
    }
}
