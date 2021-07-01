<?php



class Conexion{

    static public function conectar(){

        #PDO("nombre del servidor;nombre de base deatos;usuario;contraseña");

        try{
                 $link= new PDO("mysql:host=localhost:3306;dbname=agenda_citas","root","Myezequiel2529");
                 
                 $link->exec("set names utf8");
                 return $link;
        }catch(Exception $error){
            die("El error de la conexion es: ".$error->getMessage());

        }
      
               
     
    }

   
}

?>