<?php
class Categoria{

	private $codCategoria;
	private $nombre;
	private $descripcion;

	public function __construct($row){
		$this->nombre = $row["nombre"];
		$this->descripcion = $row["descripcion"];
        $this->codCategoria = $row["codCategoria"];
	}



    public function getCodCategoria(){
        return $this->codCategoria;
    }

    public function setCodCategoria($codCategoria){
        $this->codCategoria = $codCategoria;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    public function getdescripcion(){
        return $this->descripcion;
    }

    public function setdescripcion($descripcion){
        $this->descripcion = $descripcion;
    }
}

?>