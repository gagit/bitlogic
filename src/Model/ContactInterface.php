<?php


namespace App\Model;

/**
 * IContacto
 *
 */
interface ContactInterface
{

    /**
     * @return string
     */
    public function getContactType();

    /**
     * @param string $tipoContacto
     * @return ContactInterface
     */
    public function setContactType($tipoContacto);

    /**
     * Set valor
     *
     * @param string $valor
     *
     * @return ContactInterface
     */
    public function setContactValue($valorContacto);

    /**
     * Get valor
     *
     * @return string
     */
    public function getContactValue();


    /**
     * Set persona
     *
     * @param IPersona $persona
     *
     * @return ContactInterface
     */
    public function setPerson(PersonInterface $persona): ContactInterface;

    /**
     * Get persona
     *
     * @return PersonInterface
     */
    public function getPerson() : PersonInterface;
}
