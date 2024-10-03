<?php

namespace App\Entity;

use App\Repository\CargoEmpleadoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CargoEmpleadoRepository::class)]
class CargoEmpleado
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $cargo_desc = null;

    #[ORM\Column]
    private ?int $cargo_state = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCargoDesc(): ?string
    {
        return $this->cargo_desc;
    }

    public function setCargoDesc(string $cargo_desc): static
    {
        $this->cargo_desc = $cargo_desc;

        return $this;
    }

    public function getCargoState(): ?int
    {
        return $this->cargo_state;
    }

    public function setCargoState(int $cargo_state): static
    {
        $this->cargo_state = $cargo_state;

        return $this;
    }
}
