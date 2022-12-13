<?php
//esto muestra errores de consultas a bases de datos
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

spl_autoload_register(function ($clase) {
    include $clase . '.php';
});

require_once('conexion.php');

class DbManager
{
    public static function getConnection()
    {
        $inst = Conexion::getInstance();
        return $inst->getConnection();
    }

    /**
     * =============================================================================================
     * |||||||||||||||||||||||||||||||||||||||||| USUARIO ||||||||||||||||||||||||||||||||||||||||||
     * =============================================================================================
     */

    public static function logearUsuario($userName, $pass)
    {
        $connection = self::getConnection();
        $sql = "SELECT * FROM usuario WHERE nombreUsuario = '" . $userName . "' AND password = '" . $pass . "'";
        $result = $connection->query($sql);
        //$usuario;
        if ($result) {
            $row = $result->fetch_array();
            $usuario = new Usuario($row);
        }
        return $usuario;
    }

    public static function getUser($codUsr)
    {
        $connection = self::getConnection();
        $sql = "SELECT * FROM usuario WHERE codUsuario = " . $codUsr;
        $result = $connection->query($sql);
        $usuario = null;
        if ($result) {
            $row = $result->fetch_array();
            $usuario = new Usuario($row);
        }
        return $usuario;
    }

    public static function getCodUsr($nUsuario)
    {
        $connection = self::getConnection();
        $sql = "SELECT * FROM usuario WHERE nombreUsuario = '" . $nUsuario . "'";
        $result = $connection->query($sql);
        $usuario = null;
        if ($result) {
            $row = $result->fetch_array();
            if (!empty($row)) {
                $usuario = new Usuario($row);
                return $usuario;
            } else return null;
        } else {
            return null;
        }
    }

    /*GUARDAMOS NUEVO USUARIO EN BASE DE DATOS*/
    public static function insertUser($nombre, $apellidos, $nombreUsuario, $email, $password)
    {
        $connection = self::getConnection();
        $sql = "INSERT INTO usuario (nombre, apellidos, nombreUsuario, email, password)";
        $sql .= "VALUES ('" . $nombre . "', '" . $apellidos . "', '" . $nombreUsuario . "', '" . $email . "', '" . $password . "')";
        $result = $connection->query($sql);
        if ($result) {
            return true;
        }
        return false;
    }

    /*Actualizar Usuario*/
    public static function updateUsr($codUsr, $nombre, $apellidos, $nombreUsuario, $email, $password)
    {
        $connection = self::getConnection();
        $sql = "UPDATE usuario SET nombre = '" . $nombre . "', apellidos = '" . $apellidos . "', nombreUsuario = '" . $nombreUsuario . "', email='" . $email . "', password ='" . $password . "' WHERE codUsuario = " . $codUsr;
        $result = $connection->query($sql);

        return $result;
    }

    public static function deleteUser($codUsr)
    {
        $connection = self::getConnection();
        $subastas = self::getSubastasVendedor($codUsr);

        if (count($subastas)>0) {
            foreach ($subastas as $sub) {
                $borraPujas = self::deletePujas($sub->getCodProductoSubastado());
                $delete = "DELETE FROM productosubastado WHERE codProductoSubastado = " . $sub->getCodProductoSubastado();
                $resDelete = $connection->query($delete);
            }
            if ($resDelete) {
                //borramos los mensajes enviados
                $deleteMsg = "DELETE FROM mensajes WHERE codUsuarioEmisor = " . $codUsr;
                $resDeleteMsg = $connection->query($deleteMsg);

                //borramos los mensajes recibidos
                if ($resDeleteMsg) {
                    $deleteMsgReceptor = "DELETE FROM mensajes WHERE codUsuarioReceptor = " . $codUsr;
                    $resDeleteMsgReceptor = $connection->query($deleteMsgReceptor);
                    //borramos usuario
                    if ($resDeleteMsgReceptor) {
                        $sql = "DELETE FROM usuario WHERE codUsuario = " . $codUsr;
                        $resultado = $connection->query($sql);
                        if ($resultado) {
                            return true;
                        }
                        return false;
                    }
                }
            }
        } else {
            $delete = "DELETE FROM puja WHERE codPujador = " . $codUsr;
            $resDelete = $connection->query($delete);
            if ($resDelete) {
                //borramos los mensajes
                $deleteMsg = "DELETE FROM mensajes WHERE codUsuarioEmisor = " . $codUsr;
                $resDeleteMsg = $connection->query($deleteMsg);
                if ($resDeleteMsg) {
                    $deleteMsgReceptor = "DELETE FROM mensajes WHERE codUsuarioReceptor = " . $codUsr;
                    $resDeleteMsgReceptor = $connection->query($deleteMsgReceptor);
                    if ($resDeleteMsgReceptor) {
                        $sql = "DELETE FROM usuario WHERE codUsuario = " . $codUsr;
                        $resultado = $connection->query($sql);
                        if ($resultado) {
                            return true;
                        }
                        return false;
                    }
                }
            }
        }
        return false;
    }

