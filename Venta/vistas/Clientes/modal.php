<!-- Modal -->
<div class="modal fade" id="Clientes" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modificar Categoria</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="frmClientesU" action="#" method="post" enctype="multipart/form-data">

                    <div class="mb-3">
                        <input type="text" class="form-control" name="idCliente" id="idCliente">
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Nombre</label>
                        <input type="text" class="form-control" name="Mnombre" id="Mnombre">
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Apelldio</label>
                        <input type="text" class="form-control" name="Mapellido" id="Mapellido">
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Direccion</label>
                        <input type="text" class="form-control" name="Mdireccion" id="Mdireccion">
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Correo</label>
                        <input type="email" class="form-control" name="Mcorreo" id="Mcorreo">
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Telefono</label>
                        <input type="number" class="form-control" name="Mtelefono" id="Mtelefono">
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">RFC</label>
                        <input type="text" class="form-control" name="Mrfc" id="Mrfc">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="guardar" class="btn btn-primary">Guardar</button>
            </div>
        </div>
    </div>
</div>