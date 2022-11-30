<?php

namespace App\Model;

use App\Entity\IdentificationType;

interface IdentificationInterface
{
    public function getIdentificationType() : ?IdentificationType;

    public function setIdentificationType(?IdentificationType $identificationType) : IdentificationInterface;

    public function getIdentification() :? string ;

    public function setIdentification(string $identification) : IdentificationInterface;

    public function getPerson() : PersonInterface;

    public function setPerson(PersonInterface $person): IdentificationInterface;

}