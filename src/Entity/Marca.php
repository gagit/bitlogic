<?php


namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiProperty;
use ApiPlatform\Core\Annotation\ApiResource;
use Ramsey\Uuid\Doctrine\UuidGenerator;
use App\Repository\MarcaRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=MarcaRepository::class)
 */
class Marca {
    /**
     * @ApiProperty(identifier=true)
     * @ORM\Id
     * @ORM\Column(type="uuid", unique=true)
     * @ORM\GeneratedValue(strategy="CUSTOM")
     * @ORM\CustomIdGenerator(class=UuidGenerator::class)
     */
    protected $id;

    /**
    * @ApiProperty()
    * @ORM\Column(type="string", length=100, nullable=false)
    */
    protected $nombre;
    
    
    /**
    * @ApiProperty()
    * @ORM\Column(type="string", length=200, nullable=true)
    */
    protected $descripcion;

    
    public function __toString() : string
    {
        return $this->nombre;
    }

    /**
     * @return string
     */
    public function getId() : string
    {
        return $this->id;
    }

    /**
     * @param $nombre
     * @return $this
     */
    public function setNombre($nombre): self
    {
        $this->nombre = $nombre;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    /**
     * @param $descripcion
     * @return $this
     */
    public function setDescripcion($descripcion): self
    {
        $this->descripcion = $descripcion;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getDescripcion() : ?string
    {
        return $this->descripcion;
    }
}