    /**
     * ===========================================================================================
     * |||||||||||||||||||||||||||||||||||||||| MENSAJES |||||||||||||||||||||||||||||||||||||||||
     * ===========================================================================================
     */

    public static function insertarMsg($codEmisor, $codReceptor, $asunto, $mensaje, $estado, $fecha)
    {
        $connection = self::getConnection();
        $sql = "INSERT INTO mensajes (codUsuarioEmisor, codUsuarioReceptor, asunto, mensaje, estado, fecha) ";
        $sql .= "VALUES (" . $codEmisor . ", " . $codReceptor . ", '" . $asunto . "', '" . $mensaje . "', '" . $estado . "', '" . $fecha . "')";
        $result = $connection->query($sql);
        if ($result) {
            return $result;
        }
        $mensaje = ($codEmisor . " - " . $codReceptor . " - " . $asunto . " - " . $mensaje . " - " . $fecha);
        return $mensaje;
    }

    public static function deleteMsg($codMensaje)
    {
        $connection = self::getConnection();
        //recoge el registro del mensaje en concreto y crea una instancia de mensaje
        $recogeSql = "SELECT * FROM mensajes where codMensaje = " . $codMensaje;
        $reg = $connection->query($recogeSql);
        $mensaje = null;
        if ($row = $reg->fetch_array()) {
            $mensaje = new Mensaje($row);
            //borramos el mensaje de Mensajes
            $sql = "DELETE FROM mensajes WHERE codMensaje = " . $codMensaje;
            $result = $connection->query($sql);
            if ($result) {
                // creamos un registro en mensajes borrados
                $sqlInsert = "INSERT INTO mensajesborrados (codUsuarioEmisor, codUsuarioReceptor, asunto, mensaje, estado) ";
                $sqlInsert .= "VALUES (" . $mensaje->getCodEmisor() . ", " . $mensaje->getCodReceptor() . ", '" . $mensaje->getAsunto() . "', '" . $mensaje->getMensaje() . "', 'BORRADO')";
                $success = $connection->query($sqlInsert);
                if ($success) {
                    return $success;
                }
                return "No se ha insertado el registro en Mensajes Borrados";
            }
            return "Fallo: " . $codMensaje;
        }
        return "Fallo: " . $codMensaje;
    }

    public static function numMsg($codReceptor)
    {
        $connection = self::getConnection();
        $sql = "SELECT * FROM mensajes where codUsuarioReceptor = " . $codReceptor;
        $result = $connection->query($sql);

        if ($result) {
            return $result->num_rows;
        }
        return 0;
    }

    public static function getMsgByReceptor($codReceptor)
    {
        $connection = self::getConnection();
        $sql = "SELECT * FROM mensajes WHERE codUsuarioReceptor = " . $codReceptor . " ORDER BY fecha DESC";
        $result = $connection->query($sql);
        $mensajes = array();
        if ($result) {
            while ($row = $result->fetch_array()) {
                $mensajes[] = new Mensaje($row);
            }
        }
        return $mensajes;
    }

    public static function getMsgByEmisor($codEmisor)
    {
        $connection = self::getConnection();
        $sql = "SELECT * FROM mensajes WHERE codUsuarioEmisor = " . $codEmisor . " ORDER BY fecha DESC";
        $result = $connection->query($sql);
        $mensajes = array();
        if ($result) {
            while ($row = $result->fetch_array()) {
                $mensajes[] = new Mensaje($row);
            }
        }
        return $mensajes;
    }

