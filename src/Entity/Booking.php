<?php

namespace App\Entity;

use App\Repository\BookingRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    /**
     * @var Collection<int, Users>
     */
    #[ORM\OneToMany(targetEntity: Users::class, mappedBy: 'booking')]
    private Collection $idUsers;

    /**
     * @var Collection<int, Activity>
     */
    #[ORM\OneToMany(targetEntity: Activity::class, mappedBy: 'booking')]
    private Collection $idActivity;

    /**
     * @var Collection<int, Hotel>
     */
    #[ORM\OneToMany(targetEntity: Hotel::class, mappedBy: 'booking')]
    private Collection $idHotel;

    /**
     * @var Collection<int, Destination>
     */
    #[ORM\OneToMany(targetEntity: Destination::class, mappedBy: 'booking')]
    private Collection $idDestination;

    public function __construct()
    {
        $this->idUsers = new ArrayCollection();
        $this->idActivity = new ArrayCollection();
        $this->idHotel = new ArrayCollection();
        $this->idDestination = new ArrayCollection();
    }

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
            $idUser->setBooking($this);
        }

        return $this;
    }

    public function removeIdUser(Users $idUser): static
    {
        if ($this->idUsers->removeElement($idUser)) {
            // set the owning side to null (unless already changed)
            if ($idUser->getBooking() === $this) {
                $idUser->setBooking(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Activity>
     */
    public function getIdActivity(): Collection
    {
        return $this->idActivity;
    }

    public function addIdActivity(Activity $idActivity): static
    {
        if (!$this->idActivity->contains($idActivity)) {
            $this->idActivity->add($idActivity);
            $idActivity->setBooking($this);
        }

        return $this;
    }

    public function removeIdActivity(Activity $idActivity): static
    {
        if ($this->idActivity->removeElement($idActivity)) {
            // set the owning side to null (unless already changed)
            if ($idActivity->getBooking() === $this) {
                $idActivity->setBooking(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Hotel>
     */
    public function getIdHotel(): Collection
    {
        return $this->idHotel;
    }

    public function addIdHotel(Hotel $idHotel): static
    {
        if (!$this->idHotel->contains($idHotel)) {
            $this->idHotel->add($idHotel);
            $idHotel->setBooking($this);
        }

        return $this;
    }

    public function removeIdHotel(Hotel $idHotel): static
    {
        if ($this->idHotel->removeElement($idHotel)) {
            // set the owning side to null (unless already changed)
            if ($idHotel->getBooking() === $this) {
                $idHotel->setBooking(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Destination>
     */
    public function getIdDestination(): Collection
    {
        return $this->idDestination;
    }

    public function addIdDestination(Destination $idDestination): static
    {
        if (!$this->idDestination->contains($idDestination)) {
            $this->idDestination->add($idDestination);
            $idDestination->setBooking($this);
        }

        return $this;
    }

    public function removeIdDestination(Destination $idDestination): static
    {
        if ($this->idDestination->removeElement($idDestination)) {
            // set the owning side to null (unless already changed)
            if ($idDestination->getBooking() === $this) {
                $idDestination->setBooking(null);
            }
        }

        return $this;
    }
}
