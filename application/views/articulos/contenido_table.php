<?php

foreach ($articulos as $item){
    ?>
    <tr>
        <td><?= $item->id_articulo ?></td>
        <td><?= $item->nombre ?></td>
        <td><?= $item->cantidad ?></td>
        <td><?= $item->descripcion ?></td>
        <td><button type="button" class="btn btn-warning btn_edit" onclick="seleccion(this)" value="<?= $item->id_articulo ?>">Editar</button></td>
        <td><button type="button" class="btn btn-danger btn_delete" onclick="seleccion(this)" value="<?= $item->id_articulo ?>">Eliminar</button></td>
    </tr>

<?php } ?>