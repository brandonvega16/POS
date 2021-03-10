<!-- Modal -->
<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modificar Usuarios</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="frmMUsuarios" action="#" method="post">
          <div class="mb-3">
            <input type="text" hidden class="form-control" name="id" id="id">
          </div>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nombre</label>
            <input type="text" class="form-control" name="Unombre" id="Unombre">
          </div>

          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Apellido</label>
            <input type="text" class="form-control" name="Uapellido" id="Uapellido">
          </div>

          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Usuario</label>
            <input type="text" class="form-control" name="Uusuario" id="Uusuario">
          </div>

          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Contraseña</label>
            <input type="password" class="form-control" name="Upassword" id="Upassword">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" id="guardar" class="btn btn-primary">Guardar</button>
      </div>
    </div>
  </div>
</div>