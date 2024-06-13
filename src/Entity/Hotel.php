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
    private ?string $adressHotel = null;

    #[ORM\Column]
    private ?int $priceHotel = null;

    #[ORM\Column(length: 255)]
    private ?string $nameHotel = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAdressHotel(): ?string
    {
        return $this->adressHotel;
    }

    public function setAdressHotel(string $adressHotel): static
    {
        $this->adressHotel = $adressHotel;

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

    public function getNameHotel(): ?string
    {
        return $this->nameHotel;
    }

    public function setNameHotel(string $nameHotel): static
    {
        $this->nameHotel = $nameHotel;

        return $this;
    }
}
