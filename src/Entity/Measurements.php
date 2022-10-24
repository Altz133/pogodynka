<?php

namespace App\Entity;

use App\Repository\MeasurementsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MeasurementsRepository::class)]
class Measurements
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Location $PlaceID = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 3, scale: '0')]
    private ?string $temperature = null;

    #[ORM\Column(length: 7)]
    private ?string $Atmosferic_pressure = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: '0')]
    private ?string $Rain_Drop = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPlaceID(): ?Location
    {
        return $this->PlaceID;
    }

    public function setPlaceID(?Location $PlaceID): self
    {
        $this->PlaceID = $PlaceID;

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

    public function getTemperature(): ?string
    {
        return $this->temperature;
    }

    public function setTemperature(string $temperature): self
    {
        $this->temperature = $temperature;

        return $this;
    }

    public function getAtmosfericPressure(): ?string
    {
        return $this->Atmosferic_pressure;
    }

    public function setAtmosfericPressure(string $Atmosferic_pressure): self
    {
        $this->Atmosferic_pressure = $Atmosferic_pressure;

        return $this;
    }

    public function getRainDrop(): ?string
    {
        return $this->Rain_Drop;
    }

    public function setRainDrop(string $Rain_Drop): self
    {
        $this->Rain_Drop = $Rain_Drop;

        return $this;
    }
}
