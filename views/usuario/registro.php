
<div class="col-md-12">
    <div class="row">
        <div class="col-md-4 img-top-pad">
            <img class="img-fluid" src="<?=base_url?>/img/home-pants.jpg" alt="tienda-online" title="tienda-online">
        </div>
        <div class="col-md-4">
            <form action='<?=base_url?>usuario/save' method="POST">
              <h1>Registro de usuario</h1>
              <hr/>
              <div class="control-group">
              <label class="control-label"  for="username">Nombre completo</label>
              <div class="controls">
                  <input type="text" id="username" name="nombre" placeholder="usuario" class="input-xlarge" required="required" autofocus="autofocus" pattern="[A-Z ]+">
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="email">Correo electrónico</label>
              <div class="controls">
                <input type="text" id="email" name="email" placeholder="tucorreo@mail.com" class="input-xlarge" required="required">
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="password">Contraseña</label>
              <div class="controls">
                <input type="password" id="password" name="password" placeholder="" class="input-xlarge" required="required">
              </div>
            </div>
            <div>
              <p>Captcha</p>      
            </div>  
            <div>
              <p>Politicas y privacidad</p>      
            </div>  
            <div class="control-group">
              <div class="controls">
                  <button class="btn btn-success" type="submit">Registrarme</button>
              </div>
            </div>
          </form>
        </div>
        <div class="col-md-4 pad-center-vertical">
            <button class="btn btn-facebook"><span class="fa fa-facebook-official"></span> | Registrarme con Facebook</button>
            <hr/>
            <button class="btn btn-gmail"><span class="fa fa-google"></span> | Registrarme con Gmail</button>
        </div>
        
    </div>
</div>