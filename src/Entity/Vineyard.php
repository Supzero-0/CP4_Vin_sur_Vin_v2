<?php

namespace App\Entity;

use App\Repository\VineyardRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VineyardRepository::class)]
class Vineyard
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\OneToMany(mappedBy: 'vineyard', targetEntity: Wine::class)]
    private Collection $wines;

    public function __construct()
    {
        $this->wines = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection<int, Wine>
     */
    public function getWines(): Collection
    {
        return $this->wines;
    }

    public function addWines(Wine $wines): self
    {
        if (!$this->wines->contains($wines)) {
            $this->wines->add($wines);
            $wines->setVineyard($this);
        }

        return $this;
    }

    public function removeWines(Wine $wines): self
    {
        if ($this->wines->removeElement($wines)) {
            // set the owning side to null (unless already changed)
            if ($wines->getVineyard() === $this) {
                $wines->setVineyard(null);
            }
        }

        return $this;
    }
}
