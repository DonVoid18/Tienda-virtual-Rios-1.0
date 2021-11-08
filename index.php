<?php
session_start();
require 'funciones.php';

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
    <link rel="stylesheet" href="estilo-header.css">
    <link rel="stylesheet" href="estilo-main.css">
    <link rel="stylesheet" href="estilo-footer.css">
    <link rel="stylesheet" href="estilos/slider-estilo.css">
    <script src="https://kit.fontawesome.com/71a4b48035.js" crossorigin="anonymous"></script>
    
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/estilos.css">
    
</svg>
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
    <header class="header-2">
        <nav>
            <ul>
                <li class="item-menu-2"><a href="productos.php?type=Televisores" class="item-link-2">Televisores</a></li>
                <li class="item-menu-2"><a href="productos.php?type=Celulares" class="item-link-2">Celulares</a></li>
                <li class="item-menu-2"><a href="productos.php?type=Audio" class="item-link-2">Audio y música</a></li>
                <li class="item-menu-2"><a href="productos.php?type=Gaming" class="item-link-2">Gaming</a></li>
                <li class="item-menu-2"><a href="productos.php?type=Equipos" class="item-link-2">Equipos</a></li>
            </ul>
        </nav>
    </header>

    <div class="banner-slider-imagenes">
      <a href="productos.php">
        <img src="imagenes/laptops_4.jpg" alt="">
      </a>
    </div>

    <main>
    <div class="seccion">
            <div class="seccion-titulo-productos">
                <span>
                    Productos Nuevos
                </span>
            </div>
            <div class="contenedor-productos">
    <?php
      require 'vendor/autoload.php';
      $producto = new TiendaRios\Producto;
      $info_productos = $producto->mostrar();
      $cantidad = count($info_productos);
      if($cantidad > 0){
        for($x =0; $x < 6; $x++){
          $item = $info_productos[$x];
    ?>
        
            
                <div class="contenedor-producto">
                    <div class="contenedor-producto-imagen">
                      <?php
                          $foto = 'upload/'.$item['foto'];
                          if(file_exists($foto)){
                        ?>
                          <img src="<?php print $foto; ?>" class="img-responsive">
                      <?php }else{?>
                        <img src="assets/imagenes/not-found.jpg" class="img-responsive">
                      <?php }?>
                    </div>
                    <div class="contenedor-producto-info">
                        <div class="contenedor-producto-titulo">
                            <p><?php print $item['titulo'] ?></p>
                        </div>
                        <div class="contenedor-producto-descripcion">
                            <a href="producto.php?id=<?php print($item['id'])?>"><?php
                            $descripcion=$item['descripcion'];
                            print($descripcion)
                            ?></a>
                        </div>
                        <div class="contenedor-producto-precio">
                            <p>S/. <span class="precio">1234</span></p>
                        </div>
                        <div class="contenedor-producto-botom">
                          <a href="carrito.php?id=<?php print $item['id'] ?>" class="btn btn-success btn-block">
                            <span class="glyphicon glyphicon-shopping-cart"></span> Comprar
                          </a>
                        </div>
                        <div class="contenedor-producto-codigo">
                            <span>Código: 
                              <?php
                              $ID_P=$item['id'];
                              print($ID_P);
                              ?>
                            </span>
                        </div>
                    </div>
                </div>
            
            
        <?php
                }
            }else{?>
              <h4>NO HAY REGISTROS</h4>

          <?php }?>
          </div>
          <div class="seccion-ver-mas">
                <button >
                  <a href="productos.php">Ver más producto </a>
                <span><i class="fas fa-angle-double-right"></i></span></button>
            </div>
        </div>
        <!-- todo el contenido de la página -->

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


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

  </body>
</html>