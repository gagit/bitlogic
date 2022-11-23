<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Clientesnew
 *
 * @ORM\Table(name="clientesNew")
 * @ORM\Entity
 */
class Clientesnew
{
    /**
     * @var string
     *
     * @ORM\Column(name="Id", type="decimal", precision=18, scale=0, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Apellidos", type="string", length=50, nullable=true)
     */
    private $apellidos;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Nombres", type="string", length=50, nullable=true)
     */
    private $nombres;

    /**
     * @var string|null
     *
     * @ORM\Column(name="IdPais", type="decimal", precision=18, scale=0, nullable=true)
     */
    private $idpais;

    /**
     * @var string|null
     *
     * @ORM\Column(name="IdProvincia", type="decimal", precision=18, scale=0, nullable=true)
     */
    private $idprovincia;

    /**
     * @var string|null
     *
     * @ORM\Column(name="IdLocalidad", type="decimal", precision=18, scale=0, nullable=true)
     */
    private $idlocalidad;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Direccion", type="string", length=50, nullable=true)
     */
    private $direccion;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Altura", type="string", length=10, nullable=true)
     */
    private $altura;

    /**
     * @var string|null
     *
     * @ORM\Column(name="CodigoPostal", type="string", length=10, nullable=true)
     */
    private $codigopostal;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Sexo", type="string", length=1, nullable=true, options={"fixed"=true})
     */
    private $sexo;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Telefono", type="string", length=50, nullable=true)
     */
    private $telefono;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Celular", type="string", length=50, nullable=true)
     */
    private $celular;

