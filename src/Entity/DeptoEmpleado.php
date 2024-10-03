<?php

namespace App\Entity;

use App\Repository\DeptoEmpleadoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DeptoEmpleadoRepository::class)]
class DeptoEmpleado
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $depto_desc = null;

    #[ORM\Column]
    private ?int $depto_state = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDeptoDesc(): ?string
    {
        return $this->depto_desc;
    }

    public function setDeptoDesc(string $depto_desc): static
    {
        $this->depto_desc = $depto_desc;

        return $this;
    }

    public function getDeptoState(): ?int
    {
        return $this->depto_state;
    }

    public function setDeptoState(int $depto_state): static
    {
        $this->depto_state = $depto_state;

        return $this;
    }
}
