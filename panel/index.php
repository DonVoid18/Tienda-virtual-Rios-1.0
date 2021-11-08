<?php
session_start();
require '../funciones.php';
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

    <title>Rios Gaming</title>
    <link rel="stylesheet" href="../estilo-header.css">
    <link rel="stylesheet" href="../estilo-main.css">
    <link rel="stylesheet" href="../estilo-footer.css">
    <link rel="stylesheet" href="../estilos/slider-estilo.css">
    <script src="https://kit.fontawesome.com/71a4b48035.js" crossorigin="anonymous"></script>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/estilos.css">
  </head>

  <body style="background-image: url('https://sites.google.com/site/electrokatherin/_/rsrc/1478717371130/home/wallpaper-995919.jpg');">

  <header class="header-1">
        <div class="contenedor-menu-1">
            <div class="contenedor-logo-imagen">
              <a href="../index.php">
                <img src="../imagenes/logo11.png" alt="logo de la página"><i class="bi bi-caret-up-square-fill"></i>
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
                      <a href="../carrito.php" class="btn">CARRITO <span class="badge">
                        <?php print cantidadProductos(); ?>
                      </span> </a>
                    </a></li>
                    <li class="item-menu"><a href="" class="item-link">
                      <a href="index.php" class="btn">lOGIN
                      <span class="glyphicon glyphicon-user"></span></a> 
                    </a></li>
                </ul>
            </nav>
        </div>
    </header>

    <div class="container" id="main">
        <div class="main-login">
            <form action="login.php" method="post">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="text-center">Inicio de Sesion</h3>
                    </div>
                    <div class="panel-body">
                        <p class="text-center">
                            <img src="#" alt="">
                        </p>
                        <div class="form-group">
                            <label>Usuario</label>
                            <input type="text" class="form-control" name="nombre_usuario" placeholder="Usuario" required>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="clave" placeholder="Password" required>
                        </div>

                        <button type="submit" class="btn btn-primary btn-block">LOGIN</button>
                        <a  href="../index.php">Tiendas rios</a>
                      



                    </div>
                </div>
            </form>
        </div>

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
            <img src="../imagenes/footer-logo.png" alt="">
        </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>

  </body>
</html>