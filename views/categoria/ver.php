<?php if(isset($categoria)) : ?>
<div class="col-md-12">
    <h1><?= $categoria->nombre_categoria; ?></h1>
    <?php if($productos->num_rows == 0): ?>
    <p>No hay productos en esta categoria.</p>
    <?php else: ?>
      <?php while ($pro = $productos->fetch_object()) : ?>
           <a  href="<?=base_url?>producto/detalleProducto&id_producto=<?=$pro->id_producto?>">
            <div class="col-md-2 div-shadow">
                <div class="ofert"><?= $pro->oferta_producto; ?> % Oferta!</div>
                <img class="img-fluid categori-index" src="<?=base_url?>uploads/images/<?= $pro->imagen_producto; ?>" alt="" title=""> 
                <hr/>
                <div>
                    <p><?= $pro->nombre_producto; ?></p>
                    <p><small><?= $pro->descripcion_producto; ?></small></p>
                    <p>$ <?= $pro->precio_producto; ?> MN</p>
                    <p><a  href="<?=base_url?>carrito/add&id_producto=<?=$pro->id_producto?>" class="btn btn-primary btn-comprar">Comprar</a></p>
                </div>
            </div>
           </a>    
          <?php endwhile; ?>
    <?php endif; ?>
    <div class="row"></div>
</div>
<?php else: ?>
<div class="col-md-12">
    <h1>No existe la categoria</h1>
    <div class="row"></div>
</div>
<?php endif; ?>
<hr/>



