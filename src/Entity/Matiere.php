<?php

namespace App\Entity;

use App\Repository\MatiereRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MatiereRepository::class)
 */
class Matiere
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;
/**
    * @ORM\ManyToOne(targetEntity=Classe::class)
    */
    protected $classe;
    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;
    /**
 * @ORM\ManyToOne(targetEntity=User::class)
 */
    protected $user;

    /**
     * @ORM\ManyToOne(targetEntity=Periodes::class)
     */
    protected $semestre;

    public function __construct()
    {
        $this->user = new ArrayCollection();
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

   

    public function getClasse(): ?Classe
    {
        return $this->classe;
    }

    public function setClasse(?Classe $classe): self
    {
        $this->classe = $classe;

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getUser(): Collection
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getSemestre(): ?Periodes
    {
        return $this->semestre;
    }

    public function setSemestre(?Periodes $semestre): self
    {
        $this->semestre = $semestre;

        return $this;
    }


}
