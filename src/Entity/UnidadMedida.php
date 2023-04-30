<?php


namespace App\Entity;

use Ramsey\Uuid\Doctrine\UuidGenerator;
use App\Repository\UnidadMedidaRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UnidadMedidaRepository::class)
 */
class UnidadMedida {

    /**
     * @ORM\Id
     * @ORM\Column(type="uuid", unique=true)
     * @ORM\GeneratedValue(strategy="CUSTOM")
     * @ORM\CustomIdGenerator(class=UuidGenerator::class)
     */
    protected $id;

        /**
    * @ORM\Column(type="string", length=50)
    */
    protected $nombre;
    
    
    /**
    * @ORM\Column(type="string", length=10)
    */
    protected $nombre_corto;
    
    /**
    * @ORM\Column(type="string", length=50,nullable=true)
    */
    protected $dimension;

    
    public function __toString(): string
    {
        return $this->nombre;
    }

    /**
     * @return mixed
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * @param string $nombre
     * @return $this
     */
    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;
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
     * @param string $nombreCorto
     * @return $this
     */
    public function setNombreCorto(string $nombreCorto): self
    {
        $this->nombre_corto = strtoupper($nombreCorto);
        return $this;
    }

    /**
     * @return string|null
     */
    public function getNombreCorto(): ?string
    {
        return $this->nombre_corto;
    }

    /**
     * @param string $dimension
     * @return $this
     */
    public function setDimension(string $dimension): self
    {
        $this->dimension = $dimension;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getDimension(): ?string
    {
        return $this->dimension;
    }

}