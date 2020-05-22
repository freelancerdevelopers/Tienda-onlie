<?php if (isset($SelecProduct)): ?>
   <div class="col-md-12">
    <h1>Detalle del producto -> <?= $SelecProduct->nombre_producto ?></h1>
    <div class="row">
        <div class="col-md-6">
            <img class="img-fluid" src="<?=base_url?>/uploads/images/<?= $SelecProduct->imagen_producto; ?>" alt="" title="">
        </div>
        <div class="col-md-6">
            <p>Descripción: <?= $SelecProduct->descripcion_producto; ?></p>
            <p><b>Precio: $ <?= $SelecProduct->precio_producto; ?> MN</b></p>
            <p style="color: red;">Oferta: <?= $SelecProduct->oferta_producto; ?> %</p>
            <p>Stock: <?= $SelecProduct->stock_producto; ?></p>
            <p><a href="<?=base_url?>carrito/add&id_producto=<?=$SelecProduct->id_producto?>" type="button" class="btn btn-primary btn-comprar">Comprar</a></p>
        </div>
    </div>
   </div>    
<?php else: ?>
    <div class="col-md-12">
    <div class="row">
        <h1>El producto seleccionado no existe</h1>
    </div>
   </div>  
<?php endif; ?>
