<?php

namespace App\Entity;

use Ramsey\Uuid\Doctrine\UuidGenerator;
use App\Repository\CategoriaRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * @ORM\Entity(repositoryClass=CategoriaRepository::class)
 */
class Categoria {

    /**
     * @ORM\Id
     * @ORM\Column(type="uuid", unique=true)
     * @ORM\GeneratedValue(strategy="CUSTOM")
     * @ORM\CustomIdGenerator(class=UuidGenerator::class)
     */
    protected $id;
    
    /**
    * @ORM\Column(type="string", length=100)
    */
    protected $nombre;
    
    
    /**
    * @ORM\Column(type="string", length=200, nullable=true)
    */
    protected $descripcion;
    
    
    /**
     * @ORM\ManyToMany(targetEntity="Producto", mappedBy="categorias_producto")
     */
    protected $productos_x_categorias;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->productos_x_categorias = new ArrayCollection();
    }
    
    public function __toString() : string
    {
        return $this->nombre;
        
    }
    
    /**
     * Get id
     */
    public function getId() : ?string
    {
        return $this->id;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return Categoria
     */
    public function setNombre(string $nombre): self
    {
        $this->nombre = strtoupper($nombre);
    
        return $this;
    }

    /**
     * Get nombre
     *
     */
    public function getNombre() : ?string
    {
        return $this->nombre;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     * @return Categoria
     */
    public function setDescripcion(string $descripcion): self
    {
        $this->descripcion = strtoupper($descripcion);
        return $this;
    }

    /**
     * Get descripcion
     */
    public function getDescripcion() : ?string
    {
        return $this->descripcion;
    }

    /**
     * Add productos_x_categorias
     *
     * @param Producto $productosXCategorias
     * @return Categoria
     */
    public function addProductosXCategoria(Producto $productosXCategorias): self
    {
        $this->productos_x_categorias[] = $productosXCategorias;
        return $this;
    }

    /**
     * @param Producto $productosXCategorias
     * @return $this
     */
    public function removeProductosXCategoria(Producto $productosXCategorias):self
    {
        $this->productos_x_categorias->removeElement($productosXCategorias);
        return $this;
    }

    /**
     * @return Collection
     */
    public function getProductosXCategorias() :Collection
    {
        return $this->productos_x_categorias;
    }
}