<?php

namespace App\Entity;

use App\Repository\RoleUserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RoleUserRepository::class)]
class RoleUser
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    /**
     * @var Collection<int, role>
     */
    #[ORM\OneToMany(targetEntity: role::class, mappedBy: 'roleUser')]
    private Collection $idRole;

    /**
     * @var Collection<int, Users>
     */
    #[ORM\OneToMany(targetEntity: Users::class, mappedBy: 'roleUser')]
    private Collection $idUsers;

    public function __construct()
    {
        $this->idRole = new ArrayCollection();
        $this->idUsers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, role>
     */
    public function getIdRole(): Collection
    {
        return $this->idRole;
    }

    public function addIdRole(role $idRole): static
    {
        if (!$this->idRole->contains($idRole)) {
            $this->idRole->add($idRole);
            $idRole->setRoleUser($this);
        }

        return $this;
    }

    public function removeIdRole(role $idRole): static
    {
        if ($this->idRole->removeElement($idRole)) {
            // set the owning side to null (unless already changed)
            if ($idRole->getRoleUser() === $this) {
                $idRole->setRoleUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Users>
     */
    public function getIdUsers(): Collection
    {
        return $this->idUsers;
    }

    public function addIdUser(Users $idUser): static
    {
        if (!$this->idUsers->contains($idUser)) {
            $this->idUsers->add($idUser);
            $idUser->setRoleUser($this);
        }

        return $this;
    }

    public function removeIdUser(Users $idUser): static
    {
        if ($this->idUsers->removeElement($idUser)) {
            // set the owning side to null (unless already changed)
            if ($idUser->getRoleUser() === $this) {
                $idUser->setRoleUser(null);
            }
        }

        return $this;
    }
}
