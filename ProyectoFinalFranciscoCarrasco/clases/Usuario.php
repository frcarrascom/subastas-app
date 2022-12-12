<?php
class Usuario{
	private $CodUsuario;
	private $nombre;
	private $apellidos;
	private $nombreUsuario;
	private $email;
	private $password;
	
	public function __construct($row){
		$this->CodUsuario= $row['codUsuario'];
		$this->nombre= $row['nombre'];
		$this->apellidos= $row['apellidos'];
		$this->nombreUsuario= $row['nombreUsuario'];
		$this->email= $row['email'];
		$this->password= $row['password'];
	}
	
	/**GETTERs & SETTERs*/
    public function getCodUsuario()
    {
        return $this->CodUsuario;
    }

    public function setCodUsuario($CodUsuario)
    {
        $this->CodUsuario = $CodUsuario;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function getApellidos()
    {
        return $this->apellidos;
    }

    public function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;
    }

    public function getNombreUsuario()
    {
        return $this->nombreUsuario;
    }

    public function setNombreUsuario($nombreUsuario)
    {
        $this->nombreUsuario = $nombreUsuario;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }
}
?>