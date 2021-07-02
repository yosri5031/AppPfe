<?php

namespace App\Entity;

use App\Repository\PeriodesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

use Doctrine\ORM\Mapping as ORM;
use App\Entity\Departments;


/**
 * @ORM\Entity(repositoryClass=PeriodesRepository::class)
 */
class Periodes
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     */
    private $semestre;

    /**
     * @ORM\Column(type="string")
     */
    private $annee;

    /**
     * @ORM\Column(type="integer")
     */
    private $courante;


    public function __construct()
    {
        $this->department = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    

    public function getAnnee(): ?string
    {
        return $this->annee;
    }

    public function setAnnee(string $annee): self
    {
        $this->annee = $annee;

        return $this;
    }

    public function getCourante(): ?int
    {
        return $this->courante;
    }

    public function setCourante(int $courante): self
    {
        $this->courante = $courante;

        return $this;
    }

    public function getSemestre(): ?string
    {
        return $this->semestre;
    }

    public function setSemestre(string $semestre): self
    {
        $this->semestre = $semestre;

        return $this;
    }
    
    
}



