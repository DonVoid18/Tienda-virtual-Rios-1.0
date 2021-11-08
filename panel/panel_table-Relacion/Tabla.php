<?php

use function PHPSTORM_META\type;

include('conexion.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php
    $nameTabla=$_GET['tabla'];
    print('Tabla '.$nameTabla);
    ?></title>
</head>
<body>
    <section>
        <?php
            print('
            <div>
                <center>
                    TABLA - '.$nameTabla.'
                </center>
            </div>
            ');

            $database='proyecto_pc';
            $query="describe ".$nameTabla;
            $conexion = new Conexion($database,$query);
            $estructuraTabla=$conexion->EstablecerConexion_r($database,$query);
            
            while ($row=$estructuraTabla->fetch_assoc()) {
                $listaName[]=$row['Field'];
                $listaType[]=$row['Type'];
            }

            for ($i=0; $i < count($listaType); $i++) { 
                if(str_contains($listaType[$i],'int') or str_contains($listaType[$i],'double')){
                    $listaType[$i]='number';
                }else if (str_contains($listaType[$i],'varchar')){
                    $listaType[$i]='text';
                }
            }

            print('<form action="panel.php" method="get">');
            print('
            <label for="tablaname">Tabla Actual : </label>
            <input type="text" name="tablaname" id="tablaname" readonly="readonly" value="'.$nameTabla.'">
            <br>
            ');
            for ($i=0; $i < count($listaName) ; $i++) {
                print('
                <label for="'.$listaName[$i].'">'.$listaName[$i].' : </label>
                <input type="'.$listaType[$i].'" name="'.$listaName[$i].'" id="'.$listaName[$i].'">
                <br>');
            }
            $listaName=implode('-',$listaName);
            // print(gettype($listaName).'<br>');
            // print($listaName.'<br>');

            $listaType=implode('-',$listaType);
            // print(gettype($listaType).'<br>');
            // print($listaName.'<br>');

            // print($nameTabla.'<br>');
            
            // print(gettype($nameTabla));

            print('
            <input type="submit" value="Subir">
            ');
            
            print('</form>');
        ?>
    </section>
</body>
</html>

