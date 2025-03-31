<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity]
class Ranking
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['ranking'])]
    private ?int $id = null;

    #[ORM\Column]
    #[Groups(['ranking'])]
    private ?int $position = null;

    #[ORM\Column]
    #[Groups(['ranking'])]
    private ?int $points = null;

    #[ORM\Column(length: 255)]
    #[Groups(['ranking'])]
    private ?string $cyclistName = null;

    public function getId(): ?int { return $this->id; }
    public function getPosition(): ?int { return $this->position; }
    public function setPosition(int $position): self { $this->position = $position; return $this; }
    public function getPoints(): ?int { return $this->points; }
    public function setPoints(int $points): self { $this->points = $points; return $this; }
    public function getCyclistName(): ?string { return $this->cyclistName; }
    public function setCyclistName(string $cyclistName): self { $this->cyclistName = $cyclistName; return $this; }
}