    public static function getMsgSinLeer($codReceptor)
    {
        $connection = self::getConnection();
        $sql = "SELECT * FROM mensajes WHERE estado = 'NV' AND codUsuarioReceptor = " . $codReceptor . " ORDER BY fecha DESC";
        $result = $connection->query($sql);
        $mensajes = array();
        if ($result) {
            while ($row = $result->fetch_array()) {
                $mensajes[] = new Mensaje($row);
            }
        }
        return $mensajes;
    }

    public static function changeState($codMsg, $estado)
    {
        $connection = self::getConnection();
        $sql = 'UPDATE mensajes SET estado = ' . "'" . $estado . "'" . 'WHERE codMensaje = ' . $codMsg;
        $result = $connection->query($sql);
        if ($result) {
            return "1A";
        } else {
            return $codMsg;
        }
    }

    public static function getMsgCodigo($codMensaje)
    {
        $connection = self::getConnection();
        $sql = "SELECT * FROM mensajes WHERE codMensaje = " . $codMensaje;
        $result = $connection->query($sql);
        $mensaje = null;
        if ($row = $result->fetch_array()) {
            $mensaje = new Mensaje($row);
            return $mensaje;
        }
        return "FALLO Obteniendo Mensaje";
    }


    /**
     * ============================================================================================================
     * ||||||||||||||||||||||||||||||||||||||||||||||||| SUBASTAS |||||||||||||||||||||||||||||||||||||||||||||||||
     * ============================================================================================================
     */
    public static function getAllSubastas()
    {
        $connection = self::getConnection();
        $sql = "SELECT * FROM productosubastado";
        $result = $connection->query($sql);
        $subastas = [];
        while ($row = $result->fetch_array()) {
            $subastas[] = new ProductoSubastado($row);
        }
        return $subastas;
    }

    public static function getSubastasCategoria($codCategoria)
    {
        $connection = self::getConnection();
        $sql = "SELECT * FROM productosubastado WHERE categoria = " . $codCategoria;
        $result = $connection->query($sql);
        $subasta = [];
        if ($result) {
            while ($row = $result->fetch_array()) {
                $subasta[] = new ProductoSubastado($row);
            }
            return $subasta;
        }
        return "FALLO Obteniendo ProductoSubastado";
    }

    public static function getSubastasNombre($nombre)
    {
        $connection = self::getConnection();
        $sql = "SELECT * FROM productosubastado WHERE nombre LIKE '%" . $nombre . "%'";
        $result = $connection->query($sql);
        $subasta = [];
        if ($result) {
            while ($row = $result->fetch_array()) {
                $subasta[] = new ProductoSubastado($row);
            }
            return $subasta;
        }
        return "FALLO Obteniendo ProductoSubastado";
    }

    public static function getSubastasVendedor($codVendedor)
    {
        $connection = self::getConnection();
        $sql = "SELECT * FROM productosubastado WHERE codUsuario = " . $codVendedor;
        $result = $connection->query($sql);
        $subasta = [];
        if ($result) {
            while ($row = $result->fetch_array()) {
                $subasta[] = new ProductoSubastado($row);

            }
            return $subasta;
        }
        return "FALLO Obteniendo ProductoSubastado";
    }

    public static function getSubastaCod($codSubasta)
    {
        $connection = self::getConnection();
        $sql = "SELECT * FROM productosubastado WHERE codProductoSubastado = " . $codSubasta;
        $result = $connection->query($sql);
        $subasta = null;
        if ($row = $result->fetch_array()) {
            $subasta = new ProductoSubastado($row);
            return $subasta;
        }
        return "FALLO Obteniendo ProductoSubastado";
    }

    public static function getCodigoSubastaTodo($fechaI, $nombreP, $precioI, $categoria, $codUsu)
    {
        $connection = self::getConnection();
        $sql = "SELECT * FROM productosubastado WHERE fechaInicio = " . "'" . $fechaI . "'" . " AND nombre = " . "'" . $nombreP . "'" . " AND precio = " . "'" . $precioI . "'" . " AND categoria = " . "'" . $categoria . "'" . " AND codUsuario = " . "'" . $codUsu . "'";
        $result = $connection->query($sql);
        $subasta = null;
        if ($row = $result->fetch_array()) {
            $subasta = new ProductoSubastado($row);
            return $subasta;
        }
        return "FALLO Obteniendo ProductoSubastado";
    }

