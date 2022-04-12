<?php

namespace App\Entity;

use App\Repository\AvisProductRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AvisProductRepository::class)]
class AvisProduct
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 500)]
    private $body;

    #[ORM\Column(type: 'integer')]
    private $numberStars;

    #[ORM\ManyToOne(targetEntity: Product::class, inversedBy: 'avisProducts')]
    private $product;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBody(): ?string
    {
        return $this->body;
    }

    public function setBody(string $body): self
    {
        $this->body = $body;

        return $this;
    }

    public function getNumberStars(): ?int
    {
        return $this->numberStars;
    }

    public function setNumberStars(int $numberStars): self
    {
        $this->numberStars = $numberStars;

        return $this;
    }

    public function getProduct(): ?Product
    {
        return $this->product;
    }

    public function setProduct(?Product $product): self
    {
        $this->product = $product;

        return $this;
    }
}
