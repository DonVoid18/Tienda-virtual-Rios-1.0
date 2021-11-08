<?php


include('conexion.php');
if($_GET!=null){
    $datos=$_GET;
    print_r($datos);
    print('<br>');
    $r_tablaname=$datos['tablaname'];

    $database='proyecto_pc';
    $query="describe ".$r_tablaname;
    $conexion = new Conexion($database,$query);
    $estructuraTabla=$conexion->EstablecerConexion_r($database,$query);
    
    while ($row=$estructuraTabla->fetch_assoc()) {
        $listaName[]=$row['Field'];
    }
    print('
    <br>
    <br>
    ');
    $query_datos='';
    $query_types='';
    for ($i=0; $i <count($listaName) ; $i++) { 
        print($datos[$listaName[$i]].'<br>');
        print($listaName[$i].'<br>');
        $query_datos=$query_datos."'".$datos[$listaName[$i]]."',";
        $query_types=$query_types."`".$listaName[$i]."`,";
    }

    $query_datos=substr($query_datos,0,-1);
    print($query_datos.'<br>');
    $query_types=substr($query_types,0,-1);
    print($query_types).'<br>';

    $query="INSERT INTO `".$r_tablaname."` (".$query_types.") VALUES (".$query_datos.");";
    $conexion = new Conexion($database,$query);
    $estructuraTabla=$conexion->EstablecerConexion_g($database,$query);
    print('query ejecutado con exito : <br>');
    print($query);
}else{
    print('
    <center>
    Aun no se ejecutan Querys
    </center>
    <br>');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel-SQl</title>
</head>
<body>
    <section>
        <?php
            $database='proyecto_pc';
            $query="SELECT COUNT(*) from Information_Schema.Tables where TABLE_TYPE = 'BASE TABLE' and table_schema = 'proyecto_pc'";
            $conexion = new Conexion($database,$query);
            $cantidadTablas=$conexion->EstablecerConexion_r($database,$query);
            $row=$cantidadTablas->fetch_assoc();
            $cantidadTablas=$row['COUNT(*)'];
            
            $query="SHOW FULL TABLES FROM proyecto_pc";
            $conexion = new Conexion($database,$query);
            $listaTablas=$conexion->EstablecerConexion_r($database,$query);
            while ($row=$listaTablas->fetch_assoc()) {
                $lista[]=$row['Tables_in_proyecto_pc'];
            }
            
            print('
            <center><b>
                LISTA DE TABLAS DE TIENDA RIOS
            </b></center>
            ');
            
            for ($i=0; $i < $cantidadTablas; $i++) { 
                print('
                <div>
                    <center>
                        <a href="Tabla.php?tabla='.$lista[$i].'"> - '.$lista[$i].'</a>
                    </center>
                </div>            
                ');
            }
        ?>

    </section>
</body>
</html>