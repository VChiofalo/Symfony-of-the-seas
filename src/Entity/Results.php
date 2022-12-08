<?php

namespace App\Entity;

use App\Repository\ResultsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ResultsRepository::class)]
class Results
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Label = null;

    #[ORM\Column(length: 255)]
    private ?string $min = null;

    #[ORM\Column(length: 255)]
    private ?string $max = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLabel(): ?string
    {
        return $this->Label;
    }

    public function setLabel(string $Label): self
    {
        $this->Label = $Label;

        return $this;
    }

    public function getMin(): ?string
    {
        return $this->min;
    }

    public function setMin(string $min): self
    {
        $this->min = $min;

        return $this;
    }

    public function getMax(): ?string
    {
        return $this->max;
    }

    public function setMax(string $max): self
    {
        $this->max = $max;

        return $this;
    }
}
