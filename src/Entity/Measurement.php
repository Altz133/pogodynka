<?php

namespace App\Entity;

use App\Repository\MeasurementRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MeasurementRepository::class)]
class Measurement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Location $location = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 3, scale: '0')]
    private ?string $celsius = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 5, scale: '0', nullable: true)]
    private ?string $atmosferic_pressure = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 5, scale: '0', nullable: true)]
    private ?string $rain_drop = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLocation(): ?Location
    {
        return $this->location;
    }

    public function setLocation(?Location $location): self
    {
        $this->location = $location;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getCelsius(): ?string
    {
        return $this->celsius;
    }

    public function setCelsius(string $celsius): self
    {
        $this->celsius = $celsius;

        return $this;
    }

    public function getAtmosfericPressure(): ?string
    {
        return $this->atmosferic_pressure;
    }

    public function setAtmosfericPressure(?string $atmosferic_pressure): self
    {
        $this->atmosferic_pressure = $atmosferic_pressure;

        return $this;
    }

    public function getRainDrop(): ?string
    {
        return $this->rain_drop;
    }

    public function setRainDrop(?string $rain_drop): self
    {
        $this->rain_drop = $rain_drop;

        return $this;
    }
    public function __toString()
    { 
        return $this->getName();
   }
}