    /**
     * @var string|null
     *
     * @ORM\Column(name="EMail", type="string", length=50, nullable=true)
     */
    private $email;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Nacionalidad", type="string", length=50, nullable=true)
     */
    private $nacionalidad;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="FechaNacimiento", type="datetime", nullable=true)
     */
    private $fechanacimiento;

    /**
     * @var string|null
     *
     * @ORM\Column(name="TipoIVA", type="decimal", precision=18, scale=0, nullable=true)
     */
    private $tipoiva;

    /**
     * @var string|null
     *
     * @ORM\Column(name="NroDoc", type="string", length=20, nullable=true)
     */
    private $nrodoc;

    /**
     * @var string|null
     *
     * @ORM\Column(name="TipoDoc", type="decimal", precision=18, scale=0, nullable=true)
     */
    private $tipodoc;

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return Clientesnew
     */
    public function setId(string $id): Clientesnew
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @var bool
     *
     * @ORM\Column(name="Habilitado", type="boolean", nullable=false)
     */
    private $habilitado;

    /**
     * @var bool
     *
     * @ORM\Column(name="Activo", type="boolean", nullable=false)
     */
    private $activo;

    /**
     * @var string|null
     *
     * @ORM\Column(name="IdSucursalAlta", type="decimal", precision=18, scale=0, nullable=true)
     */
    private $idsucursalalta;

    /**
     * @var string|null
     *
     * @ORM\Column(name="IdSucursalModificacion", type="decimal", precision=18, scale=0, nullable=true)
     */
    private $idsucursalmodificacion;

    /**
     * @var string|null
     *
     * @ORM\Column(name="UsuarioAlta", type="string", length=50, nullable=true)
     */
    private $usuarioalta;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="FechaAlta", type="datetime", nullable=true)
     */
    private $fechaalta;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="FechaBaja", type="datetime", nullable=true)
     */
    private $fechabaja;

    /**
     * @var string|null
     *
     * @ORM\Column(name="UsuarioUltimaModificacion", type="string", length=50, nullable=true)
     */
    private $usuarioultimamodificacion;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="FechaUltimaModificacion", type="datetime", nullable=true)
     */
    private $fechaultimamodificacion;

    /**
     * @return string|null
     */
    public function getApellidos(): ?string
    {
        return $this->apellidos;
    }

    /**
     * @param string|null $apellidos
     * @return Clientesnew
     */
    public function setApellidos(?string $apellidos): Clientesnew
    {
        $this->apellidos = $apellidos;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getNombres(): ?string
    {
        return $this->nombres;
    }

    /**
     * @param string|null $nombres
     * @return Clientesnew
     */
    public function setNombres(?string $nombres): Clientesnew
    {
        $this->nombres = $nombres;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getIdpais(): ?string
    {
        return $this->idpais;
    }

    /**
     * @param string|null $idpais
     * @return Clientesnew
     */
    public function setIdpais(?string $idpais): Clientesnew
    {
        $this->idpais = $idpais;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getIdprovincia(): ?string
    {
        return $this->idprovincia;
    }

    /**
     * @param string|null $idprovincia
     * @return Clientesnew
     */
    public function setIdprovincia(?string $idprovincia): Clientesnew
    {
        $this->idprovincia = $idprovincia;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getIdlocalidad(): ?string
    {
        return $this->idlocalidad;
    }

    /**
     * @param string|null $idlocalidad
     * @return Clientesnew
     */
    public function setIdlocalidad(?string $idlocalidad): Clientesnew
    {
        $this->idlocalidad = $idlocalidad;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getDireccion(): ?string
    {
        return $this->direccion;
    }

    /**
     * @param string|null $direccion
     * @return Clientesnew
     */
    public function setDireccion(?string $direccion): Clientesnew
    {
        $this->direccion = $direccion;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getAltura(): ?string
    {
        return $this->altura;
    }

    /**
     * @param string|null $altura
     * @return Clientesnew
     */
    public function setAltura(?string $altura): Clientesnew
    {
        $this->altura = $altura;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getCodigopostal(): ?string
    {
        return $this->codigopostal;
    }

    /**
     * @param string|null $codigopostal
     * @return Clientesnew
     */
    public function setCodigopostal(?string $codigopostal): Clientesnew
    {
        $this->codigopostal = $codigopostal;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getSexo(): ?string
    {
        return $this->sexo;
    }

    /**
     * @param string|null $sexo
     * @return Clientesnew
     */
    public function setSexo(?string $sexo): Clientesnew
    {
        $this->sexo = $sexo;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getTelefono(): ?string
    {
        return $this->telefono;
    }

    /**
     * @param string|null $telefono
     * @return Clientesnew
     */
    public function setTelefono(?string $telefono): Clientesnew
    {
        $this->telefono = $telefono;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getCelular(): ?string
    {
        return $this->celular;
    }

    /**
     * @param string|null $celular
     * @return Clientesnew
     */
    public function setCelular(?string $celular): Clientesnew
    {
        $this->celular = $celular;
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
     * @return Clientesnew
     */
    public function setEmail(?string $email): Clientesnew
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getNacionalidad(): ?string
    {
        return $this->nacionalidad;
    }

    /**
     * @param string|null $nacionalidad
     * @return Clientesnew
     */
    public function setNacionalidad(?string $nacionalidad): Clientesnew
    {
        $this->nacionalidad = $nacionalidad;
        return $this;
    }

    /**
     * @return \DateTime|null
     */
    public function getFechanacimiento(): ?\DateTime
    {
        return $this->fechanacimiento;
    }

    /**
     * @param \DateTime|null $fechanacimiento
     * @return Clientesnew
     */
    public function setFechanacimiento(?\DateTime $fechanacimiento): Clientesnew
    {
        $this->fechanacimiento = $fechanacimiento;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getTipoiva(): ?string
    {
        return $this->tipoiva;
    }

    /**
     * @param string|null $tipoiva
     * @return Clientesnew
     */
    public function setTipoiva(?string $tipoiva): Clientesnew
    {
        $this->tipoiva = $tipoiva;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getNrodoc(): ?string
    {
        return $this->nrodoc;
    }

    /**
     * @param string|null $nrodoc
     * @return Clientesnew
     */
    public function setNrodoc(?string $nrodoc): Clientesnew
    {
        $this->nrodoc = $nrodoc;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getTipodoc(): ?string
    {
        return $this->tipodoc;
    }

    /**
     * @param string|null $tipodoc
     * @return Clientesnew
     */
    public function setTipodoc(?string $tipodoc): Clientesnew
    {
        $this->tipodoc = $tipodoc;
        return $this;
    }

    /**
     * @return bool
     */
    public function isHabilitado(): bool
    {
        return $this->habilitado;
    }

    /**
     * @param bool $habilitado
     * @return Clientesnew
     */
    public function setHabilitado(bool $habilitado): Clientesnew
    {
        $this->habilitado = $habilitado;
        return $this;
    }

    /**
     * @return bool
     */
    public function isActivo(): bool
    {
        return $this->activo;
    }

    /**
     * @param bool $activo
     * @return Clientesnew
     */
    public function setActivo(bool $activo): Clientesnew
    {
        $this->activo = $activo;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getIdsucursalalta(): ?string
    {
        return $this->idsucursalalta;
    }

    /**
     * @param string|null $idsucursalalta
     * @return Clientesnew
     */
    public function setIdsucursalalta(?string $idsucursalalta): Clientesnew
    {
        $this->idsucursalalta = $idsucursalalta;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getIdsucursalmodificacion(): ?string
    {
        return $this->idsucursalmodificacion;
    }

    /**
     * @param string|null $idsucursalmodificacion
     * @return Clientesnew
     */
    public function setIdsucursalmodificacion(?string $idsucursalmodificacion): Clientesnew
    {
        $this->idsucursalmodificacion = $idsucursalmodificacion;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getUsuarioalta(): ?string
    {
        return $this->usuarioalta;
    }

    /**
     * @param string|null $usuarioalta
     * @return Clientesnew
     */
    public function setUsuarioalta(?string $usuarioalta): Clientesnew
    {
        $this->usuarioalta = $usuarioalta;
        return $this;
    }

    /**
     * @return \DateTime|null
     */
    public function getFechaalta(): ?\DateTime
    {
        return $this->fechaalta;
    }

    /**
     * @param \DateTime|null $fechaalta
     * @return Clientesnew
     */
    public function setFechaalta(?\DateTime $fechaalta): Clientesnew
    {
        $this->fechaalta = $fechaalta;
        return $this;
    }

    /**
     * @return \DateTime|null
     */
    public function getFechabaja(): ?\DateTime
    {
        return $this->fechabaja;
    }

    /**
     * @param \DateTime|null $fechabaja
     * @return Clientesnew
     */
    public function setFechabaja(?\DateTime $fechabaja): Clientesnew
    {
        $this->fechabaja = $fechabaja;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getUsuarioultimamodificacion(): ?string
    {
        return $this->usuarioultimamodificacion;
    }

    /**
     * @param string|null $usuarioultimamodificacion
     * @return Clientesnew
     */
    public function setUsuarioultimamodificacion(?string $usuarioultimamodificacion): Clientesnew
    {
        $this->usuarioultimamodificacion = $usuarioultimamodificacion;
        return $this;
    }

    /**
     * @return \DateTime|null
     */
    public function getFechaultimamodificacion(): ?\DateTime
    {
        return $this->fechaultimamodificacion;
    }

    /**
     * @param \DateTime|null $fechaultimamodificacion
     * @return Clientesnew
     */
    public function setFechaultimamodificacion(?\DateTime $fechaultimamodificacion): Clientesnew
    {
        $this->fechaultimamodificacion = $fechaultimamodificacion;
        return $this;
    }


}
