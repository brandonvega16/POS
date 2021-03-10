
  <!-- Modal -->
  <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modificar Articulos</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="frmArticulos" action="#" method="post" enctype="multipart/form-data">
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Seleccionar Categoria</label>
              <select class="form-select" name="categoria" id="categoria">
                  <option selected>Seleccionar</option>
                  <?php while ($ver = mysqli_fetch_row($result)) : ?>
                  <option value="<?php echo $ver[0] ?>"><?php echo $ver[1] ?></option>
                <?php endwhile; ?>
              </select>
            </div>

            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Nombre</label>
              <input type="text" class="form-control" name="nombre" id="nombre">
            </div>

            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Descripcion</label>
              <input type="text" class="form-control" name="descripcion" id="descripcion">
            </div>

            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Cantidad</label>
              <input type="number" class="form-control" name="cantidad" id="cantidad">
            </div>

            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Precio</label>
              <input type="number" class="form-control" name="precio" id="precio">
            </div>

            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Imagen</label>
              <input type="file" class="form-control" name="imagen" id="imagen">
            </div>

            <span class="btn btn-primary btn-md entrar" id="registrar">Registrar</span>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" id="guardar" class="btn btn-primary">Guardar</button>
        </div>
      </div>
    </div>
  </div>
