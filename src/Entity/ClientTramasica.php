<?php

namespace App\Entity;

use App\Repository\ClientTramasicaRepository;
use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\Doctrine\UuidGenerator;

/**
 * @ORM\Entity(repositoryClass=ClientTramasicaRepository::class)
 */
class ClientTramasica
{

    /**
     * @ORM\Id
     * @ORM\Column(type="uuid", unique=true)
     * @ORM\GeneratedValue(strategy="CUSTOM")
     * @ORM\CustomIdGenerator(class=UuidGenerator::class)
     */
    private $id;

    /**
     * @ORM\Column(type="time", nullable=true)
     */
    private $timeOfBird;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $addressOfBird;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $latAddressOfBird;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $lngAddressOfBird;

    /**
     * @ORM\OneToOne(targetEntity=Client::class, inversedBy="clientTramasica", cascade={"persist", "remove"})
     */
    private $client;


    public function __construct()
    {
    }

    public function __toString() : string
    {
        return $this->getName().', '.$this->getLastName();
    }
    public function getId(): ?string
    {
        return $this->id;
    }
    public function getTimeOfBird(): ?\DateTimeInterface
    {
        return $this->timeOfBird;
    }

    public function setTimeOfBird(?\DateTimeInterface $timeOfBird): self
    {
        $this->timeOfBird = $timeOfBird;

        return $this;
    }

    public function getAddressOfBird(): ?string
    {
        return $this->addressOfBird;
    }

    public function setAddressOfBird(?string $addressOfBird): self
    {
        $this->addressOfBird = $addressOfBird;

        return $this;
    }

    public function getLatAddressOfBird(): ?float
    {
        return $this->latAddressOfBird;
    }

    public function setLatAddressOfBird(?float $latAddressOfBird): self
    {
        $this->latAddressOfBird = $latAddressOfBird;

        return $this;
    }

    public function getLngAddressOfBird(): ?float
    {
        return $this->lngAddressOfBird;
    }

    public function setLngAddressOfBird(?float $lngAddressOfBird): self
    {
        $this->lngAddressOfBird = $lngAddressOfBird;

        return $this;
    }

    public function getClient(): ?Client
    {
        return $this->client;
    }

    public function setClient(?Client $client): self
    {
        $this->client = $client;

        return $this;
    }


}
