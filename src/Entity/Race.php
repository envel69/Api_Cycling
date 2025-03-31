<?php

namespace App\Entity;

use App\Repository\RaceRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RaceRepository::class)]
class Race
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Country = null;

    #[ORM\Column(length: 255)]
    private ?string $Name = null;

    #[ORM\Column(length: 255)]
    private ?string $Id_Stage = null;

    #[ORM\Column(length: 255)]
    private ?string $Teams = null;

    #[ORM\Column(length: 255)]
    private ?string $Id_country = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCountry(): ?string
    {
        return $this->Country;
    }

    public function setCountry(string $Country): static
    {
        $this->Country = $Country;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->Name;
    }

    public function setName(string $Name): static
    {
        $this->Name = $Name;

        return $this;
    }

    public function getIdStage(): ?string
    {
        return $this->Id_Stage;
    }

    public function setIdStage(string $Id_Stage): static
    {
        $this->Id_Stage = $Id_Stage;

        return $this;
    }

    public function getTeams(): ?string
    {
        return $this->Teams;
    }

    public function setTeams(string $Teams): static
    {
        $this->Teams = $Teams;

        return $this;
    }

    public function getIdCountry(): ?string
    {
        return $this->Id_country;
    }

    public function setIdCountry(string $Id_country): static
    {
        $this->Id_country = $Id_country;

        return $this;
    }
}
