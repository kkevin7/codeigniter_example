<div class="container">
    <h2>Articulo</h2>
<form>
    <div class="form-group col-sm-6">
        <label for="nombre">Nombre</label>
        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre del Producto" required>
    </div>
    <div class="form-group col-sm-3">
        <label for="cantidad">Cantidad</label>
        <input type="number" class="form-control" min="1" maxlength="10" id="cantidad" name="cantidad" placeholder="Cantidad de Productos" required>
    </div>
    <div class="form-group col-sm-6">
        <label for="descripcion">Descripcion</label>
        <textarea class="form-control" maxlength="250" id="descripcion" name="descripcion" rows="3" required></textarea>
    </div>
    <button type="button" id="btn_create" class="btn btn-primary">Guardar</button>
    <button type="button" id="btn_edit" class="btn btn-success ">Editar</button>
    <button type="reset" class="btn btn-secondary">Cancelar</button>
</form>
<div class="row">
    <h1>Lista de Articulos</h1>
<table class="table table-responsive highlighttable">
    <thead>
    <td>ID</td>
    <td>NOMBRE</td>
    <td>CANTIDAD</td>
    <td>DESRIPCION</td>
    <td colspan="2">ACCIONES</td>
    </thead>
    <tbody id="contenido_table">

    </tbody>
</table>
</div>
</div>

<script src="assets/js/script.js"></script>
