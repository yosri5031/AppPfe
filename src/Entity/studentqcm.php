<?php

namespace App\Entity;

use App\Repository\studentqcmRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=studentqcmRepository::class)
 */
class studentqcm
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Matiere::class)
     */
    protected $matiere;

    /**
     * @ORM\ManyToOne(targetEntity=User::class)
     */
    protected $user;

    /**
     * @ORM\ManyToOne(targetEntity=Questionnaire::class)
     */
    protected $question;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $note='1';


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNote(): ?string
    {
        return $this->note;
    }

    public function setNote(string $note): self
    {
        $this->note = $note;

        return $this;
    }

    public function getMatiere(): ?Matiere
    {
        return $this->matiere;
    }

    public function setMatiere(?Matiere $matiere): self
    {
        $this->matiere = $matiere;

        return $this;
    }



    public function getQuestion(): ?Questionnaire
    {
        return $this->question;
    }

    public function setQuestion(?Questionnaire $question): self
    {
        $this->question = $question;

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




}
