<?php if(isset($pedidos) && $pedidos != '') : ?>
<div class="col-md-12">
    <div class="row">
        <h1>Todos los pedidos</h1>
    </div>
    <div>
        <h1>Monto comprado $ <?=$total->total;?></h1>
    </div>
    <div>
        <table class="table table-striped">
        <thead>
          <tr>
            <th>Acciones</th>
            <th>#</th>
            <th>Cliente</th>
            <th>Estado</th>
            <th>Fecha de compra</th>
            <th>Total pagado</th>
            <th>Dirección de envio</th>
            <th>Ciudad</th>
            <th>ZIP</th>
          </tr>
        </thead>
         <tr>
        <?php while ($ped = $pedidos->fetch_Object()): ?>
         <tr>   <td><a href="<?=base_url?>pedido/verpedido&id_pedido=<?=$ped->id_pedido?>" class="btn btn-info btn-sm">Ver detalle</a></td>
                <td><?= $ped->id_pedido; ?></td>
                <td><?= $ped->nombre_usuario; ?></td>
                <td class="badge badge-success"><?=$ped->estado_pedido; ?></td>
                <td><?= $ped->fecha_pedido; ?> / <?=$ped->hora_pedido;?></td>
                <td>$ <?=$ped->costo_pedido;?></td>
                <td><?=$ped->direccion_pedido;?></td>
                <td><?=$ped->ciudad_pedido;?></td>
                <td><?=$ped->zip_pedido;?></td>
            </tr>
        <?php endwhile;?>
         </table> 
    </div>
</div>
    <?php else: ?>
<div class="col-md-12">
    <div class="row">
        <h1>No tienes pedidos completados</h1>
    </div>
</div>
<?php endif;?>

