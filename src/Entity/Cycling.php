<?php

namespace App\Entity;

use App\Repository\CyclingRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;


#[ORM\Entity(repositoryClass: CyclingRepository::class)]
class Cycling
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
     #[Groups(['cycling'])]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
     #[Groups(['cycling'])]
    private ?string $Name = null;

    #[ORM\Column(length: 255)]
     #[Groups(['cycling'])]
    private ?string $Username = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
     #[Groups(['cycling'])]
    private ?\DateTimeInterface $Date_Of_Birth = null;

    #[ORM\Column]
     #[Groups(['cycling'])]
    private ?int $Weight = null;

    #[ORM\Column]
     #[Groups(['cycling'])]
    private ?int $Size = null;

    #[ORM\Column(length: 255)]
    #[Groups(['cycling'])]
    private ?string $Team = null;
    
    #[ORM\Column(length: 255)]
    #[Groups(['cycling'])]
    private ?string $Nationality = null;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getUsername(): ?string
    {
        return $this->Username;
    }

    public function setUsername(string $Username): static
    {
        $this->Username = $Username;

        return $this;
    }

    public function getDateOfBirth(): ?\DateTimeInterface
    {
        return $this->Date_Of_Birth;
    }

    public function setDateOfBirth(\DateTimeInterface $Date_Of_Birth): static
    {
        $this->Date_Of_Birth = $Date_Of_Birth;

        return $this;
    }

    public function getWeight(): ?int
    {
        return $this->Weight;
    }

    public function setWeight(int $Weight): static
    {
        $this->Weight = $Weight;

        return $this;
    }

    public function getSize(): ?int
    {
        return $this->Size;
    }

    public function setSize(int $Size): static
    {
        $this->Size = $Size;

        return $this;
    }

    public function getTeam(): ?string
    {
        return $this->Team;
    }

    public function setTeam(string $Team): static
    {
        $this->Team = $Team;

        return $this;
    }

    public function getNationality(): ?string
    {
        return $this->Nationality;
    }

    public function setNationality(string $Nationality): static
    {
        $this->Nationality = $Nationality;

        return $this;
    }
}
