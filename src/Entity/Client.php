<?php

namespace App\Entity;

use App\Model\ContactInterface;
use App\Model\IdentificationInterface;
use App\Repository\ClientRepository;
use App\Model\PersonInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\Doctrine\UuidGenerator;

/**
 * @ORM\Entity(repositoryClass=ClientRepository::class)
 */
class Client implements PersonInterface
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
    private $lastName;

    /**
     * @ORM\OneToMany(targetEntity=IdentificationClient::class, mappedBy="client", cascade={"persist"})
     */
    private $identifications;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $address;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $dateCreation;

    /**
     * @ORM\Column(type="boolean", options={"default": "false"})
     */
    private $enabled;

    /**
     * @ORM\OneToMany(targetEntity=ContactClient::class, mappedBy="client", cascade={"persist"})
     */
    private $contacts;

    /**
     * @ORM\Column(type="boolean")
     */
    private $legalPerson;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $gender;


    public function __construct()
    {
        $this->identifications = new ArrayCollection();
        $this->contacts = new ArrayCollection();

    }

    public function __toString() : string
    {
        return $this->getName().', '.$this->getLastName();
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

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(?string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * @return Collection<int, Identification>
     */
    public function getIdentifications(): Collection
    {
        return $this->identifications;
    }

    public function addIdentification(IdentificationInterface $identification): PersonInterface
    {
        if (!$this->identifications->contains($identification)) {
            $this->identifications[] = $identification;
            $identification->setPerson($this);
        }

        return $this;
    }

    public function removeIdentification(IdentificationInterface $identification): PersonInterface
    {
        if ($this->identifications->removeElement($identification)) {
            // set the owning side to null (unless already changed)
            if ($identification->getPerson() === $this) {
                $identification->setPerson(null);
            }
        }

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(?string $address): PersonInterface
    {
        $this->address = $address;

        return $this;
    }

    public function getDateCreation(): ?\DateTimeInterface
    {
        return $this->dateCreation;
    }

    public function setDateCreation(?\DateTimeInterface $dateCreation): PersonInterface
    {
        $this->dateCreation = $dateCreation;

        return $this;
    }

    public function isEnabled(): ?bool
    {
        return $this->enabled;
    }

    public function setEnabled(bool $enabled): PersonInterface
    {
        $this->enabled = $enabled;

        return $this;
    }
  public function addContact(ContactInterface $contactClient): PersonInterface
    {
        if (!$this->contacts->contains($contactClient)) {
            $this->contacts[] = $contactClient;
            $contactClient->setClient($this);
        }

        return $this;
    }

    public function removeContact(ContactInterface  $contactClient): PersonInterface
    {
        if ($this->contacts->removeElement($contactClient)) {
            // set the owning side to null (unless already changed)
            if ($contactClient->getClient() === $this) {
                $contactClient->setClient(null);
            }
        }

        return $this;
    }
    /**
     * @return Collection<int, ContactClient>
     */
    public function getContacts(): Collection
    {
        return $this->contacts;
    }

    public function isLegalPerson(): ?bool
    {
        return $this->legalPerson;
    }

    public function setLegalPerson(bool $enabled): PersonInterface
    {
        $this->legalPerson = $enabled;
        return $this;
    }

    public function getGender(): ?string
    {
        return $this->gender;
    }

    public function setGender(?string $gender): PersonInterface
    {
        $this->gender=$gender;
        return $this;
    }
}
