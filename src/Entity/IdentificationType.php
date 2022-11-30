<?php

namespace App\Entity;

use App\Repository\IdentificationTypeRepository;
use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\Doctrine\UuidGenerator;
use Symfony\Component\Validator\Constraints\Uuid;

/**
 * @ORM\Entity(repositoryClass=IdentificationTypeRepository::class)
 */
class IdentificationType
{
    /**
     * @ORM\Id
     * @ORM\Column(type="uuid", unique=true)
     * @ORM\GeneratedValue(strategy="CUSTOM")
     * @ORM\CustomIdGenerator(class=UuidGenerator::class)
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="boolean", nullable=true, options={"default": "false"})
     */
    private $enabled;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $typeIdentification;

    public function __toString() : string
    {
        return $this->getName();
    }
    public function getId(): ?string
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function isEnabled(): ?bool
    {
        return $this->enabled;
    }

    public function setEnabled(?bool $enabled): self
    {
        $this->enabled = $enabled;

        return $this;
    }

    public function getTypeIdentification(): ?string
    {
        return $this->typeIdentification;
    }

    public function setTypeIdentification(?string $typeIdentification): self
    {
        $this->typeIdentification = $typeIdentification;

        return $this;
    }
}
