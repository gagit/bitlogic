<?php

namespace App\Model;

use App\Model\IdentificationInterface;
use Doctrine\Common\Collections\Collection;

interface PersonInterface
{
    public function getName(): ?string;

    public function setName(string $name);

    public function getLastName(): ?string;

    public function setLastName(string $lastName);

    public function getAddress(): ?string;

    public function setAddress(?string $address): PersonInterface;

    public function getDateCreation(): ?\DateTimeInterface;

    public function setDateCreation(?\DateTimeInterface $dateCreation): PersonInterface;

    public function isEnabled(): ?bool;

    public function setEnabled(bool $enabled): PersonInterface;

    public function isLegalPerson(): ?bool;

    public function setLegalPerson(bool $enabled): PersonInterface;

    public function getGender(): ?string;

    public function setGender(?string $address): PersonInterface;
    public function getIdentifications(): Collection;

    public function addIdentification(IdentificationInterface $identification): PersonInterface;

    public function removeIdentification(IdentificationInterface $identification): PersonInterface;
    public function getContacts(): Collection;

    public function addContact(ContactInterface $identification): PersonInterface;

    public function removeContact(ContactInterface  $identification): PersonInterface;
}