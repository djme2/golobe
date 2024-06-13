<?php

namespace App\Entity;

use App\Repository\RoleRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RoleRepository::class)]
class Role
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nameRole = null;

    #[ORM\ManyToOne(inversedBy: 'idRole')]
    private ?RoleUser $roleUser = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNameRole(): ?string
    {
        return $this->nameRole;
    }

    public function setNameRole(string $nameRole): static
    {
        $this->nameRole = $nameRole;

        return $this;
    }

    public function getRoleUser(): ?RoleUser
    {
        return $this->roleUser;
    }

    public function setRoleUser(?RoleUser $roleUser): static
    {
        $this->roleUser = $roleUser;

        return $this;
    }
}
