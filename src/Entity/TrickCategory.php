<?php

namespace App\Entity;

use App\Repository\TrickCategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=TrickCategoryRepository::class)
 */
class TrickCategory
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @Assert\NotBlank(message = "Veuillez entrer un nom de catégorie.")
     * @Assert\Length(
     *      min = 2,
     *      max = 100,
     *      minMessage = "Le nom de la catégorie doit contenir au moins {{ limit }} caractères",
     *      maxMessage = "Le nom de la catégorie ne doit pas contenir plus de {{ limit }} caractères"
     * )
     * @ORM\Column(type="string", length=100)
     */
    private $name;

    /**
     * @ORM\ManyToOne(targetEntity=Trick::class, inversedBy="trick_category")
     * @ORM\JoinColumn(nullable=false)
     */
    private $trick;


    public function __construct()
    {
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

    public function getTrick(): ?Trick
    {
        return $this->trick;
    }

    public function setTrick(?Trick $trick): self
    {
        $this->trick = $trick;

        return $this;
    }

}
