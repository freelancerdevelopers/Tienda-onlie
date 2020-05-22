<div class="col-md-12">
    <h1>Crear Categoria</h1>
    <hr/>
    <div class="row">
        <form action="<?=base_url?>categoria/save" method="POST">
            <div class="control-group">
              <label class="control-label"  for="name-categori">Nombre de la nueva categoria</label>
              <div class="controls">
                  <input type="text" id="nameCategoria" name="nameCategoria" placeholder="" class="input-xlarge" required="required" autofocus="autofocus" pattern="[A-Z ]+">
              </div>
            </div>
            <div class="control-group sep-top">
              <div class="controls">
                  <button class="btn btn-success" type="submit">Guardar</button>
              </div>
            </div>
        </form>
    </div>
</div>