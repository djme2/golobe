<?php

namespace App\Entity;

use App\Repository\ActivityRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ActivityRepository::class)]
class Activity
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $NameActivity = null;

    #[ORM\Column]
    private ?int $priceActivity = null;

    #[ORM\ManyToOne(inversedBy: 'idActivity')]
    private ?Booking $booking = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNameActivity(): ?string
    {
        return $this->NameActivity;
    }

    public function setNameActivity(string $NameActivity): static
    {
        $this->NameActivity = $NameActivity;

        return $this;
    }

    public function getPriceActivity(): ?int
    {
        return $this->priceActivity;
    }

    public function setPriceActivity(int $priceActivity): static
    {
        $this->priceActivity = $priceActivity;

        return $this;
    }

    public function getBooking(): ?Booking
    {
        return $this->booking;
    }

    public function setBooking(?Booking $booking): static
    {
        $this->booking = $booking;

        return $this;
    }
}
