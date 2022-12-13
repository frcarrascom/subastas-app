<?php
class Puja{
	private $codPuja;
	private $codProductoSubastado;
	private $codPujador;
	private $cantidad;
	private $fecha;

	public function __construct($row){
		$this->codPuja = $row['codPuja'];
		$this->codProductoSubastado = $row['codProductoSubastado'];
		$this->codPujador = $row['codPujador'];
		$this->cantidad = $row['cantidad'];
		$this->fecha = $row['fecha'];
	}

    public function getCodPuja()
    {
        return $this->codPuja;
    }

    public function setCodPuja($codPuja)
    {
        $this->codPuja = $codPuja;

        return $this;
    }

    public function getcodProductoSubastado()
    {
        return $this->codProductoSubastado;
    }

    public function setcodProductoSubastado($codProductoSubastado)
    {
        $this->codProductoSubastado = $codProductoSubastado;

        return $this;
    }

    public function getCodPujador()
    {
        return $this->codPujador;
    }

    public function setCodPujador($codPujador)
    {
        $this->codPujador = $codPujador;

        return $this;
    }

    public function getCantidad()
    {
        return $this->cantidad;
    }

    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;

        return $this;
    }

    public function getFecha()
    {
        return $this->fecha;
    }

    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }
}
?>