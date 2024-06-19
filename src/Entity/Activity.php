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
    private ?string $nameActivity = null;

    #[ORM\Column]
    private ?int $priceActivity = null;

    #[ORM\Column(length: 255)]
    private ?string $addressActivity = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?destination $destination = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNameActivity(): ?string
    {
        return $this->nameActivity;
    }

    public function setNameActivity(string $nameActivity): static
    {
        $this->nameActivity = $nameActivity;

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

    public function getAddressActivity(): ?string
    {
        return $this->addressActivity;
    }

    public function setAddressActivity(string $addressActivity): static
    {
        $this->addressActivity = $addressActivity;

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
