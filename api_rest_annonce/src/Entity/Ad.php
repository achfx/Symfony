<?php

namespace App\Entity;

use App\Repository\AdRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AdRepository::class)
 */
class Ad
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
    private $title;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $content;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $category;

    /**
     * @ORM\ManyToMany(targetEntity=Automobile::class, mappedBy="automobile")
     */
    private $automobiles;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="ads")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\ManyToMany(targetEntity=Employement::class, mappedBy="ad")
     */
    private $employements;

    /**
     * @ORM\ManyToMany(targetEntity=Immovable::class, mappedBy="ad")
     */
    private $immovables;

    public function __construct()
    {
        $this->automobiles = new ArrayCollection();
        $this->employements = new ArrayCollection();
        $this->immovables = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getCategory(): ?string
    {
        return $this->category;
    }

    public function setCategory(string $category): self
    {
        $this->category = $category;

        return $this;
    }

    /**
     * @return Collection|Automobile[]
     */
    public function getAutomobiles(): Collection
    {
        return $this->automobiles;
    }

    public function addAutomobile(Automobile $automobile): self
    {
        if (!$this->automobiles->contains($automobile)) {
            $this->automobiles[] = $automobile;
            $automobile->addAutomobile($this);
        }

        return $this;
    }

    public function removeAutomobile(Automobile $automobile): self
    {
        if ($this->automobiles->removeElement($automobile)) {
            $automobile->removeAutomobile($this);
        }

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return Collection|Employement[]
     */
    public function getEmployements(): Collection
    {
        return $this->employements;
    }

    public function addEmployement(Employement $employement): self
    {
        if (!$this->employements->contains($employement)) {
            $this->employements[] = $employement;
            $employement->addAd($this);
        }

        return $this;
    }

    public function removeEmployement(Employement $employement): self
    {
        if ($this->employements->removeElement($employement)) {
            $employement->removeAd($this);
        }

        return $this;
    }

    /**
     * @return Collection|Immovable[]
     */
    public function getImmovables(): Collection
    {
        return $this->immovables;
    }

    public function addImmovable(Immovable $immovable): self
    {
        if (!$this->immovables->contains($immovable)) {
            $this->immovables[] = $immovable;
            $immovable->addAd($this);
        }

        return $this;
    }

    public function removeImmovable(Immovable $immovable): self
    {
        if ($this->immovables->removeElement($immovable)) {
            $immovable->removeAd($this);
        }

        return $this;
    }
}
