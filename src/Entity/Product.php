<?php

namespace App\Entity;

use App\Repository\ProductRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProductRepository::class)]
class Product
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $name;

    #[ORM\Column(type: 'string', length: 1000)]
    private $description;

    #[ORM\Column(type: 'decimal', precision: 5, scale: 2)]
    private $priceHT;

    #[ORM\Column(type: 'boolean')]
    private $inStock;

    #[ORM\Column(type: 'boolean')]
    private $isActif;

    #[ORM\OneToMany(mappedBy: 'product', targetEntity: Characteristic::class)]
    private $characteristics;

    #[ORM\ManyToMany(targetEntity: Advantage::class, inversedBy: 'products')]
    private $advantages;

    #[ORM\ManyToMany(targetEntity: Image::class, inversedBy: 'products')]
    private $images;

    #[ORM\ManyToOne(targetEntity: Brand::class, inversedBy: 'products')]
    private $brands;

    #[ORM\OneToMany(mappedBy: 'product', targetEntity: AvisProduct::class)]
    private $avisProducts;

    #[ORM\ManyToMany(targetEntity: Category::class, inversedBy: 'products')]
    private $categories;

    public function __construct()
    {
        $this->characteristics = new ArrayCollection();
        $this->advantages = new ArrayCollection();
        $this->images = new ArrayCollection();
        $this->avisProducts = new ArrayCollection();
        $this->categories = new ArrayCollection();
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getPriceHT(): ?string
    {
        return $this->priceHT;
    }

    public function setPriceHT(string $priceHT): self
    {
        $this->priceHT = $priceHT;

        return $this;
    }

    public function getInStock(): ?bool
    {
        return $this->inStock;
    }

    public function setInStock(bool $inStock): self
    {
        $this->inStock = $inStock;

        return $this;
    }

    public function getIsActif(): ?bool
    {
        return $this->isActif;
    }

    public function setIsActif(bool $isActif): self
    {
        $this->isActif = $isActif;

        return $this;
    }

    /**
     * @return Collection<int, Characteristic>
     */
    public function getCharacteristics(): Collection
    {
        return $this->characteristics;
    }

    public function addCharacteristic(Characteristic $characteristic): self
    {
        if (!$this->characteristics->contains($characteristic)) {
            $this->characteristics[] = $characteristic;
            $characteristic->setProduct($this);
        }

        return $this;
    }

    public function removeCharacteristic(Characteristic $characteristic): self
    {
        if ($this->characteristics->removeElement($characteristic)) {
            // set the owning side to null (unless already changed)
            if ($characteristic->getProduct() === $this) {
                $characteristic->setProduct(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Advantage>
     */
    public function getAdvantages(): Collection
    {
        return $this->advantages;
    }

    public function addAdvantage(Advantage $advantage): self
    {
        if (!$this->advantages->contains($advantage)) {
            $this->advantages[] = $advantage;
        }

        return $this;
    }

    public function removeAdvantage(Advantage $advantage): self
    {
        $this->advantages->removeElement($advantage);

        return $this;
    }

    /**
     * @return Collection<int, Image>
     */
    public function getImages(): Collection
    {
        return $this->images;
    }

    public function addImage(Image $image): self
    {
        if (!$this->images->contains($image)) {
            $this->images[] = $image;
        }

        return $this;
    }

    public function removeImage(Image $image): self
    {
        $this->images->removeElement($image);

        return $this;
    }

    public function getBrands(): ?Brand
    {
        return $this->brands;
    }

    public function setBrands(?Brand $brands): self
    {
        $this->brands = $brands;

        return $this;
    }

    /**
     * @return Collection<int, AvisProduct>
     */
    public function getAvisProducts(): Collection
    {
        return $this->avisProducts;
    }

    public function addAvisProduct(AvisProduct $avisProduct): self
    {
        if (!$this->avisProducts->contains($avisProduct)) {
            $this->avisProducts[] = $avisProduct;
            $avisProduct->setProduct($this);
        }

        return $this;
    }

    public function removeAvisProduct(AvisProduct $avisProduct): self
    {
        if ($this->avisProducts->removeElement($avisProduct)) {
            // set the owning side to null (unless already changed)
            if ($avisProduct->getProduct() === $this) {
                $avisProduct->setProduct(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Category>
     */
    public function getCategories(): Collection
    {
        return $this->categories;
    }

    public function addCategory(Category $category): self
    {
        if (!$this->categories->contains($category)) {
            $this->categories[] = $category;
        }

        return $this;
    }

    public function removeCategory(Category $category): self
    {
        $this->categories->removeElement($category);

        return $this;
    }
}
