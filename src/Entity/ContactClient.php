<?php

namespace App\Entity;

use App\Model\ContactInterface;
use App\Model\PersonInterface;
use App\Repository\ContactClientRepository;
use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\Doctrine\UuidGenerator;

/**
 * @ORM\Entity(repositoryClass=ContactClientRepository::class)
 */
class ContactClient implements ContactInterface
{
    /**
     * @ORM\Id
     * @ORM\Column(type="uuid", unique=true)
     * @ORM\GeneratedValue(strategy="CUSTOM")
     * @ORM\CustomIdGenerator(class=UuidGenerator::class)
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=ContactType::class, inversedBy="contactsClient")
     */
    private $contactType;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $value;

    /**
     * @ORM\ManyToOne(targetEntity=Client::class, inversedBy="contacts")
     */
    private $client;

    public function __toString(): string
    {
        return $this->getContactType().': '.$this->getValue();
    }

    public function getId(): ?string
    {
        return $this->id;
    }

    public function getContactType(): ?ContactType
    {
        return $this->contactType;
    }

    public function setContactType(?ContactType $contactType): self
    {
        $this->contactType = $contactType;

        return $this;
    }

    public function getValue(): ?string
    {
        return $this->value;
    }

    public function setValue(string $value): self
    {
        $this->value = $value;

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

    public function setContactValue($valorContacto)
    {
        $this->setContactValue($valorContacto);
    }

    public function getContactValue()
    {
        return $this->getValue();
    }

    public function setPerson(PersonInterface $persona): ContactInterface
    {
        $this->setClient($persona);
        return $this;

    }

    public function getPerson(): PersonInterface
    {
        return $this->getClient();
    }
}
