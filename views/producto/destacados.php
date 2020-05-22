<?php $categorias =  Utils::showCategorias(); ?>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navb">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navb">
        <ul class="navbar-nav mr-auto">
          <?php while ($cat = $categorias->fetch_object()) : ?>
            <li class="nav-item">
                <a class="nav-link" href="<?=base_url?>categoria/ver&id_categoria=<?=$cat->id_categoria?>"><?= $cat->nombre_categoria; ?></a>
            </li>
          <?php endwhile; ?>
        </ul>
      </div>
    </nav>

<div class="col-md-12">
    <div class="row">
        <image class="img-fluid categori-index" src="<?=base_url?>img/home-main.jpg" alt="tienda-online" title="tienda-onlina">
    </div>
</div>
    
<div class="col-md-12">
    <div class="row">
        <div class="col-md-4">
            <img class="img-fluid categori-index" src="<?=base_url?>img/home-woman.png" alt="pantalones-mujer" title="pantalones-mujer"> 
        </div>
        <div class="col-md-4">
            <img class="img-fluid categori-index" src="<?=base_url?>img/home-woman.png" alt="pantalones-mujer" title="pantalones-mujer"> 
        </div>
        <div class="col-md-4">
            <img class="img-fluid categori-index" src="<?=base_url?>img/home-woman.png" alt="pantalones-mujer" title="pantalones-mujer"> 
        </div>
        <div class="col-md-6">
            <img class="img-fluid categori-index" src="<?=base_url?>img/home-traking.png" alt="ropa-traking" title="ropa-traking"> 
        </div>
        <div class="col-md-6">
            <img class="img-fluid categori-index" src="<?=base_url?>img/home-traking.png" alt="ropa-traking" title="ropa-traking"> 
        </div>
    </div>
</div>

<div class="col-md-12">
    <h1>Productos Destacados</h1>
        <div class="row">
            <div class="col-md-2 div-shadow">
                <div class="ofert">Oferta -50%</div>
                <img class="img-fluid categori-index" src="<?=base_url?>img/producto.jpg" alt="ropa-traking" title="ropa-traking"> 
                <hr/>
                <div>
                    <p>Playera Premium</p>
                    <p>$ 100.00 MX</p>
                    <p><button type="button" class="btn btn-primary btn-comprar">Comprar</button></p>
                </div>
            </div>
            <div class="col-md-2 div-shadow">
                <img class="img-fluid categori-index" src="<?=base_url?>img/producto.jpg" alt="ropa-traking" title="ropa-traking"> 
                <hr/>
                <div>
                    <p>Playera Premium</p>
                    <p>$ 100.00 MX</p>
                    <p><button type="button" class="btn btn-primary btn-comprar">Comprar</button></p>
                </div>
            </div>
            <div class="col-md-2 div-shadow">
                <img class="img-fluid categori-index" src="<?=base_url?>img/producto.jpg" alt="ropa-traking" title="ropa-traking"> 
                <hr/>
                <div>
                    <p>Playera Premium</p>
                    <p>$ 100.00 MX</p>
                    <p><button type="button" class="btn btn-primary btn-comprar">Comprar</button></p>
                </div>
            </div>
            <div class="col-md-2 div-shadow">
                <img class="img-fluid categori-index" src="<?=base_url?>img/producto.jpg" alt="ropa-traking" title="ropa-traking"> 
                <hr/>
                <div>
                    <p>Playera Premium</p>
                    <p>$ 100.00 MX</p>
                    <p><button type="button" class="btn btn-primary btn-comprar">Comprar</button></p>
                </div>
            </div>
            <div class="col-md-2 div-shadow">
                <img class="img-fluid categori-index" src="<?=base_url?>img/producto.jpg" alt="ropa-traking" title="ropa-traking"> 
                <hr/>
                <div>
                    <p>Playera Premium</p>
                    <p>$ 100.00 MX</p>
                    <p><button type="button" class="btn btn-primary btn-comprar">Comprar</button></p>
                </div>
            </div>
            <div class="col-md-2 div-shadow">
                <img class="img-fluid categori-index" src="<?=base_url?>img/producto.jpg" alt="ropa-traking" title="ropa-traking"> 
                <hr/>
                <div>
                    <p>Playera Premium</p>
                    <p>$ 100.00 MX</p>
                    <p><button type="button" class="btn btn-primary btn-comprar">Comprar</button></p>
                </div>
            </div>
        </div>
    </div>