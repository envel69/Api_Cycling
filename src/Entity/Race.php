<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity]
class Race
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['race'])]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Groups(['race'])]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    #[Groups(['race'])]
    private ?string $location = null;

    #[ORM\Column(type: "datetime")]
    #[Groups(['race'])]
    private ?\DateTimeInterface $startDate = null;

    #[ORM\Column(type: "datetime", nullable: true)]
    #[Groups(['race'])]
    private ?\DateTimeInterface $endDate = null;

    public function getId(): ?int { return $this->id; }
    public function getName(): ?string { return $this->name; }
    public function setName(string $name): self { $this->name = $name; return $this; }
    public function getLocation(): ?string { return $this->location; }
    public function setLocation(string $location): self { $this->location = $location; return $this; }
    public function getStartDate(): ?\DateTimeInterface { return $this->startDate; }
    public function setStartDate(\DateTimeInterface $startDate): self { $this->startDate = $startDate; return $this; }
    public function getEndDate(): ?\DateTimeInterface { return $this->endDate; }
    public function setEndDate(?\DateTimeInterface $endDate): self { $this->endDate = $endDate; return $this; }
}
