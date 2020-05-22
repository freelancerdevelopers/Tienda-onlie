<?php if( isset($pedido_detalle) && $pedido_detalle != '') : ?>
<div class="col-md-12">
        <h1>Detalle del pedido  / <?=$_GET['id_pedido']?></h1>
        <div>
        <table class="table table-striped">
        <thead>
          <tr>
            <th>Producto</th>
            <th>Descripción</th>
            <th>Precio</th>
            <th>Unidades</th>
            <th>Imagen</th>
          </tr>
        </thead>
         <tr>
        <?php while ($ped = $pedido_detalle->fetch_Object()): ?>
         <tr>   
                <td><?=$ped->nombre_producto; ?></td>
                <td><?=$ped->descripcion_producto; ?></td>
                <td>$ <?=$ped->precio_producto; ?></td>
                <td><?=$ped->unidades_rel_ped_pro;?></td>
                <td><img src="<?=base_url?>uploads/images/<?=$ped->imagen_producto;?>" class="img-fluid img-carrito" alt="" title=""></td>
            </tr>
        <?php endwhile;?>
         </table> 
        </div>        
</div>
    <?php else :?>
<div class="col-md-12">
    <h1>Este pedido no tiene productos o fue cancelado.</h1>
</div>
<?php endif; ?>

