<?php

Class ControladorFormularios{

/**Registro */

static public function ctrRegistro(){

    if(isset($_POST["numero_cuenta"])){


        if(preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚñÑ ]+$/',$_POST["tramiteRegistro"] ) &&
  preg_match('/^[0-9]+$/',$_POST['numero_cuenta'])&&
  preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚñÑ ]+$/',$_POST["nombreR"] )&&
  preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚñÑ ]+$/',$_POST["apellidoPRegistro"] )&&
  preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚñÑ ]+$/',$_POST["apellidoMRegistro"] )){

    $tabla="citas";
   $datos=array("numero_cuenta"=>$_POST["numero_cuenta"],
                "nombre_alumno"=>$_POST["nombreR"],
                "apellido_paterno_alumno"=>$_POST["apellidoPRegistro"],
                "apellido_materno_alumno"=>$_POST["apellidoMRegistro"],
                "ete"=>$_POST["eteRegistro"],
                "tramite"=>$_POST["tramiteRegistro"],
                "fecha_cita"=>$_POST["fechaRegistro"],
                "hora_cita"=>$_POST["horaRegistro"]);

        $respuesta=ModeloFormularios::mdlRegistro($tabla,$datos);

        return $respuesta;

  }else{

    $respuesta="error";
    return $respuesta;
  }

   

        // return $_POST["numero_cuenta"].$_POST["nombreR"].$_POST["apellidoPRegistro"]
        // .$_POST["apellidoMRegistro"].$_POST["eteRegistro"].$_POST["tramiteRegistro"].$_POST["fechaRegistro"].$_POST["horaRegistro"];
    }
}

static public function ctrSeleccionarRegistros(){
    $tabla="citas";
    $respuesta=ModeloFormularios::mdlSeleccionarRegistros($tabla);
  
    return $respuesta;
  
  }
  



}


?>