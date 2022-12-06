<?php

namespace App\Entity;

use App\Model\IdentificationInterface;
use App\Model\PersonInterface;
use App\Repository\IdentificationClientRepository;
use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\Doctrine\UuidGenerator;

/**
 * @ORM\Entity(repositoryClass=IdentificationClientRepository::class)
 */
class IdentificationClient implements IdentificationInterface
{
    /**
     * @ORM\Id
     * @ORM\Column(type="uuid", unique=true)
     * @ORM\GeneratedValue(strategy="CUSTOM")
     * @ORM\CustomIdGenerator(class=UuidGenerator::class)
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=IdentificationType::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $identificationType;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $identification;

    /**
     * @ORM\ManyToOne(targetEntity=Client::class, inversedBy="identification")
     */
    private $client;

    public function __toString()
    {
        return $this->getIdentificationType().' - '.$this->getIdentification();
    }

    public function getId(): ?string
    {
        return $this->id;
    }

    public function setIdentificationType(?IdentificationType $identificationType): IdentificationInterface
    {
        $this->identificationType = $identificationType;

        return $this;
    }

    public function getIdentification(): ?string
    {
        return $this->identification;
    }

    public function setIdentification(string $identification): IdentificationInterface
    {
        $this->identification = $identification;

        return $this;
    }

    public function getClient(): PersonInterface
    {
        return $this->client;
    }

    public function setClient(?PersonInterface $client): IdentificationInterface
    {
        $this->client = $client;

        return $this;
    }

    public function getIdentificationType(): ?IdentificationType
    {
        return $this->identificationType;
    }

    public function getPerson(): PersonInterface
    {
        return $this->getClient();
    }

    public function setPerson(PersonInterface $person): IdentificationInterface
    {
        $this->setClient($person);

        return $this;
    }
}
