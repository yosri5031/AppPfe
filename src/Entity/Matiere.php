<?php

namespace App\Entity;

use App\Repository\MatiereRepository;
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
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="integer")
     */
    private $id_dept;

    /**
     * @ORM\Column(type="integer")
     */
    private $id_periode;

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

    public function getIdDept(): ?int
    {
        return $this->id_dept;
    }

    public function setIdDept(int $id_dept): self
    {
        $this->id_dept = $id_dept;

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
}