    public static function insertarProductoSubastado($fechaInicio, $fechaFin, $estado, $nombre, $precio, $categoria, $descripcion, $dineroInvertir, $codUsuario)
    {
        $connection = self::getConnection();

        $sql = "INSERT INTO productosubastado(fechaInicio, fechaFin, estado, nombre, precio, categoria, descripcion, dineroInvertir, codUsuario)";

        $sql .= "VALUES ('" . $fechaInicio . "','" . $fechaFin . "', '" . $estado . "', '" . $nombre . "', " . $precio . ", " . $categoria . ", '" . $descripcion . "', " . $dineroInvertir . ", " . $codUsuario . ")";
        if ($result = $connection->query($sql)) {
            return $connection->insert_id;
        } else {
            return $sql;
        }
    }

    public static function cambiarEstadoSubasta($codSubasta, $estado)
    {
        $connection = self::getConnection();
        $sql = "UPDATE productosubastado SET estado = " . "'" . $estado . "'" . " WHERE codProductoSubastado= " . $codSubasta;
        $result = $connection->query($sql);
        if ($result) {
            return true;
        }
        return false;
    }

    public static function deleteSubasta($codSubasta)
    {
        $connection = self::getConnection();
        $select = "SELECT * FROM productosubastado WHERE codProductoSubastado = " . $codSubasta;
        $result = $connection->query($select);
        if ($result->num_rows > 0 && $row = $result->fetch_array()) {
            $subasta = new ProductoSubastado($row);
        }

        if ($result) {
            $borraPujas = self::deletePujas($subasta->getCodProductoSubastado());
            $delete = "DELETE FROM productosubastado WHERE codProductoSubastado = " . $subasta->getCodProductoSubastado();
            $resDelete = $connection->query($delete);
        }
        return $resDelete;

    }

    public static function getSubastasPujadas($codPujador)
    {
        $connection = self::getConnection();
        $sql = "SELECT * FROM productosubastado WHERE codProductoSubastado IN (SELECT codProductoSubastado FROM puja WHERE codPujador = " . $codPujador . ")";
        $result = $connection->query($sql);
        $subasta = [];
        if ($result) {
            while ($row = $result->fetch_array()) {
                $subasta[] = new ProductoSubastado($row);
            }
            return $subasta;
        }
        return "FALLO Obteniendo ProductoSubastado";
    }

