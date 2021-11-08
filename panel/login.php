<?php

use Kawschool\Usuario;

if($_SERVER['REQUEST_METHOD'] ==='POST'){

     $nombre_usuario = $_POST['nombre_usuario'];
     $clave = $_POST['clave'];
     require '../vendor/autoload.php';
     $usuario = new TiendaRios\Usuario;
     $resultado = $usuario-> login($nombre_usuario,$clave);//parametos a pasar nombre usuario y clave

     if($resultado){
        print 'todo ok bro';
        //llamar al archivo dashboard si los datos estan correctos 
        session_start();
        $_SESSION['usuario_info'] = array(
           'nombre_usuario' => $resultado['nombre_usuario'],
           'clave' => $resultado['clave'],
           'estado' => 1
        );
        header("location: dashboard.php");
  
     }else{
         exit(json_encode(array('estado'=>false,'mensaje'=>'error al iniciar secion')));
     }






}
