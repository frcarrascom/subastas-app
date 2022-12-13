<?php
class Mensaje{
	private $codMensaje;
	private $codUsuarioEmisor;
	private $codUsuarioReceptor;
	private $asunto;
	private $mensaje;
	private $estado;
	private $fecha;

	public function __construct($row){
		$this->codMensaje = $row['codMensaje'];
		$this->codUsuarioEmisor = $row['codUsuarioEmisor'];
		$this->codUsuarioReceptor = $row['codUsuarioReceptor'];
		$this->asunto = $row['asunto'];
		$this->mensaje = $row['mensaje'];
		$this->estado = $row['estado'];
		$this->fecha = $row['fecha'];
	}

	/** GETTERs & SETTERs*/
    public function getCodMensaje()
    {
        return $this->codMensaje;
    }

    public function setCodMensaje($codMensaje)
    {
        $this->codMensaje = $codMensaje;
    }

    public function getCodEmisor()
    {
        return $this->codUsuarioEmisor;
    }

    public function setCodEmisor($codUsuarioEmisor)
    {
        $this->codUsuarioEmisor = $codUsuarioEmisor;
    }

    public function getCodReceptor()
    {
        return $this->codUsuarioReceptor;
    }

    public function setCodReceptor($codUsuarioReceptor)
    {
        $this->setCodReceptor = $codUsuarioReceptor;
    }

    public function getAsunto()
    {
        return $this->asunto;
    }

    public function setAsunto($asunto)
    {
        $this->asunto = $asunto;
    }

    public function getMensaje()
    {
        return $this->mensaje;
    }

    public function setMensaje($mensaje)
    {
        $this->mensaje = $mensaje;
    }

    public function getEstado()
    {
        return $this->estado;
    }

    public function setEstado($estado)
    {
        $this->estado = $estado;
    }

    public function getFecha()
    {
        return $this->fecha;
    }

    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }
}
?>