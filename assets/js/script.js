window.addEventListener('load',recargar);

//metodo recargar
function recargar() {
    var peticion = new XMLHttpRequest();
    peticion.onreadystatechange=function () {
        if (this.readyState== 4){
            document.getElementById('contenido_table').innerHTML=this.responseText;
            asignarEventos();
        }
    };
    peticion.open('GET', 'articulos/recargar');
    peticion.send();
}

//controlador de eventos
function asignarEventos() {
    document.getElementById('btn_create').addEventListener('click', accion );
    var btnEdit= document.getElementById('btn_edit').addEventListener('click', actualizar);;
    var btnDelete= document.getElementsByClassName('btn_delete');

    for(var i=0; i<btnDelete.length; i++){
        //btnEdit[i].addEventListener('click',actualizar);
        btnDelete[i].addEventListener('click',eliminar);
    }

}

function accion() {
    var nombre = document.getElementById('nombre').value;
    var cantidad = document.getElementById('cantidad').value;
    var descripcion = document.getElementById('descripcion').value;

    console.log(nombre);
    console.log(cantidad);
    console.log(descripcion);

    if(nombre == "" || cantidad == "" || descripcion==""){
        alert("LLENE LOS CAMPOS");
        return;
    }else {
        var peticion = new XMLHttpRequest();
        peticion.onreadystatechange = function () {
            if (this.readyState == 4) {
                recargar();
                limpiar();
            }
        };
        peticion.open('POST', 'Articulos/ingresar');
        peticion.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        peticion.send('nombre=' + nombre + '&cantidad=' + cantidad + '&descripcion=' + descripcion);
    }
}

var id;
function seleccion(elemento){
    tr = elemento.parentNode.parentNode;
    td = tr.getElementsByTagName("td");

    id = td[0].innerHTML;
    nombre = td[1].innerHTML;
    cantidad = td[2].innerHTML;
    descripcion = td[3].innerHTML;

    document.getElementById('nombre').value=nombre;
    document.getElementById('cantidad').value=cantidad;
    document.getElementById('descripcion').value=descripcion;
}

function actualizar() {
    var nombre = document.getElementById('nombre').value;
    var cantidad = document.getElementById('cantidad').value;
    var descripcion = document.getElementById('descripcion').value;

    console.log(nombre);
    console.log(cantidad);
    console.log(descripcion);
    console.log(id);

    if(nombre == "" || cantidad == "" || descripcion==""){
        alert("LLENE LOS CAMPOS");
        return;
    }else {
        var peticion = new XMLHttpRequest();
        peticion.onreadystatechange = function () {
            if (this.readyState == 4) {
                recargar();
                limpiar();
            }
        };
        peticion.open('POST', 'articulos/update');
        peticion.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        peticion.send('nombre=' + nombre + '&cantidad=' + cantidad + '&descripcion=' + descripcion + '&id_articulo=' + id);
    }
}

function eliminar() {
    const confirm = window.confirm("¿Deseas eliminar el registro?");

    if (confirm){
        var id = this.value;
        console.log(this.value);

        var peticion = new XMLHttpRequest();
        peticion.onreadystatechange = function () {
            if (this.readyState == 4) {
                recargar();
                limpiar();
            }
        };
        peticion.open('POST', 'articulos/delete');
        peticion.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        peticion.send('id_articulo=' + id);
        /*
        var id = $(this).data('id_alumno');

        $clicked_btn = $(this);
        $.ajax({
            url: $uri + "/eliminar/" + id,
            type: 'DELETE',
            data: {},
            success: function (response) {
                // Remover le td de la tabla
                $clicked_btn.parent().parent().remove();
            }
        });
        */
    }
}

function limpiar() {
    document.getElementById('nombre').value="";
    document.getElementById('cantidad').value="";
    document.getElementById('descripcion').value="";
}