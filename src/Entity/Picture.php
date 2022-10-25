<?php

namespace App\Entity;

use App\Repository\PictureRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=PictureRepository::class)
 */
class Picture
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @Assert\File(
     *      maxSize: '2048k',
     *      maxSizeMessage: 'Votre fichier est trop lourd ({{ size }} {{ suffix }}). Le poids maximum autorisé est de {{ limit }} {{ suffix }}.'
     *      mimeTypes: ['image/jpeg', 'image/png'],
     *      mimeTypesMessage: 'Votre image doit être au format jpeg ou png.',
     * )
     * @Assert\Image(
     *      allowPortrait: false,
     *      allowPortraitMessage: 'Votre image doit être au format paysage.')
     * 
     * @ORM\Column(type="string", length=255)
     */
    private $path;

    /**
     * @Assert\Length(
     *      max = 150,
     *      maxMessage = "Le légende de l'image ne doit pas contenir plus de {{ limit }} caractères."
     * )
     * @ORM\Column(type="string", length=150, nullable=true)
     */
    private $caption;

    /**
     * @ORM\ManyToOne(targetEntity=Trick::class, inversedBy="pictures")
     * @ORM\JoinColumn(nullable=false)
     */
    private $trick;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPath(): ?string
    {
        return $this->path;
    }

    public function setPath(string $path): self
    {
        $this->path = $path;

        return $this;
    }

    public function getCaption(): ?string
    {
        return $this->caption;
    }

    public function setCaption(?string $caption): self
    {
        $this->caption = $caption;

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
