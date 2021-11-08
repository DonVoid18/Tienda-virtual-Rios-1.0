<?php
//ACTIVAR LAS SESSIONES EN PHP
session_start();
require 'funciones.php';

if(isset($_GET['id']) && is_numeric($_GET['id'])){
    $id = $_GET['id'];
    require 'vendor/autoload.php';
    $producto = new  TiendaRios\Producto;
    $resultado = $producto->mostrarPorId($id);
    
    if(!$resultado)
       header('Location: index.php');

       

    if(isset($_SESSION['carrito'])){ //SI EL CARRITO EXISTE
        //SI EL  EXISTE EN EL CARRITO
        if(array_key_exists($id,$_SESSION['carrito'])){
            actualizarProducto($id);
        }else{
            //  SI EL CARRITO NO EXISTE EN EL CARRITO
            agregarProducto($resultado, $id);
        }

    }else{
        //  SI EL CARRITO NO EXISTE
        agregarProducto($resultado, $id);

    }

   

}  



?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Carrito-Rios Gaming</title>
    <link rel="stylesheet" href="estilo-header.css">
    <link rel="stylesheet" href="estilo-main.css">
    <link rel="stylesheet" href="estilo-footer.css">
    <link rel="stylesheet" href="estilos/slider-estilo.css">
    <script src="https://kit.fontawesome.com/71a4b48035.js" crossorigin="anonymous"></script>

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

    <div class="container" id="main">
            <table class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Producto</th>
                      <th>Foto</th>
                      <th>Precio</th>
                      <th>Cantidad</th>
                      <th>Total</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php
                        if(isset($_SESSION['carrito']) && !empty($_SESSION['carrito'])){
                            $c=0;
                            foreach($_SESSION['carrito'] as $indice => $value){
                                $c++;
                                $total = $value['precio'] * $value['cantidad'];
                      ?>
                        <tr>
                            <form action="actualizar_carrito.php" method="post">
                                <td><?php print $c ?></td>
                                <td><?php print $value['titulo']  ?></td>
                                <td>
                                    <?php
                                        $foto = 'upload/'.$value['foto'];
                                        if(file_exists($foto)){
                                        ?>
                                        <img src="<?php print $foto; ?>" width="35">
                                    <?php }else{?>
                                        <img src="assets/imagenes/not-found.jpg" width="35">
                                    <?php }?>
                                </td>
                                <td><?php print $value['precio']  ?> PEN</td>
                                <td>
                                <input type="hidden" name="id"  value="<?php print $value['id'] ?>">
                                    <input type="text" name="cantidad" class="form-control u-size-100" value="<?php print $value['cantidad'] ?>">
                                </td>
                                <td>
                                    <?php print $total  ?> PEN
                                </td>
                                <td>
                                    <button type="submit" class="btn btn-success btn-xs">
                                        <span class="glyphicon glyphicon-refresh"></span> 
                                    </button>

                                    <a href="eliminar_carrito.php?id=<?php print $value['id']  ?>" class="btn btn-danger btn-xs">
                                        <span class="glyphicon glyphicon-trash"></span> 
                                    </a>


                                </td>
                            </form>
                        </tr>

                    <?php
                        }
                        }else{
                    ?>
                        <tr>
                            <td colspan="7">NO HAY PRODUCTOS EN EL CARRITO</td>

                        </tr>
                    <?php
                        }
                    ?>
                </tbody>
                <tfoot>
                        <tr>
                            <td colspan="5" class="text-right">Total</td>
                            <td><?php print calcularTotal(); ?> PEN</td>
                            <td></td>
                        </tr>

                </tfoot>
            </table>
            <hr>
            <?php
                if(isset($_SESSION['carrito']) && !empty($_SESSION['carrito'])){
            ?>  
            <div class="row">
                    <div class="pull-left">
                        <a href="index.php" class="btn btn-info">Seguir Comprando</a>
                    </div>
                    <div class="pull-right">
                        <a href="finalizar.php" class="btn btn-success">Finalizar Compra</a>
                    </div>
            </div>

            <?php
                }
            ?>

    </div> <!-- /container -->
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

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

  </body>
</html>
