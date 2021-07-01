<?php
    
    if(isset($_POST['agendarFormulario'])){
    
      header('Location:vistas/plantilla.php');
    }
        
        ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal de citas ETE</title>
    <link rel="icon" href="./img/logoETE_c.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="icon" href="./img//logoETE_c.png">
</head>

<style>


.parrafo{
  text-align: justify;
}

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
<body class="animate__animated animate__fadeInDown">



<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Aviso de privacidad</h5>
        
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
    
      <p class="parrafo">En cumplimiento con lo establecido por el Reglamento de Transparencia, Acceso a la
Información Pública y Protección de Datos Personales para la Universidad Nacional
Autónoma de México, La Direccion General de Escuela Nacional Preparatoria, recabará los siguientes datos personales: Número de cuenta y Nombre completo, mismos que serán utilizados única y exclusivamente 
para el registro de citas para tramites correspondientes a los 
Estudios Técnicos Especializados. Asimismo, la DGENP garantiza que sus datos no serán transferidos o tratados por
personas distintas a la UNAM. </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal">Cerrar</button>
    
      </div>
    </div>
  </div>
</div>



<div id="banner">
<img id="imagen" src="./img/BannerCabezaPortalCitasETE.png" alt="">
</div>


<div class="row">
    <div class="col-lg-4"></div>
    <div class="col-lg-4 ">

    

    <div class="info text-center">
    <img src="./img/Texto_Portal_Citas_ok.png" id="imagenP" alt="">
    <form method="POST">

<button name="agendarFormulario" id="boton" class="btn btn-warning">Agendar cita</button>

</form>

    </div>
   
    </div>
    <div class="col-lg-4"></div>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <script>
   
    $(window).on('load', function() {
        $('#exampleModal').modal('show');
    });

    </script>
    <script src="../JS/jquery.min.js"></script>
    <script src="../JS/moment.min.js"></script>
</body>
</html>