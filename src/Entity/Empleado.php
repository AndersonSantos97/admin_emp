<?php

namespace App\Entity;

use App\Repository\EmpleadoRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EmpleadoRepository::class)]
class Empleado
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;


    #[ORM\Column(length: 50)]
    private ?string $names = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $fecha_nac = null;

    #[ORM\Column(length: 15)]
    private ?string $dni = null;

    // #[ORM\Column]
    // private ?int $depto = null;

    // #[ORM\Column]
    // private ?int $cargo = null;

    #[ORM\ManyToOne(targetEntity: DeptoEmpleado::class)]
    #[ORM\JoinColumn(nullable: false)]
    private ?DeptoEmpleado $depto = null;

    #[ORM\ManyToOne(targetEntity: CargoEmpleado::class)]
    #[ORM\JoinColumn(nullable: false)]
    private ?CargoEmpleado $cargo = null;

    #[ORM\Column(length: 1)]
    private ?string $sexo = null;

    #[ORM\Column(length: 5)]
    private ?string $nacionalidad = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNames(): ?string
    {
        return $this->names;
    }

    public function setNames(string $names): static
    {
        $this->names = $names;

        return $this;
    }

    public function getFechaNac(): ?\DateTimeInterface
    {
        return $this->fecha_nac;
    }

    public function setFechaNac(\DateTimeInterface $fecha_nac): static
    {
        $this->fecha_nac = $fecha_nac;

        return $this;
    }

    public function getDni(): ?string
    {
        return $this->dni;
    }

    public function setDni(string $dni): static
    {
        $this->dni = $dni;

        return $this;
    }


    public function getDepto(): ?DeptoEmpleado
    {
        return $this->depto;
    }

    public function setDepto(?DeptoEmpleado $depto): static
    {
        $this->depto = $depto;
        return $this;
    }


    public function getCargo(): ?CargoEmpleado
    {
        return $this->cargo;
    }

    public function setCargo(?CargoEmpleado $cargo): static
    {
        $this->cargo = $cargo;
        return $this;
    }
    
    public function getSexo(): ?string
    {
        return $this->sexo;
    }

    public function setSexo(string $sexo): static
    {
        $this->sexo = $sexo;

        return $this;
    }

    public function getNacionalidad(): ?string
    {
        return $this->nacionalidad;
    }

    public function setNacionalidad(string $nacionalidad): static
    {
        $this->nacionalidad = $nacionalidad;

        return $this;
    }
}
