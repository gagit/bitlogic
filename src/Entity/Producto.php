<?php


namespace App\Entity;

use Doctrine\Common\Collections\Collection;
use Ramsey\Uuid\Doctrine\UuidGenerator;
use App\Repository\ProductoRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProductoRepository::class)
 */
class Producto {

    /**
     * @ORM\Id
     * @ORM\Column(type="uuid", unique=true)
     * @ORM\GeneratedValue(strategy="CUSTOM")
     * @ORM\CustomIdGenerator(class=UuidGenerator::class)
     */
    protected $id;
    
    /**
    * @ORM\Column(type="string", length=100, nullable=true)
    */
    protected $codBarra;
    
    /**
    * @ORM\Column(type="string", length=100)
    */
    protected $nombre;
    
    /**
    * @ORM\Column(type="string", length=200, nullable=true)
    */
    protected $descripcion;
    
    /**
    * @ORM\ManyToOne(targetEntity="Marca")
    * @ORM\JoinColumn(name="marca", referencedColumnName="id")
    */
    protected $marca;
    
    /**
    * @ORM\ManyToOne(targetEntity="UnidadMedida")
    * @ORM\JoinColumn(name="unidad_medida", referencedColumnName="id")
    */
    protected $unidad_medida;
    
    /**
    * @ORM\Column(type="decimal", nullable=true)
    */
    protected $valor_umed;
    
     /**
     * @ORM\ManyToMany(targetEntity="Categoria", inversedBy="productos_x_categorias")
     * @ORM\JoinTable(name="categoria_productos",
     *      joinColumns={@ORM\JoinColumn(name="id_producto", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="id_categoria", referencedColumnName="id")}
     *      )
     */
    protected $categorias_producto;
    
    

    public function __toString() : string
    {
        return $this->nombre;
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->categorias_producto = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * @param string $codBarra
     * @return $this
     */
    public function setCodBarra(string $codBarra)
    {
        $this->codBarra = $codBarra;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getCodBarra(): ?string
    {
        return $this->codBarra;
    }

    /**
     * @param string $nombre
     * @return $this
     */
    public function setNombre(string $nombre)
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
     * @param string $descripcion
     * @return $this
     */
    public function setDescripcion(string $descripcion)
    {
        $this->descripcion = $descripcion;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getDescripcion(): ?string
    {
        return $this->descripcion;
    }

    /**
     * @param float $valorUmed
     * @return $this
     */
    public function setValorUmed(float $valorUmed)
    {
        $this->valor_umed = $valorUmed;
        return $this;
    }

    /**
     * @return float
     */
    public function getValorUmed():float
    {
        return $this->valor_umed;
    }

    /**
     * @param Marca|null $marca
     * @return $this
     */
    public function setMarca(Marca $marca = null): self
    {
        $this->marca = $marca;
        return $this;
    }

    /**
     * @return Marca|null
     */
    public function getMarca(): ?Marca
    {
        return $this->marca;
    }

    /**
     * @param UnidadMedida|null $unidadMedida
     * @return $this
     */
    public function setUnidadMedida(UnidadMedida $unidadMedida = null) : self
    {
        $this->unidad_medida = $unidadMedida;
        return $this;
    }

    /**
     * @return UnidadMedida|null
     */
    public function getUnidadMedida(): ?UnidadMedida
    {
        return $this->unidad_medida;
    }

    /**
     * @param Categoria $categoriasProducto
     * @return $this
     */
    public function addCategoriasProducto(Categoria $categoriasProducto): self
    {
        $this->categorias_producto[] = $categoriasProducto;
        return $this;
    }

    /**
     * @param Categoria $categoriasProducto
     * @return $this
     */
    public function removeCategoriasProducto(Categoria $categoriasProducto): self
    {
        $this->categorias_producto->removeElement($categoriasProducto);
        return $this;
    }

    /**
     * @return Collection
     */
    public function getCategoriasProducto(): Collection
    {
        return $this->categorias_producto;
    }
}