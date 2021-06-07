<?php

namespace App\Entity;

use App\Repository\MatiersRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MatiersRepository::class)
 */
class Matiers
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $id_periode;

    /**
     * @ORM\Column(type="integer")
     */
    private $id_classe;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="integer")
     */
    private $id_department;

    
    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }
    public function getIdPeriode(): ?int
    {
        return $this->id_periode;
    }

    public function setIdPeriode(int $id_periode): self
    {
        $this->id_periode = $id_periode;

        return $this;
    }

    public function getIdClasse(): ?int
    {
        return $this->id_classe;
    }

    public function setIdClasse(int $id_classe): self
    {
        $this->id_classe = $id_classe;

        return $this;
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

    public function getIdDepartment(): ?int
    {
        return $this->id_department;
    }

    public function setIdDepartment(int $id_department): self
    {
        $this->id_department = $id_department;

        return $this;
    }
}
