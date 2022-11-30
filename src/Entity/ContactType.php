<?php

namespace App\Entity;

use App\Repository\ContactTypeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\Doctrine\UuidGenerator;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

/**
 * @ORM\Entity(repositoryClass=ContactTypeRepository::class)
 */
class ContactType
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
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $contactGroup;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $fontAwesomeIcon;

    /**
     * @ORM\Column(type="boolean", options={"default": "false"})
     */
    private $enabled;


    /**
     * @ORM\OneToMany(targetEntity=ContactClient::class, mappedBy="contactType")
     */
    private $contactsClient;

    public function __construct()
    {
        $this->contactsClient = new ArrayCollection();
    }

    public function __toString() : string
    {
        return $this->getName();
    }

    public function setId(UuidInterface $id): self
    {
        $this->id = $id;
        return $this;
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

    public function getContactGroup(): ?string
    {
        return $this->contactGroup;
    }

    public function setContactGroup(?string $contactGroup): self
    {
        $this->contactGroup = $contactGroup;

        return $this;
    }

    public function getFontAwesomeIcon(): ?string
    {
        return $this->fontAwesomeIcon;
    }

    public function setFontAwesomeIcon(?string $fontAwesomeIcon): self
    {
        $this->fontAwesomeIcon = $fontAwesomeIcon;

        return $this;
    }

    public function isEnabled(): ?bool
    {
        return $this->enabled;
    }

    public function setEnabled(bool $enabled): self
    {
        $this->enabled = $enabled;

        return $this;
    }
    /**
     * @return Collection<int, ContactClient>
     */
    public function getContactsClient(): Collection
    {
        return $this->contactsClient;
    }

    public function addContactClient(ContactClient $contactClient): self
    {
        if (!$this->contactsClient->contains($contactClient)) {
            $this->contactsClient[] = $contactClient;
            $contactClient->setContactType($this);
        }

        return $this;
    }

    public function removeContactClient(ContactClient $contactClient): self
    {
        if ($this->contactsClient->removeElement($contactClient)) {
            // set the owning side to null (unless already changed)
            if ($contactClient->getContactType() === $this) {
                $contactClient->setContactType(null);
            }
        }

        return $this;
    }
}
