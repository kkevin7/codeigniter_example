<?php

class ArticulosModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    //Metodo que devuele todos los registros de la tabla
    public function findAll(){
        return $this->db->get('articulos')->result();
    }

    //post
    public function ingresar($datos){
        //$sql = "INSERT INTO articulos(nombre,cantidad,descripcion) VALUES (?,?,?)";
        $this->db->insert('articulos',$datos);
    }

    //put
    public function update($datos){
        //$sql = "UPDATE articulos SET nombre = ?, cantidad = ?, descripcion = ? WHERE id_articulo = ?";
        $this->db->where('id_articulo', $datos['id_articulo']);
        array_pop($datos);
        $this->db->update('articulos',$datos);
    }

    //delete
    public function delete($id){
        //$sql = "UPDATE articulos SET nombre = ?, cantidad = ?, descripcion = ? WHERE id_articulo = ?";
        $this->db->where('id_articulo', $id);
        $this->db->delete('articulos');
    }

}