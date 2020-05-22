<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Freelancer Developers | Tienda Online </title>
    <meta name="description" content="Tienda en linea de codigo abierto"/>
    <meta name="keywords" content="tienda online, ecommerce, ecommerce opensource"/>
    <meta name="author" content="Luis Rogelio Batres Guarneros" />
    <meta name="copyright" content="lBatres" />
    <meta name="owner" content="lBatres" />
    <meta name="robots" content="index,follow">
    <link type="text/css" rel="shortcut icon" href="<?=base_url?>img/Icon_FreelancerDevelopers.png">
    <link type="images/x-icon" rel="icon" href="<?=base_url?>img/Icon_FreelancerDevelopers.png">
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" type="text/css" href="<?=base_url?>font/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url?>bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url?>normalize/normalize-min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?=base_url?>style/style.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url?>style/movil.css">
    <script src="<?=base_url?>jquery/jquery-3.4.1.js"></script>
    <script src="<?=base_url?>modernaizer/modernizr-custom.js"></script>
    <script src="<?=base_url?>bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="col-md-12 dvhead">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <div class="row">
                   <?php if(isset($_SESSION['user'])) :?>
                        <div class="pad-left">
                          <span>Hola: <?= $_SESSION['user']->nombre_usuario ?></span>
                          <a href="<?=base_url?>pedido/misPedidos"  class="btn btn-info btn-sm">Mis Pedidos</a>
                          <?php if(isset($_SESSION['admin'])) :?>
                             <a href="<?=base_url?>categoria/gestion"  class="btn btn-primary btn-sm">Gestionar Categorias</a>
                             <a href="<?=base_url?>producto/gestion"  class="btn btn-warning btn-sm">Gestionar Productos</a>
                             <a href="<?=base_url?>pedido/gestion"  class="btn btn-info btn-sm">Gestionar Pedidos</a>
                          <?php else: ?>
                          <?php endif; ?>
                          <a href="<?=base_url?>usuario/logout"  class="btn btn-danger btn-sm">Cerrar Sessión</a>
                        </div>
                    <?php else: ?>
                        <form id="login-form" class="form-login"  action="<?=base_url?>usuario/login" method="post"> 
                         <div class="input-group input-group-sm mb-1">
                            <div class="input-group-prepend">
                              <span class="input-group-text fa fa-2x fa-windows" id=""></span>
                            </div>
                            <input id="username" name="username" type="text" class="form-control" placeholder="" autofocus="autofocus" required="required">
                            <input id="password" name="password" type="password" class="form-control" placeholder="" required="required">
                            <button type="submit" class="btn btn-success btn-sm">Iniciar sesión</button>
                          </div>
                       </form>
                       <div class="pad-left">
                           <a href="<?=base_url?>usuario/registro" class="btn btn-warning btn-sm">Registrarme</a>    
                       </div> 
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <div class="row dvrow">
        <div class="col dvleft">
            <a href="../"><img class="img-fluid" src="<?=base_url?>img/FreelancerDevelopers.png" alt="Tienda online" title="Freelancer Developers - Tienda Online"></a>
        </div>
        <div class="col dvrigh">
            <?php $num_pro = Utils::statsCarrito(); ?>
            <a href="<?=base_url?>carrito/index" class="btn btn-primary">
                <span class="fa fa-2x fa-shopping-cart"></span> 
                <span class="carpro badge badge-light"><?=$num_pro['count'];?></span>
            </a>
        </div>
    </div>
  
 