
<div class="col-md-12">
    <div class="row">
        <h1>Gestionar Productos</h1>
        <hr/>
        <div class="col-controlls">
            <a class="btn btn-success" href="<?=base_url?>producto/crear">
                <span class="fa fa-1x fa-bookmark-o"></span> Agregar un producto</a>
        </div>
        <table class="table table-striped">
        <thead>
          <tr>
            <th>Acciones</th>
            <th>#</th>
            <th>Categoria</th>
            <th>Producto</th>
            <th>Descripción </th>
            <th>Precio</th>
            <th>Stock</th>
            <th>Oferta</th>
            <th>Imagen</th>
          </tr>
        </thead>
        <?php while ($pro = $productos->fetch_Object()): ?>
            <tr>
                <td>
                    <a class="btn btn-danger btn-sm" href="<?=base_url?>producto/eliminar&id_producto=<?=$pro->id_producto?>"><span class="fa fa-1x fa-trash" alt="eliminar" title="eliminar"></span></a> 
                    <a class="btn btn-info btn-sm" href="<?=base_url?>producto/editar&id_producto=<?=$pro->id_producto?>"><span class="fa fa-1x fa-edit" alt="editar" title="editar"></span></a> 
                </td>
                <td><?= $pro->id_producto; ?></td>
                <td><b><?= $pro->nombre_categoria; ?></b></td>
                <td><?= $pro->nombre_producto; ?></td>
                <td><?= $pro->descripcion_producto; ?></td>
                <td>$ <?= $pro->precio_producto; ?></td>
                <td><?= $pro->stock_producto; ?> Pz</td>
                <td><?= $pro->oferta_producto; ?>%</td>
                <td><img class="img-fluid img-product-list" src="<?=base_url?>/uploads/images/<?= $pro->imagen_producto; ?>" alt="" title=""></td>
            </tr>
        <?php endwhile;?>
        </table>   
    </div>
</div>