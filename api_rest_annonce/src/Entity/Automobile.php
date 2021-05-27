<?php

namespace App\Entity;

use App\Repository\AutomobileRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AutomobileRepository::class)
 */
class Automobile
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
    private $fuel;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $price;

    /**
     * @ORM\ManyToMany(targetEntity=Ad::class, inversedBy="automobiles")
     */
    private $automobile;

    public function __construct()
    {
        $this->automobile = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFuel(): ?string
    {
        return $this->fuel;
    }

    public function setFuel(string $fuel): self
    {
        $this->fuel = $fuel;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(?float $price): self
    {
        $this->price = $price;

        return $this;
    }

    /**
     * @return Collection|Ad[]
     */
    public function getAutomobile(): Collection
    {
        return $this->automobile;
    }

    public function addAutomobile(Ad $automobile): self
    {
        if (!$this->automobile->contains($automobile)) {
            $this->automobile[] = $automobile;
        }

        return $this;
    }

    public function removeAutomobile(Ad $automobile): self
    {
        $this->automobile->removeElement($automobile);

        return $this;
    }
}
