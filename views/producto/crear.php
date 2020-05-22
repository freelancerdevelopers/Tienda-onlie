<?php if(isset($edit) && isset($SelecProduct) && is_object($SelecProduct)) : ?>
     <h1>Editar Producto -> <?= $SelecProduct->nombre_producto; ?></h1>
     <?php $url_action = base_url."producto/save&id_producto=".$SelecProduct->id_producto; ?>
<?php else:?>
     <h1>Crear Producto</h1> 
     <?php $url_action = base_url."producto/save"; ?>
<?php endif;?>
<div class="col-md-12">
    <hr/>
    <div class="row">
        <form action="<?=$url_action?>" method="POST" enctype="multipart/form-data">
            <div class="control-group">
              <label class="control-label"  for="name-product">Nombre del producto</label>
              <div class="controls">
                  <input type="text" id="name-product" name="name-product" placeholder="" class="input-xlarge" required="required" autofocus="autofocus" pattern="[A-Z ]+" value="<?= isset($SelecProduct) && isset($SelecProduct) ? $SelecProduct->nombre_producto : ''; ?>">
              </div>
            </div>
            <?php $categorias =  Utils::showCategorias(); ?>
            <p>Categoria producto</p>
            <?php while ($cat = $categorias->fetch_object()) : ?>
                <?php 
                if($SelecProduct->id_categoria == $cat->id_categoria) : ?>
                    <div class="radio">
                      <label><input type="radio" checked="checked" id="cat_product" value="<?= $cat->id_categoria; ?>" name="id_categoria" required="required"> <?= $cat->nombre_categoria; ?></label>
                    </div>
                <?php else : ?>
                    <div class="radio">
                      <label><input type="radio" id="cat_product" value="<?= $cat->id_categoria; ?>" name="id_categoria" required="required"> <?= $cat->nombre_categoria; ?></label>
                    </div>
                <?php endif; ?>
            <?php endwhile; ?>
            <div class="control-group">
                <label for="desc-product">Descripción</label>
                <textarea class="form-control" id="desc-product" name="desc-product" rows="3" required="required"><?= isset($SelecProduct) && isset($SelecProduct) ? $SelecProduct->descripcion_producto : ''; ?></textarea>
            </div>
            <div class="control-group">
              <label class="control-label"  for="cost-product">Precio</label>
              <div class="controls">
                  <input type="number" id="cost-product" name="cost-product" placeholder="" class="input-xlarge" required="required" value="<?= isset($SelecProduct) && isset($SelecProduct) ? $SelecProduct->precio_producto : ''; ?>">
              </div>
            </div>
            <div class="control-group">
              <label class="control-label"  for="stock-product">Stock</label>
              <div class="controls">
                  <input type="number" id="stock-product" name="stock-product" placeholder="" class="input-xlarge" required="required" value="<?= isset($SelecProduct) && isset($SelecProduct) ? $SelecProduct->stock_producto : ''; ?>" >
              </div>
            </div>
            <div class="control-group">
              <label class="control-label"  for="ofert-product">Oferta</label>
              <div class="controls">
                  <input type="number" id="ofert-product" name="ofert-product" placeholder="" class="input-xlarge" required="required" value="<?= isset($SelecProduct) && isset($SelecProduct) ? $SelecProduct->oferta_producto : ''; ?>">
              </div>
            </div>
           
            <?php if( $SelecProduct->imagen_producto == '') : ?>
               <div class="control-group">
                <label class="control-label"  for="img-product">Imagen</label>
                <div class="controls">
                    <input type="file" id="img-product" name="img-product" placeholder="" class="input-xlarge"  value="">
                </div>
              </div>
            <?php else: ?>
               <div class="control-group">
                <img class="img-fluid" src="<?=base_url?>/uploads/images/<?= isset($SelecProduct) && isset($SelecProduct) ? $SelecProduct->imagen_producto : ''; ?> ">
               </div>
            <?php endif; ?>
            
            <div class="control-group sep-top">
              <div class="controls">
                  <button class="btn btn-success" type="submit">Guardar</button>
              </div>
            </div>
        </form>
    </div>
</div>