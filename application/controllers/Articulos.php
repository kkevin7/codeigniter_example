<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Articulos extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('ArticulosModel');
    }

    public function index()
    {
        $this->load->view('template/header');
        $this->load->view('articulos/index');
        $this->load->view('template/footer');
    }

    public function recargar(){
        $datos= ['articulos'=>$this->ArticulosModel->findAll()];
        $this->load->view('articulos/contenido_table',$datos);

    }

    //Metodo para registrar
    public function ingresar(){
        $data = array(
            'nombre' => $_POST['nombre'],
            'cantidad' => $_POST['cantidad'],
            'descripcion' => $_POST['descripcion'],
        );
        //$data = [$_POST['nombre'],$_POST['cantidad'],$_POST['descripcion']];
        $this->ArticulosModel->ingresar($data);
    }

    //Metodo para registrar
    public function update(){
        $data = array(
            'nombre' => $_POST['nombre'],
            'cantidad' => $_POST['cantidad'],
            'descripcion' => $_POST['descripcion'],
            'id_articulo' => $_POST['id_articulo']
        );
        //$data = [$_POST['nombre'],$_POST['cantidad'],$_POST['descripcion'], $_POST['id_articulo']];
        $this->ArticulosModel->update($data);
    }

    //Metodo para registrar
    public function delete(){
        $this->ArticulosModel->delete($_POST['id_articulo']);
    }
}
