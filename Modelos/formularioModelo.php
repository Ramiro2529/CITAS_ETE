<?php
require_once "conexion.php";

class ModeloFormularios{

static public function mdlRegistro($tabla,$datos){

    $stmt=Conexion::conectar()->prepare("INSERT INTO $tabla(numero_cuenta, nombre_alumno, apellido_paterno_alumno, apellido_materno_alumno, ete, tramite, fecha_cita, hora_cita)
    VALUES (:numero_cuenta, :nombre_alumno, :apellido_paterno_alumno, :apellido_materno_alumno, :ete, :tramite, :fecha_cita, :hora_cita)");

    $stmt->bindParam(':numero_cuenta',$datos['numero_cuenta'],PDO::PARAM_INT);
    $stmt->bindParam(':nombre_alumno',$datos['nombre_alumno'],PDO::PARAM_STR);
    $stmt->bindParam(':apellido_paterno_alumno',$datos['apellido_paterno_alumno'],PDO::PARAM_STR);
    $stmt->bindParam(':apellido_materno_alumno',$datos['apellido_materno_alumno'],PDO::PARAM_STR);
    $stmt->bindParam(':ete',$datos['ete'],PDO::PARAM_STR);
    $stmt->bindParam(':tramite',$datos['tramite'],PDO::PARAM_STR);
    $stmt->bindParam(':fecha_cita',$datos['fecha_cita'],PDO::PARAM_STR);
    $stmt->bindParam(':hora_cita',$datos['hora_cita'],PDO::PARAM_STR);

    if($stmt->execute()){
        return 'ok';
    }else{
        print_r(Conexion::conectar()->errorInfo());
    }




}

static public function mdlSeleccionarRegistros($tabla){

    $stmt=Conexion::conectar()->prepare("SELECT * from $tabla order by id desc
   limit 1");
    $stmt->execute();

    return $stmt->fetchAll();


}

}

?>