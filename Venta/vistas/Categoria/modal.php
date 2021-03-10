<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Categorias</title>
</head>

<body>
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modificar Categoria</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="frmEditar" action="#" method="post">
            <div class="mb-3">
            <input type="text" hidden class="form-control" name="idcategoria" id="idcategoria">
              <label for="exampleInputEmail1" class="form-label">Nombre</label>
              <input type="text" class="form-control" name="categoria" id="categoria">
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" id="guardar" class="btn btn-primary">Guardar</button>
        </div>
      </div>
    </div>
  </div>

</body>

</html>