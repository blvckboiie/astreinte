<?php

namespace App\Entity;

use App\Repository\DepartementRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DepartementRepository::class)
 */
class Departement
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom_departement;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom_direction;

    /**
     * @ORM\OneToMany(targetEntity=Service::class, mappedBy="departement")
     */
    private $services;

    public function __construct()
    {
        $this->services = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomDepartement(): ?string
    {
        return $this->nom_departement;
    }

    public function setNomDepartement(string $nom_departement): self
    {
        $this->nom_departement = $nom_departement;

        return $this;
    }

    public function getNomDirection(): ?string
    {
        return $this->nom_direction;
    }

    public function setNomDirection(string $nom_direction): self
    {
        $this->nom_direction = $nom_direction;

        return $this;
    }

    /**
     * @return Collection|Service[]
     */
    public function getServices(): Collection
    {
        return $this->services;
    }

    public function addService(Service $service): self
    {
        if (!$this->services->contains($service)) {
            $this->services[] = $service;
            $service->setDepartement($this);
        }

        return $this;
    }

    public function removeService(Service $service): self
    {
        if ($this->services->removeElement($service)) {
            // set the owning side to null (unless already changed)
            if ($service->getDepartement() === $this) {
                $service->setDepartement(null);
            }
        }

        return $this;
    }
    public function __toString()
    {
        return $this->nom_departement;
    }
}
