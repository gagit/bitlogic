<?php

namespace App\Entity;

use App\Model\ClientesDikterInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * Distribucionpedidosclientes
 *
 * @ORM\Table(name="distribucionpedidosclientes")
 * @ORM\Entity
 */
class Distribucionpedidosclientes implements ClientesDikterInterface
{
    /**
     * @var string
     *
     * @ORM\Column(name="ID", type="decimal", precision=18, scale=0, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="Nombre", type="string", length=100, nullable=false)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="Apellido", type="string", length=100, nullable=false)
     */
    private $apellido;

    /**
     * @var string
     *
     * @ORM\Column(name="Direccion1", type="string", length=100, nullable=false)
     */
    private $direccion1;

    /**
     * @var string
     *
     * @ORM\Column(name="Direccion2", type="string", length=100, nullable=false)
     */
    private $direccion2;

    /**
     * @var string
     *
     * @ORM\Column(name="Ciudad", type="string", length=100, nullable=false)
     */
    private $ciudad;

    /**
     * @var string
     *
     * @ORM\Column(name="Region", type="string", length=100, nullable=false)
     */
    private $region;

    /**
     * @var string
     *
     * @ORM\Column(name="CP", type="string", length=50, nullable=false)
     */
    private $cp;

    /**
     * @var string
     *
     * @ORM\Column(name="Telefono", type="string", length=50, nullable=false)
     */
    private $telefono;

    /**
     * @var string|null
     *
     * @ORM\Column(name="NroCuenta", type="string", length=50, nullable=true)
     */
    private $nrocuenta;

    /**
     * @var string|null
     *
     * @ORM\Column(name="TipoCuenta", type="string", length=50, nullable=true)
     */
    private $tipocuenta;

    /**
     * @var string|null
     *
     * @ORM\Column(name="RazonSocial", type="string", length=100, nullable=true)
     */
    private $razonsocial;

    /**
     * @var string|null
     *
     * @ORM\Column(name="NroDocumento", type="string", length=50, nullable=true)
     */
    private $nrodocumento;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Email", type="string", length=100, nullable=true)
     */
    private $email;

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return Distribucionpedidosclientes
     */
    public function setId(string $id): Distribucionpedidosclientes
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getNombre(): string
    {
        return $this->nombre;
    }

    /**
     * @param string $nombre
     * @return Distribucionpedidosclientes
     */
    public function setNombre(string $nombre): Distribucionpedidosclientes
    {
        $this->nombre = $nombre;
        return $this;
    }

    /**
     * @return string
     */
    public function getApellido(): string
    {
        return $this->apellido;
    }

    /**
     * @param string $apellido
     * @return Distribucionpedidosclientes
     */
    public function setApellido(string $apellido): Distribucionpedidosclientes
    {
        $this->apellido = $apellido;
        return $this;
    }

    /**
     * @return string
     */
    public function getDireccion1(): string
    {
        return $this->direccion1;
    }

    /**
     * @param string $direccion1
     * @return Distribucionpedidosclientes
     */
    public function setDireccion1(string $direccion1): Distribucionpedidosclientes
    {
        $this->direccion1 = $direccion1;
        return $this;
    }

    /**
     * @return string
     */
    public function getDireccion2(): string
    {
        return $this->direccion2;
    }

    /**
     * @param string $direccion2
     * @return Distribucionpedidosclientes
     */
    public function setDireccion2(string $direccion2): Distribucionpedidosclientes
    {
        $this->direccion2 = $direccion2;
        return $this;
    }

    /**
     * @return string
     */
    public function getCiudad(): string
    {
        return $this->ciudad;
    }

    /**
     * @param string $ciudad
     * @return Distribucionpedidosclientes
     */
    public function setCiudad(string $ciudad): Distribucionpedidosclientes
    {
        $this->ciudad = $ciudad;
        return $this;
    }

    /**
     * @return string
     */
    public function getRegion(): string
    {
        return $this->region;
    }

    /**
     * @param string $region
     * @return Distribucionpedidosclientes
     */
    public function setRegion(string $region): Distribucionpedidosclientes
    {
        $this->region = $region;
        return $this;
    }

    /**
     * @return string
     */
    public function getCp(): string
    {
        return $this->cp;
    }

    /**
     * @param string $cp
     * @return Distribucionpedidosclientes
     */
    public function setCp(string $cp): Distribucionpedidosclientes
    {
        $this->cp = $cp;
        return $this;
    }

    /**
     * @return string
     */
    public function getTelefono(): string
    {
        return $this->telefono;
    }

    /**
     * @param string $telefono
     * @return Distribucionpedidosclientes
     */
    public function setTelefono(string $telefono): Distribucionpedidosclientes
    {
        $this->telefono = $telefono;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getNrocuenta(): ?string
    {
        return $this->nrocuenta;
    }

    /**
     * @param string|null $nrocuenta
     * @return Distribucionpedidosclientes
     */
    public function setNrocuenta(?string $nrocuenta): Distribucionpedidosclientes
    {
        $this->nrocuenta = $nrocuenta;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getTipocuenta(): ?string
    {
        return $this->tipocuenta;
    }

    /**
     * @param string|null $tipocuenta
     * @return Distribucionpedidosclientes
     */
    public function setTipocuenta(?string $tipocuenta): Distribucionpedidosclientes
    {
        $this->tipocuenta = $tipocuenta;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getRazonsocial(): ?string
    {
        return $this->razonsocial;
    }

    /**
     * @param string|null $razonsocial
     * @return Distribucionpedidosclientes
     */
    public function setRazonsocial(?string $razonsocial): Distribucionpedidosclientes
    {
        $this->razonsocial = $razonsocial;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getNrodocumento(): ?string
    {
        return $this->nrodocumento;
    }

    /**
     * @param string|null $nrodocumento
     * @return Distribucionpedidosclientes
     */
    public function setNrodocumento(?string $nrodocumento): Distribucionpedidosclientes
    {
        $this->nrodocumento = $nrodocumento;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param string|null $email
     * @return Distribucionpedidosclientes
     */
    public function setEmail(?string $email): Distribucionpedidosclientes
    {
        $this->email = $email;
        return $this;
    }


}
