<?php
require_once("../clases/dbmanager.php");

// Recuperamos la información de la sesión
session_start();

//traemos las familias
$categorias = DbManager::getCategorias();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="icon" href="../logo/logoSubastas.png">
    <link rel="stylesheet" href="../css/estilo.css">
    <script src="https://kit.fontawesome.com/096ad391b4.js" crossorigin="anonymous"></script>
    <title>Subastas Sostenibles</title>
</head>
<body>


<div class="container col-sm-12 col-md-6">
    <div class="card">
        <div class="card-header">Crear Producto Subastado</div>
        <form action="subirSubasta.php" method="post" id="form" class="card-body" enctype="multipart/form-data">

            <div class="form-group">
                <label for="nProducto">Nombre de Producto</label>
                <input type="text" class="form-control form-control-lg" name="nProducto" id="nProducto"
                       placeholder="nombre producto"
                       required>
            </div>
            <div class="form-group">
                <label for="descripcion">Descripcion del Producto</label>
                <textarea class="form-control form-control-lg" name="descripcion" id="descripcion"
                          placeholder="descripción..." rows="5" style="height:100%;"></textarea>
            </div>
            <div class="form-group">
                <p class="mt-2">Categoría</p>
                <select name="categorias" id="categorias" class="form-control">
                    <?php
                    foreach ($categorias as $cat) {
                        ?>
                        <option value="<?php echo $cat->getCodCategoria(); ?>"> <?php echo $cat->getCodCategoria() . " - " . $cat->getNombre(); ?> </option>
                        <?php
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="fechaI">Fecha Inicio</label>
                <input type="date" class="form-control form-control-lg" name="fechaI" id="fechaI"
                       placeholder="fecha inicio" onblur="myFunction()"
                       required>
            </div>
            <div class="form-group">
                <label for="fechaF">Fecha fin</label>
                <input type="date" class="form-control form-control-lg" id="fechaF" name="fechaF"
                       required>
            </div>
            <div class="form-group">
                <label for="precioInicial">Precio Inicial</label>
                <div class="row ml-1">
                    <div>
                        <input type="number" class="form-control form-control-lg" name="precioInicial" id="precioInicial"
                               placeholder="0,00€" value="00,00" min="0"
                               step=".01"
                               required>
                    </div>
                    <div class='input-group-text btn btn-outline-secondary' id='vista' >€</div>
                </div>
            </div>
            <div class="form-group">
                <p class="mt-4">Porcentaje que quiere invertir en el ODS</p>
                <select name="cantidad" id="cantidad" class="form-control form-select form-select-lg mb-3"
                        aria-label="Default select example">
                    <option value="" style="display:none">Seleccione</option>
                    <option value="0.01">1%</option>
                    <option value="0.03">3%</option>
                    <option value="0.05">5%</option>
                </select>

            </div>
            <div class="form-group">
                <label for="imagen">Suba imagen del producto</label>
                <input type="file" name="imagen" class="form-control form-control-lg" accept="image/*">
            </div>
            <div class="text-center mt-2 mb-3">
                <button type="submit" class="btn btn-primary btn-lg">Subir Producto</button>
            </div>
            <div class="text-left">
                <button type="button" class="btn btn-danger text-right"
                        onclick="javascript:window.location='../index.php';">Cancelar
                </button>
            </div>
        </form>
    </div>
</div>
<button type="button" class="btn btn-danger btn-floating btn-lg" id="btn-back-to-top">
    <i class="fas fa-arrow-up"></i>
</button>

<script type='text/javascript'>
    //geeneramos la fecha de hoy para pasarla a fechas

    var fecha = fechaI.max = new Date().toISOString().split("T")[0];
    var fechaMaxima = new Date();
    fechaMaxima.setMonth(fechaMaxima.getMonth() + 1);

    document.getElementById('fechaI').value = fecha;
    document.getElementById('fechaI').min = fecha;
    //ya que si no da error y no deja coger otra fecha
    document.getElementById('fechaI').max = fechaMaxima;
    //fecha final se le adjunta la misma fecha
    document.getElementById('fechaF').value = document.getElementById('fechaI').value;

    //añadimos un evento a fechaI
    document.getElementById('fechaI').addEventListener("foco", myFunction);

    //con esta funcion hacemos que se cambie la fecha minima a 3 dias despues de la fecha de creacion
    function myFunction() {

        var fechaTresDias = new Date(document.getElementById('fechaI').value);
        fechaTresDias.setDate(fechaTresDias.getDate() + 3);

        //hay que extraer la fecha para entrarlo en el input
        document.getElementById('fechaF').value = fechaTresDias.toLocaleDateString('en-CA');
        document.getElementById('fechaF').min = fechaTresDias.toLocaleDateString('en-CA');
    }
</script>
<script type="text/javascript" src="../js/botonSubir.js"></script>
</body>
</html>