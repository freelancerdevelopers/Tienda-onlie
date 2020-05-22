
<div class="col-md-12">
    <div class="row">
        <h1>Gestionar Categorias</h1>
        <hr/>
        <div class="col-controlls">
            <a class="btn btn-success" href="<?=base_url?>categoria/crear">
                <span class="fa fa-1x fa-bookmark-o"></span> Agregar una categoria</a>
        </div>
        <table class="table table-striped">
        <thead>
          <tr>
            <th>#</th>
            <th>Nombre categoria</th>
          </tr>
        </thead>
        <?php while ($cat = $categorias->fetch_Object()): ?>
            <tr>
                <td><?= $cat->id_categoria; ?></td>
                <td><?= $cat->nombre_categoria; ?></td>
            </tr>
        <?php endwhile;?>
        </table>   
    </div>
</div>