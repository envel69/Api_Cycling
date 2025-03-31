<?php

namespace App\Entity;

use App\Repository\StageRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StageRepository::class)]
class Stage
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $Date = null;

    #[ORM\Column(type: Types::BIGINT)]
    private ?string $Id_Controls = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(string $Id): static
    {
        $this->Id = $Id;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->Date;
    }

    public function setDate(\DateTimeInterface $Date): static
    {
        $this->Date = $Date;

        return $this;
    }

    public function getIdControls(): ?string
    {
        return $this->Id_Controls;
    }

    public function setIdControls(string $Id_Controls): static
    {
        $this->Id_Controls = $Id_Controls;

        return $this;
    }
}
