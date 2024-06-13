<?php

namespace App\Entity;

use App\Repository\BookingRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BookingRepository::class)]
class Booking
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $dateBooking = null;

    #[ORM\Column]
    private ?int $idUsers = null;

    #[ORM\Column]
    private ?int $idActivity = null;

    #[ORM\Column]
    private ?int $idHotel = null;

    #[ORM\Column]
    private ?int $idDestination = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateBooking(): ?\DateTimeInterface
    {
        return $this->dateBooking;
    }

    public function setDateBooking(\DateTimeInterface $dateBooking): static
    {
        $this->dateBooking = $dateBooking;

        return $this;
    }

    public function getIdUsers(): ?int
    {
        return $this->idUsers;
    }

    public function setIdUsers(int $idUsers): static
    {
        $this->idUsers = $idUsers;

        return $this;
    }

    public function getIdActivity(): ?int
    {
        return $this->idActivity;
    }

    public function setIdActivity(int $idActivity): static
    {
        $this->idActivity = $idActivity;

        return $this;
    }

    public function getIdHotel(): ?int
    {
        return $this->idHotel;
    }

    public function setIdHotel(int $idHotel): static
    {
        $this->idHotel = $idHotel;

        return $this;
    }

    public function getIdDestination(): ?int
    {
        return $this->idDestination;
    }

    public function setIdDestination(int $idDestination): static
    {
        $this->idDestination = $idDestination;

        return $this;
    }
}
