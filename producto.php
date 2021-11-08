<?php
session_start();
require 'funciones.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos-Rios Gaming</title>
    <link rel="stylesheet" href="estilo-header.css">
    <!-- <link rel="stylesheet" href="estilo-main.css"> -->
    <link rel="stylesheet" href="estilo-footer.css">
    <!-- <link rel="stylesheet" href="estilos/main-productos.css"> -->
    <script src="https://kit.fontawesome.com/71a4b48035.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="estilos/main-producto.css">
    
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/estilos.css">
</head>
<body>
    <header class="header-1">
        <div class="contenedor-menu-1">
            <div class="contenedor-logo-imagen">
              <a href="index.php">
                <img src="imagenes/logo11.png" alt="logo de la página"><i class="bi bi-caret-up-square-fill"></i>
              </a>
            </div>
            <div class="contenedor-buscador-input">
                <input type="text" placeholder="Buscar producto">
                <button class="icon-buscador">
                    <i class="fas fa-search"></i>
                </button>
            </div>
            <nav>
                <ul>
                    <li class="item-menu"><a href="" class="item-link">
                      <a href="carrito.php" class="btn">CARRITO <span class="badge">
                        <?php print cantidadProductos(); ?>
                      </span> </a>
                    </a></li>
                    <li class="item-menu"><a href="" class="item-link">
                      <a href="panel/index.php" class="btn">lOGIN
                      <span class="glyphicon glyphicon-user"></span></a> 
                    </a></li>
                </ul>
            </nav>
        </div>
    </header>
    <main>
        <?php
        if($_GET!=null){
            $id_r=$_GET['id'];
            $servername='localhost';
            $username="root";
            $password='';
            $database='tienda_online';
            $query="SELECT * FROM productos WHERE id = ".$id_r."";
            #crear conexion
            $conn= new mysqli($servername,$username,$password,$database);
            #Verificar conexion
            if ($conn->connect_error) {
                # die - ejecuta esta ultima linea y finaliza la ejecucion del archivo   
                die('conction Failed : '.$conn->connect_error);
            }

            $sql=$query;
            $datosretunr =$conn->query($sql);
            $conn->close();
            $row=$datosretunr->fetch_assoc();
            // print_r($row);
            $type=["id","titulo","descripcion","foto","precio","categoria_id","fecha","estado"];
            $listaproc=[];
            for ($i=0; $i < count($type); $i++) { 
                $listaproc[]=$row[$type[$i]];
            }
            // print_r($listaproc);
            
        }
        
        ?>
        <div class="contenedor-producto">
            <div class="contenedor-imagen">
                <?php
                $foto = 'upload/'.$listaproc[3];
                ?>
                <img src="<?php print $foto; ?>">
            </div>
            <div class="contenedor-informacion">
                <p class="titulo producto"><?php print($listaproc[1])?></p>
                <p class="descripcion producto"><?php print($listaproc[2])?></p>
                <p class="codigo producto">Código: <?php print($listaproc[0])?></p>
                <p class="precio producto">Precio: S/. <?php print($listaproc[4])?></p>
                <p>Cantidad:</p>
                <div class="contenedor-botones-cantidad">
                    
                    <button>-</button>
                    <button>1</button>
                    <button>+</button>
                </div>
                <a href="carrito.php?id=<?php print($listaproc[0]) ?>" >
                <button class="bottom-carrito producto">Agregar al carrito</button>
                </a>
                </div>
        </div>
        <div class="contenedor-tabla">
            <p>Ficha Técnica</p>
            <table>
                <thead>
                    <tr>
                        <th>Atributo</th>
                        <th>Detalle</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Precio</td>
                        <td>S/. 1200</td>
                    </tr>
                    <tr>
                        <td>Precio</td>
                        <td>S/. 1200</td>
                    </tr>
                    <tr>
                        <td>Precio</td>
                        <td>S/. 1200</td>
                    </tr>
                    <tr>
                        <td>Precio</td>
                        <td>S/. 1200</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </main>
    <footer class="footer">
        <div class="contenedor-seccion">
            <p>Enterate primero de todas nuestras ofertas</p>
            <div class="input-footer-seccion-1">
                <input type="text" placeholder="Correo electrónico">
                <button><i class="fas fa-angle-double-right"></i></button>
            </div>
            <div class="contenedor-redes-sociales-footer">
                <a href=""></a>
                <a href=""></a>
                <a href=""></a>
                <a href=""></a>
                <a href=""></a>
            </div>
        </div>
        <div class="contenedor-seccion">
            <p>Información para el cliente</p>
            <div>
                <ul>
                    <li><a href="">Contáctenos</a></li>
                    <li><a href="">Nuestras tiendas</a></li>
                    <li><a href="">Libro de reclamaciones</a></li>
                    <li><a href="">Cambio y devoluciones</a></li>
                </ul>
            </div>
        </div>
        <div class="contenedor-seccion">
            <p>Gestión de cuenta</p>
            <div>
                <ul>
                    <li><a href="">Mi cuenta</a></li>
                    <li><a href="">Registrate</a></li>
                    <li><a href="">Actualizar datos</a></li>
                    <li><a href="">Cambiar contraseña</a></li>
                </ul>
            </div>
        </div>
        <div class="contenedor-seccion">
            <p>Medios de pago</p>
            <div class="medios-pago">

            </div>
            
        </div>
        
    </footer>
    <div class="contenedor-banner-footer">
        <div class="contenedor-footer-img">
            <img src="imagenes/footer-logo.png" alt="">
        </div>
    </div>
</body>
</html>