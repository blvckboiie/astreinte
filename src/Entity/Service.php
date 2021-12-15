<?php

namespace App\Entity;

use App\Repository\ServiceRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ServiceRepository::class)
 */
class Service
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
    private $nom_service;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $perimetre;

    /**
     * @ORM\ManyToOne(targetEntity=Departement::class, inversedBy="services")
     * @ORM\JoinColumn(nullable=false)
     */
    private $departement;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomService(): ?string
    {
        return $this->nom_service;
    }

    public function setNomService(string $nom_service): self
    {
        $this->nom_service = $nom_service;

        return $this;
    }

    public function getPerimetre(): ?string
    {
        return $this->perimetre;
    }

    public function setPerimetre(string $perimetre): self
    {
        $this->perimetre = $perimetre;

        return $this;
    }

    public function getDepartement(): ?Departement
    {
        return $this->departement;
    }

    public function setDepartement(?Departement $departement): self
    {
        $this->departement = $departement;

        return $this;
    }
    public function __toString()
    {
        return $this->nom_service;
    }
}
