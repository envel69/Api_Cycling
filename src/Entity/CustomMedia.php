<?php

namespace App\Entity;

use App\Repository\CustomMediaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CustomMediaRepository::class)]
class CustomMedia
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $realname = null;

    #[ORM\Column(length: 255)]
    private ?string $realPatch = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRealname(): ?string
    {
        return $this->realname;
    }

    public function setRealname(string $realname): static
    {
        $this->realname = $realname;

        return $this;
    }

    public function getRealPatch(): ?string
    {
        return $this->realPatch;
    }

    public function setRealPatch(string $realPatch): static
    {
        $this->realPatch = $realPatch;

        return $this;
    }
}
