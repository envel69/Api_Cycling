<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity]
class Stage
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['stage'])]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Groups(['stage'])]
    private ?string $name = null;

    #[ORM\Column]
    #[Groups(['stage'])]
    private ?int $orderNumber = null;

    #[ORM\Column(type: "datetime")]
    #[Groups(['stage'])]
    private ?\DateTimeInterface $date = null;

    public function getId(): ?int { return $this->id; }
    public function getName(): ?string { return $this->name; }
    public function setName(string $name): self { $this->name = $name; return $this; }
    public function getOrderNumber(): ?int { return $this->orderNumber; }
    public function setOrderNumber(int $orderNumber): self { $this->orderNumber = $orderNumber; return $this; }
    public function getDate(): ?\DateTimeInterface { return $this->date; }
    public function setDate(\DateTimeInterface $date): self { $this->date = $date; return $this; }
}
