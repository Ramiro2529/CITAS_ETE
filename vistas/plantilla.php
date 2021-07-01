<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda de citas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link rel="icon" href="../img//logoETE_c.png">

   
<style>
#banner{
    width: 100%;
    height:200px;
   
}

#imagen{
    display: block;
    margin: auto;
    width: 100%;

    max-width: 1200px;
    min-width: 200px;
}

#imagenP{
    display: block;
    margin: auto;
    width: 100%;

}

#boton{
    position: absolute;
  top: 80%;
  left: 60%;
  transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  padding: 5px 12px;
  border: none;
  cursor: pointer;
  border-radius: 5px;
  text-align: center;

  font-size: 10px;
}

   
</style>
</head>
<body class="animate__animated animate__fadeInDown">


<div id="banner">
<img id="imagen" src="../img/BannerCabezaPortalCitasETE.png" alt="">
</div>

<?php
include("../Modelos/conexionM.php");
require_once "../Controladores/plantillaControlador.php";
require_once "../Controladores/formularioControlador.php";
require_once "../Modelos/formularioModelo.php";

if(isset($_POST['pdf'])){
    
    header('Location:pdf.php');
  }

?>
    
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7">

                <div class="card mt-5">
                    <div class="card-header text-center">
                        <h4>Agenda de citas</h4>
                    </div>
                    <div class="card-body">

                        <form action="" method="POST">
                            <div class="row">
                                <div class="col-md-8">
                                
                                                <div class="input-group mb-3">                                                    
                                                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                                                    <input type="text" placeholder="Número de cuenta" name="numero_cuenta" value="<?php if(isset($_POST['numero_cuenta'])){echo $_POST['numero_cuenta'];} ?>" class="form-control">
                                                </div>

                                   
                                </div>
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-warning">Busca tus datos</button>
                                </div>
                            </div>
                      

                        <div class="row">
                            <div class="col-md-12">
                                <hr>
                                <?php 
                                     
                                   

                                    if(isset($_POST['numero_cuenta']))
                                    {
                                        $stud_id = $_POST['numero_cuenta'];

                                        $query = "SELECT * FROM alumnos WHERE numero_cuenta='$stud_id' ";
                                        $query_run = mysqli_query($con, $query);

                                        


                                        if(mysqli_num_rows($query_run) > 0)
                                        {
                                            foreach($query_run as $row)
                                            {
                                                ?>

                                                <label for="">Nombre: </label>
                                                <div class="input-group mb-3">                                                    
                                                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                                                    <input type="text" name="nombreR" readonly value="<?= $row['nombre_alumno']; ?>" class="form-control">
                                                </div>

                                                <label for="">Apellido paterno: </label>
                                                <div class="input-group mb-3">                                                    
                                                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                                                    <input type="text" readonly name="apellidoPRegistro" value="<?= $row['apellido_paterno_alumno']; ?>" class="form-control">
                                                </div>

                                                <label for="">Apellido materno: </label>
                                                <div class="input-group mb-3">                                                    
                                                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                                                    <input type="text" readonly name="apellidoMRegistro" value="<?= $row['apellido_materno_alumno']; ?>" class="form-control">
                                                </div>

                                                <label for="">ETE: </label>
                                                <div class="input-group mb-3">                                                   
                                                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-file"></i></span>
                                                    <input type="text" readonly name="eteRegistro" value="<?= $row['ete']; ?>" class="form-control">
                                                </div>

                                                <label for="">Tramite: </label>
                                                     <div class="input-group mb-3">

                                                     <span class="input-group-text" id="basic-addon1"><i class="fas fa-file"></i></span>
                                                     
                                                      <input type="text" name="tramiteRegistro" class="form-control" >
                                                     </div>
                                                <label for="">Fecha cita: </label>
                                                     <div class="input-group mb-3">
                                                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-table"></i></span>
                                                      <input type="date" class="form-control"   id="fecha" name="fechaRegistro" min="<?php echo date("Y-m-d"); ?>"  aria-describedby="basic-addon1">
                                                </div>

                                                <label for="">Hora cita: </label>
                                             <div class="input-group mb-3">
                                                 <span class="input-group-text" id="basic-addon1"><i class="far fa-clock"></i></span>
                                                 <select class="form-select" name="horaRegistro"  id="hora">
                                                  <option value="">selecciona la hora de tu cita</option>
                                                </select>
                                             </div>
                                                
                                                    <?php

                                                    if(isset($_POST["agendar"])){
                                                          $registro=ControladorFormularios::ctrRegistro();
                                                          
                                                         if($registro=='ok'){

                                                           echo '<script>
                                                                if(window.history.replaceState){
                                                                window.history.replaceState(null, null, window.location.href);
                                                                        }
                                                             </script>';
                                                           
                                                            echo '<div class="alert alert-success">Tu cita ha sido registrada correctamente, puedes descargar tu comprobante</diV>';
                                                            echo '<form method="POST">';
                                                            echo '<div class"row">';
                                                            echo '<div class="col-lg-6">';
                                                            echo '<button type="submit"  name="pdf" class="btn btn-warning">Comprobante</button></a>';
                                                            echo '</div>';
                                                            echo '<div class="col-lg-6">';
                                                           
                                                            echo '</div>';
                                                            echo '</form>';
                                                            echo '</div>';

                                                         }else if($registro=='error'){
                                                            echo '<div class="alert alert-danger">Error no se permiten cáracteres especiales</diV>';


                                                         }
                                                    }
                                                 
                                                    ?>
                                                <form method="POST">
    
                                                     <button type="submit" class="btn btn-outline-warning" name="agendar">Agendar</button>
    
                                                </form>

                                                <?php
                                            }
                                        }
                                        else
                                        {
                                            echo "Número de cuenta no encontrado, favor de escribirnos al correo <b>ete.controlescolar@enp.unam.mx</b> o <b>ete.gestionegreso@enp.unam.mx</b>
                                            ";
                                        }
                                    }
                                   
                                ?>

                            </div>
                        </div>
                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../JS/agenda.js"></script>
    <script src="../JS//jquery.min.js"></script>
    <script src="../JS//moment.min.js"></script>
</body>
</html>