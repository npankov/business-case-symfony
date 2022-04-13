<?php

namespace App\Entity;

use App\Repository\OrderRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OrderRepository::class)]
#[ORM\Table(name: '`order`')]
class Order
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'date')]
    private $dateRealization;

    #[ORM\OneToMany(mappedBy: 'myorder', targetEntity: ProductOrder::class)]
    private $productOrders;

    #[ORM\ManyToOne(targetEntity: TypeDelivery::class, inversedBy: 'orders')]
    #[ORM\JoinColumn(nullable: false)]
    private $typesDelivery;

    #[ORM\ManyToOne(targetEntity: Status::class, inversedBy: 'orders')]
    private $statusCommandes;

    #[ORM\ManyToOne(targetEntity: TypePayment::class, inversedBy: 'orders')]
    #[ORM\JoinColumn(nullable: false)]
    private $typesPayment;

    #[ORM\ManyToOne(targetEntity: Address::class, inversedBy: 'orders')]
    #[ORM\JoinColumn(nullable: false)]
    private $factures;

    #[ORM\ManyToOne(targetEntity: Address::class, inversedBy: 'orders')]
    #[ORM\JoinColumn(nullable: false)]
    private $livraisons;

    #[ORM\ManyToOne(targetEntity: Client::class, inversedBy: 'orders')]
    #[ORM\JoinColumn(nullable: false)]
    private $clients;

    public function __construct()
    {
        $this->productOrders = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateRealization(): ?\DateTimeInterface
    {
        return $this->dateRealization;
    }

    public function setDateRealization(\DateTimeInterface $dateRealization): self
    {
        $this->dateRealization = $dateRealization;

        return $this;
    }

    /**
     * @return Collection<int, ProductOrder>
     */
    public function getProductOrders(): Collection
    {
        return $this->productOrders;
    }

    public function addProductOrder(ProductOrder $productOrder): self
    {
        if (!$this->productOrders->contains($productOrder)) {
            $this->productOrders[] = $productOrder;
            $productOrder->setMyorder($this);
        }

        return $this;
    }

    public function removeProductOrder(ProductOrder $productOrder): self
    {
        if ($this->productOrders->removeElement($productOrder)) {
            // set the owning side to null (unless already changed)
            if ($productOrder->getMyorder() === $this) {
                $productOrder->setMyorder(null);
            }
        }

        return $this;
    }

    public function getTypesDelivery(): ?TypeDelivery
    {
        return $this->typesDelivery;
    }

    public function setTypesDelivery(?TypeDelivery $typesDelivery): self
    {
        $this->typesDelivery = $typesDelivery;

        return $this;
    }

    public function getStatusCommandes(): ?Status
    {
        return $this->statusCommandes;
    }

    public function setStatusCommandes(?Status $statusCommandes): self
    {
        $this->statusCommandes = $statusCommandes;

        return $this;
    }

    public function getTypesPayment(): ?TypePayment
    {
        return $this->typesPayment;
    }

    public function setTypesPayment(?TypePayment $typesPayment): self
    {
        $this->typesPayment = $typesPayment;

        return $this;
    }

    public function getFactures(): ?Address
    {
        return $this->factures;
    }

    public function setFactures(?Address $factures): self
    {
        $this->factures = $factures;

        return $this;
    }

    public function getLivraisons(): ?Address
    {
        return $this->livraisons;
    }

    public function setLivraisons(?Address $livraisons): self
    {
        $this->livraisons = $livraisons;

        return $this;
    }

    public function getClients(): ?Client
    {
        return $this->clients;
    }

    public function setClients(?Client $clients): self
    {
        $this->clients = $clients;

        return $this;
    }
}
