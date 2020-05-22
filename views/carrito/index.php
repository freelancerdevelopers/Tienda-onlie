<div class="col-md-12">
    <h1>Carrito de compras</h1>
    <div class="row">
        <div class="col-md-6">
            <?php if(isset($_SESSION['carrito'])) : ?>
                <table class="table table-striped">
                <thead>
                  <tr>
                      <th></th>
                    <th>Producto</th>
                    <th>Precio</th>
                    <th>Oferta</th>
                    <th>Unidades</th>
                    <th>Imagen</th>
                  </tr>
                </thead>
                   <?php 
                   $t = count($_SESSION['carrito']);
                    for ($i = 0; $i <= $t; $i++) {
                        if($_SESSION['carrito'][$i]['id_producto'] == null){
                            echo "Selecciono: # ".$t."";
                        }else{                              
                         echo " <tr><td><a class='btn btn-danger btn-sm' href='".base_url."carrito/remove&indice=".$i."'><span class='fa fa-1x fa-trash' alt='eliminar' title='elimina'></span></a></td>";
                         echo " <td>".$_SESSION['carrito'][$i]['nombre_producto']."</td>";
                         echo " <td> $ ".$_SESSION['carrito'][$i]['precio_producto']."</td>";
                         echo " <td>- ".$_SESSION['carrito'][$i]['oferta_producto']." %</td>";
                         echo " <td class='text-center'>"
                         . "<div><span>".$_SESSION['carrito'][$i]['unidad_producto']."</span> </div> "
                                 . "<div><a href='".base_url."carrito/up&indice=".$i."'><span class='fa fa-2x fa-plus-circle'></span></a>  <a href='".base_url."carrito/down&indice=".$i."'><span class='fa fa-2x fa-minus-circle'></span></a> </div></td>";
                         echo " <td><img class='img-fluid img-product-list' src='".base_url."/uploads/images/".$_SESSION['carrito'][$i]['imagen_producto']."'></td></tr>";
                        }
                     }
                    ?>
                </table>
                <?php $coste = Utils::statsCarrito(); ?>
                <p><b>Sub total: $<?=$coste['sub']?> </b></p>
                <p><b>Impuesto (16%) $<?=$coste['tax']?></b></p>
                <h1>Total: $<?=$coste['total']?> </h1>
                <a href="<?=base_url?>/carrito/delete_all" class="btn btn-danger btn-sm">Cancelar pedido</a>
            <?php else: ?>
                <h1>No hay productos seleccionados.</h1>
            <?php endif;?>    
        </div>
        <div class="col-md-6">
            <?php if(isset($_SESSION['user'])) :?>
            <div class="col-md-12">
                <h4>Información del pedido</h4>
                <div class="row">
                    <form action="<?=base_url?>pedido/add" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6">
                              <label for="firstName">Nombre</label>
                              <input type="text" class="form-control" id="nombre_pedido" name="nombre_pedido" placeholder="" value="<?= $_SESSION['user']->nombre_usuario ?>" required disabled="disabled">
                              <div class="invalid-feedback">
                                Vserifique su nombre.
                              </div>
                            </div>
                            <div class="col-md-6">
                            <label for="email">Correo Electrónico <span class="text-muted"></span></label>
                            <input type="email" class="form-control" id="email_pedido" name="email_pedido" placeholder="you@example.com" value="<?= $_SESSION['user']->email_usuario ?>" disabled="disabled">
                            <div class="invalid-feedback">
                              Verifique su correo electrónico.
                            </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="address">Dirección de envio</label>
                                <input type="text" class="form-control" id="direccion_pedido" name="direccion_pedido" placeholder="Calle 1234 col. " required>
                                <div class="invalid-feedback">
                                  Verifique su direccion de envio.
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="state">Estado</label>
                                <select class="custom-select d-block w-100" id="ciudad_pedido" name="ciudad_pedido" required>
                                  <option value="">...</option>
                                  <option>CDMX</option>
                                  <option>Puebla</option>
                                </select>
                                <div class="invalid-feedback">
                                  Verifique el estado.
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="zip">Zip</label>
                                <input type="text" class="form-control" id="zip_pedido" name="zip_pedido" placeholder="" required>
                                <div class="invalid-feedback">
                                  Verifique su codigo postal.
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                Google Maps
                            </div>
                        </div>
                            <div class="col-md-12">
                                <h4 class="mb-3">Formas de pago</h4>
                                <div class="d-block my-3">
                                  <div class="custom-control custom-radio">
                                    <input id="paypal" name="paymentMethod" type="radio" class="custom-control-input" required>
                                    <label class="custom-control-label" for="paypal"></label>
                                    <img class="img-fluid img-carrito" src="<?=base_url?>/img/PayPal-Logo.png">
                                  </div>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-primary btn-lg btn-block" type="submit">Hacer pedido</button>
                    </form>
                </div>
            </div>    
            <?php else: ?>
               <h1>No estas registrado.</h1>
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
               <hr/>
               <p>Para continuar con tu compra es necesario que te registres.</p>
               <p><a href="<?=base_url?>usuario/registro" class="btn btn-warning btn-sm">Registrarme</a></p>
            <?php endif;?>
            
        </div>
    </div>
</div>