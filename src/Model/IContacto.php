<?php


namespace App\Model;

/**
 * IContacto
 *
 */
interface IContacto
{

    /**
     * @return string
     */
    public function getContactType();

    /**
     * @param string $tipoContacto
     * @return IContacto
     */
    public function setContactType($tipoContacto);

    /**
     * Set valor
     *
     * @param string $valor
     *
     * @return IContacto
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
     * @return IContacto
     */
    public function setPerson(PersonInterface $persona): IContacto;

    /**
     * Get persona
     *
     * @return PersonInterface
     */
    public function getPerson() : PersonInterface;
}