    public static function getTodasSubastasCompletasPujadas()
    {
        $connection = self::getConnection();
        try {
            $sql = $connection->prepare("SELECT DISTINCT pu.codPujador, p.codProductoSubastado, p.nombre, p.estado, p.fechaFin 
            FROM productosubastado p, puja pu WHERE p.codProductoSubastado = pu.codProductoSubastado AND p.estado = 'finalizada'");
            $sql->execute();

            $resultSet = $sql->get_result();
            $resultado = $resultSet->fetch_all();

        } catch (PDOException $e) {
            echo "ERROR - No se pudo acceder a la tabla usuarios: " . $e->getMessage();
        }
        return $resultado;
    }

    public static function getSubastasCompletasPujadas($codUsuario)
    {
        $connection = self::getConnection();

        try {
            $sql = $connection->prepare("SELECT DISTINCT pu.codPujador, p.codProductoSubastado, p.nombre, p.estado, p.fechaFin 
            FROM productosubastado p, puja pu WHERE p.codProductoSubastado = pu.codProductoSubastado AND p.estado = 'finalizada' AND pu.codPujador=" . $codUsuario);
            $sql->execute();

            $resultSet = $sql->get_result();
            $resultado = $resultSet->fetch_all();

        } catch (PDOException $e) {
            echo "ERROR - No se pudo acceder a la tabla usuarios: " . $e->getMessage();
        }
        return $resultado;
    }

    public static function getSubastasCompletasPujadasNoVistas($codUsuario)
    {
        $connection = self::getConnection();

        try {
            $sql = $connection->prepare("SELECT DISTINCT pu.codPujador, p.codProductoSubastado, p.nombre, p.estado, p.fechaFin 
            FROM productosubastado p, puja pu WHERE p.codProductoSubastado = pu.codProductoSubastado AND p.estado = 'finalizadaNVisto' AND pu.codPujador=" . $codUsuario);
            $sql->execute();

            $resultSet = $sql->get_result();
            $resultado = $resultSet->fetch_all();

        } catch (PDOException $e) {
            echo "ERROR - No se pudo acceder a la tabla usuarios: " . $e->getMessage();
        }
        return $resultado;
    }


    /**
     * =============================================================================================================
     * ||||||||||||||||||||||||||||||||||||||||||||||||||| PUJAS |||||||||||||||||||||||||||||||||||||||||||||||||||
     * =============================================================================================================
     */

    public static function insertarPuja($codProductoSubastado, $codPujador, $cantidad, $fecha)
    {
        $connection = self::getConnection();

        $sql = "INSERT INTO puja(codProductoSubastado, codPujador, cantidad, fecha)";

        $sql .= "VALUES (" . $codProductoSubastado . "," . $codPujador . ", " . $cantidad . ", '" . $fecha . "')";
        if ($result = $connection->query($sql)) {
            return $connection->insert_id;
        } else {
            return $sql;
        }
    }

    public static function getPujasHechas($codPujador)
    {
        $connection = self::getConnection();
        $sql = "SELECT * FROM puja WHERE CodPujador = " . $codPujador;
        $result = $connection->query($sql);
        $pujas = [];
        if ($result) {
            while ($row = $result->fetch_array()) {
                $pujas[] = new Puja($row);
            }
        }
        return $pujas;
    }

    public static function getPujas($codProductoSubastado)
    {
        $connection = self::getConnection();
        $sql = "SELECT * FROM puja WHERE codProductoSubastado = " . $codProductoSubastado;
        $result = $connection->query($sql);
        $pujas = [];
        if ($result) {
            while ($row = $result->fetch_array()) {
                $pujas[] = new Puja($row);
            }
        }
        return $pujas;
    }

    public static function deletePujas($codSubasta)
    {
        $connection = self::getConnection();
        $select = "SELECT * FROM puja WHERE codProductoSubastado = " . $codSubasta . " ORDER BY cantidad DESC";
        $pujas = $connection->query($select);
        $lista = [];
        while ($row = $pujas->fetch_array()) {
            $lista[] = new Puja($row);
        }
        $delete = "DELETE FROM puja WHERE codProductoSubastado = " . $codSubasta;
        if ($result = $connection->query($delete)) {
            return $lista;
        }
        return $lista;
    }

    public static function getPujaMasAlta($codSubasta)
    {
        $conn = self::getConnection();
        $sql = "SELECT * FROM puja WHERE cantidad IN (SELECT MAX(cantidad) FROM puja WHERE codProductoSubastado = " . $codSubasta . ")";
        $result = $conn->query($sql);
        $puja = null;
        if ($result) {
            if ($row = $result->fetch_array()) {
                $puja = new Puja($row);
            }
        }
        return $puja;
    }



    /**
     * =============================================================================================================
     * ||||||||||||||||||||||||||||||||||||||||||||||||| CATEGORÍA |||||||||||||||||||||||||||||||||||||||||||||||||
     * =============================================================================================================
     */

    public static function getCategorias()
    {
        $connection = self::getConnection();
        $sql = "SELECT * FROM categoria";
        $result = $connection->query($sql);
        $categorias = [];
        if ($result) {
            while ($row = $result->fetch_array()) {
                $categorias[] = new Categoria($row);
            }
        }
        return $categorias;
    }

    public static function getCategoriasCodigo($codCategoria)
    {
        $connection = self::getConnection();
        $sql = "SELECT * FROM categoria WHERE codCategoria = " . $codCategoria;
        $result = $connection->query($sql);
        $categoria = null;
        if ($row = $result->fetch_array()) {
            $categoria = new Categoria($row);
            return $categoria;
        }
        return "FALLO Obteniendo ProductoSubastado";
    }
}

?>