<?php

namespace App\Entity;

use App\Repository\HotelRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: HotelRepository::class)]
class Hotel
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nameHotel = null;

    #[ORM\Column]
    private ?int $priceHotel = null;

    #[ORM\Column(length: 255)]
    private ?string $addressHotel = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?destination $destination = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNameHotel(): ?string
    {
        return $this->nameHotel;
    }

    public function setNameHotel(string $nameHotel): static
    {
        $this->nameHotel = $nameHotel;

        return $this;
    }

    public function getPriceHotel(): ?int
    {
        return $this->priceHotel;
    }

    public function setPriceHotel(int $priceHotel): static
    {
        $this->priceHotel = $priceHotel;

        return $this;
    }

    public function getAddressHotel(): ?string
    {
        return $this->addressHotel;
    }

    public function setAddressHotel(string $addressHotel): static
    {
        $this->addressHotel = $addressHotel;

        return $this;
    }

    public function getDestination(): ?destination
    {
        return $this->destination;
    }

    public function setDestination(?destination $destination): static
    {
        $this->destination = $destination;

        return $this;
    }
}
