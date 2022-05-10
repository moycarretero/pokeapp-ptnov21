<?php

namespace App\Entity;

use App\Repository\PokemonRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: PokemonRepository::class)]
class Pokemon
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $name;

    #[ORM\Column(type: 'text', nullable: true)]
    private $decription;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $image;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $code;

    #[ORM\ManyToMany(targetEntity: Debilidad::class, mappedBy: 'pokemons')]
    private $debilidades;

    public function __construct()
    {
        $this->debilidades = new ArrayCollection();
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

    public function getDecription(): ?string
    {
        return $this->decription;
    }

    public function setDecription(?string $decription): self
    {
        $this->decription = $decription;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getCode(): ?int
    {
        return $this->code;
    }

    public function setCode(?int $code): self
    {
        $this->code = $code;

        return $this;
    }

    /**
     * @return Collection<int, Debilidad>
     */
    public function getDebilidades(): Collection
    {
        return $this->debilidades;
    }

    public function addDebilidade(Debilidad $debilidade): self
    {
        if (!$this->debilidades->contains($debilidade)) {
            $this->debilidades[] = $debilidade;
            $debilidade->addPokemon($this);
        }

        return $this;
    }

    public function removeDebilidade(Debilidad $debilidade): self
    {
        if ($this->debilidades->removeElement($debilidade)) {
            $debilidade->removePokemon($this);
        }

        return $this;
    }
}
