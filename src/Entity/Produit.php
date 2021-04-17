<?php

namespace App\Entity;

use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;



/**
 * @ORM\Entity(repositoryClass="App\Repository\ProduitRepository")
 * @Vich\Uploadable
 * 
 */
class Produit
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    
    /**
     * @var string|null
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $fileName;

    /**
    * @var file|null
    * @Vich\UploadableField(mapping="produit_image", fileNameProperty="fileName")
    */
    private $imageFile;


    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $designation;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Famille", inversedBy="produits")
     * @ORM\JoinColumn(nullable=false)
     */
    private $famille;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Allergene")
     */
    private $allergene;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Magasin", inversedBy="produits")
     * 
     */
    private $magasin;


    public function __construct()
    {
        $this->allergene = new ArrayCollection();
        $this->magasin = new ArrayCollection();
    }



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getDesignation(): ?string
    {
        return $this->designation;
    }

    public function setDesignation(string $designation): self
    {
        $this->designation = $designation;

        return $this;
    }

    public function getFamille(): ?Famille
    {
        return $this->famille;
    }

    public function setFamille(?Famille $famille): self
    {
        $this->famille = $famille;

        return $this;
    }

    /**
     * @return Collection|Allergene[]
     */
    public function getAllergene(): Collection
    {
        return $this->allergene;
    }

    public function addAllergene(Allergene $allergene): self
    {
        if (!$this->allergene->contains($allergene)) {
            $this->allergene[] = $allergene;
        }

        return $this;
    }

    public function removeAllergene(Allergene $allergene): self
    {
        if ($this->allergene->contains($allergene)) {
            $this->allergene->removeElement($allergene);
        }

        return $this;
    }

    /**
     * @return Collection|Magasin[]
     */
    public function getMagasin(): Collection
    {
        return $this->magasin;
    }

    public function addMagasin(Magasin $magasin): self
    {
        if (!$this->magasin->contains($magasin)) {
            $this->magasin[] = $magasin;
        }

        return $this;
    }

    public function removeMagasin(Magasin $magasin): self
    {
        if ($this->magasin->contains($magasin)) {
            $this->magasin->removeElement($magasin);
        }

        return $this;
    }

    public function __toString()
    {
        return (string) $this->getId();
    }

    public function getFileName(): ?string
    {
        return $this->fileName;
    }

    public function setFileName(string $fileName): self
    {
        $this->fileName = $fileName;

        return $this;
    }


    /**
     * @return null|File
     */
    public function getImageFile() : ?file
    {
        return $this->imageFile;
    }

    /**
     * @param null|File $imageFile
     * @return Produit
     */
    public function setImageFile( $imageFile)
    {
        $this->imageFile = $imageFile;
        return $this;
    }
 
}
