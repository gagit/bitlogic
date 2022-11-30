<?php

namespace App\Entity;

use App\Model\IdentificationInterface;
use App\Model\PersonInterface;
use App\Repository\IdentificationPropietaryRepository;
use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\Doctrine\UuidGenerator;

/**
 * @ORM\Entity(repositoryClass=IdentificationPropietaryRepository::class)
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
     * @ORM\ManyToOne(targetEntity=Propietary::class, inversedBy="identification")
     */
    private $propietary;

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

    public function getPropietary(): PersonInterface
    {
        return $this->propietary;
    }

    public function setPropietary(?PersonInterface $propietary): IdentificationInterface
    {
        $this->propietary = $propietary;

        return $this;
    }

    public function getIdentificationType(): ?IdentificationType
    {
        return $this->identificationType;
    }

    public function getPerson(): PersonInterface
    {
        return $this->getPropietary();
    }

    public function setPerson(PersonInterface $person): IdentificationInterface
    {
        $this->setPropietary($person);

        return $this;
    }
}
