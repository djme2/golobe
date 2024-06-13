<?php

namespace App\Entity;

use App\Repository\RoleUserRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RoleUserRepository::class)]
class RoleUser
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $idRole = null;

    #[ORM\Column]
    private ?int $idUsers = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdRole(): ?int
    {
        return $this->idRole;
    }

    public function setIdRole(int $idRole): static
    {
        $this->idRole = $idRole;

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
}
