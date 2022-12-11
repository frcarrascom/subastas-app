<?php
class ProductoSubastado{
	private $codProductoSubastado;
	private $fechaInicio;
	private $fechaFin;
	private $estado;
    private $nombre;
    private $precio;
    private $categoria;
    private $descripcion;
    private $dineroInvertir;
    private $codUsuario;


	public function __construct($row){
		$this->codProductoSubastado = $row['codProductoSubastado'];
		$this->fechaInicio = $row['fechaInicio'];
		$this->fechaFin = $row['fechaFin'];
		$this->estado = $row['estado'];
		$this->nombre = $row['nombre'];
		$this->precio = $row['precio'];
		$this->categoria = $row['categoria'];
		$this->descripcion = $row['descripcion'];
		$this->dineroInvertir = $row['dineroInvertir'];
		$this->codUsuario = $row['codUsuario'];
	}


    public function getCodProductoSubastado()
    {
        return $this->codProductoSubastado;
    }

    public function setCodProductoSubastado($codProductoSubastado)
    {
        $this->codProductoSubastado = $codProductoSubastado;

        return $this;
    }

  
    public function getFechaInicio()
    {
        return $this->fechaInicio;
    }

    public function setFechaInicio($fechaInicio)
    {
        $this->fechaInicio = $fechaInicio;

        return $this;
    }

  
    public function getFechaFin()
    {
        return $this->fechaFin;
    }

    public function setFechaFin($fechaFin)
    {
        $this->fechaFin = $fechaFin;

        return $this;
    }

  
    public function getEstado()
    {
        return $this->estado;
    }

    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function getPrecio()
    {
        return $this->precio;
    }

    public function setPrecio($precio)
    {
        $this->precio = $precio;
    }

    public function getCategoria()
    {
        return $this->categoria;
    }

    public function setCategoria($categoria)
    {
        $this->categoria = $categoria;
    }

    public function getDescripcion()
    {
        return $this->descripcion;
    }

    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }

    public function getDineroInvertir()
    {
        return $this->dineroInvertir;
    }

    public function setDineroInvertir($dineroInvertir)
    {
        $this->dineroInvertir = $dineroInvertir;
    }

    public function getCodUsuario()
    {
        return $this->codUsuario;
    }

    public function setCodUsuario($codUsuario)
    {
        $this->codUsuario = $codUsuario;
    }
}
?>