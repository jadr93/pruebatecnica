<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cadmin extends CI_Controller {
	public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model("Users_model");
        $this->load->model("Noticias_model");
    }

    public function index(){
        if ($this->session->userdata('adminLoggedIn') == TRUE){
            $this->load->view('header');
            $this->load->view('vadmin');
        } else {
            $this->load->view('vadminlogin');
        }
    }

    public function login(){
        $login = $this->input->post('login');
        $password = $this->input->post('password');
        $id = $this->Users_model->checkIfAdmin($login, $password); // Comprobar si los datos son correctos
        if (isset($id[0]["id"])){
            $this->session->set_userdata('adminLoggedIn', TRUE);  // Almacenar variables de sesión
            $this->session->set_userdata('id', $id[0]["id"]); 
            $this->session->set_userdata('login', $id[0]["login"]);
            $this->load->view('header');
            $this->load->view('vadmin');
        } else {
            $data['loginerror'] = TRUE; // Flag para mostrar mensaje de error en la vista de login
            $this->load->view('vadminlogin', $data);
        }
    }

    public function noticias(){
        $data['noticias'] = $this->Noticias_model->getNoticias();
        $this->load->view('header');
        $this->load->view('vadminnoticias', $data);
    }

    public function usuarios(){
        $data['usuarios'] = $this->Users_model->getUsuarios();
        $this->load->view('header');
        $this->load->view('vadminusuarios', $data);
    }

    public function estadisticas(){
        $data['usuarios'] = $this->Users_model->getCountUsers();
        $data['noticias'] = $this->Noticias_model->getCountNoticias();
        $data['noticiasvisitas'] = $this->Noticias_model->getNoticias();
        $this->load->view('header');
        $this->load->view('vadminstats', $data);
    }

    
    public function borrarNoticia(){
        $id = $this->input->post('id');
        $result = $this->Noticias_model->borrarNoticia($id);
        echo json_encode($result);
    }
    public function borrarUsuario(){
        $id = $this->input->post('id');
        $result = $this->Users_model->borrarUsuario($id);
        echo json_encode($result);
    }

    public function editarNoticia($id){
        $data['id'] = $id;
        $data['noticias'] = $this->Noticias_model->getNoticia($id);
        $this->load->view('header');
        $this->load->view('veditarnoticia', $data);
    }

    public function crearUsuario(){
        $this->load->view('header');
        $this->load->view('vcrearusuario');
    }
    
    public function crearNoticia(){
        $this->load->view('header');
        $this->load->view('vcrearnoticia');
    }

    public function editarUsuario($id){
        $data['id'] = $id;
        $data['usuarios'] = $this->Users_model->getUsuario($id);
        $this->load->view('header');
        $this->load->view('veditarusuario', $data);
    }

    public function confirmarEdicion(){
        $id = $this->input->post('id');
        $titulo = $this->input->post('titulo');
        $contenido = $this->input->post('contenido');
        $privada2 = $this->input->post('privada');
        $publicada2 = $this->input->post('publicada');
        if ($privada2 == 'true') {
            $privada = 1; 
        } else {
            $privada = 0;
        }
        if ($publicada2 == 'true') {
            $publicada = 1; 
        } else {
            $publicada = 0;
        }
        $result = $this->Noticias_model->setNoticia($id, $titulo, $contenido, $privada, $publicada);
        echo json_encode($result);
    }

    public function confirmarCreacion(){
        $titulo = $this->input->post('titulo');
        $contenido = $this->input->post('contenido');
        $privada2 = $this->input->post('privada');
        $publicada2 = $this->input->post('publicada');
        if ($privada2 == 'true') {
            $privada = 1; 
        } else {
            $privada = 0;
        }
        if ($publicada2 == 'true') {
            $publicada = 1; 
        } else {
            $publicada = 0;
        }
        $result = $this->Noticias_model->createNoticia($titulo, $contenido, $privada, $publicada);
        echo json_encode($result);
    }

    public function confirmarEdicionUsuario(){
        $id = $this->input->post('id');
        $nombre = $this->input->post('nombre');
        $apellidos = $this->input->post('apellidos');
        $mail = $this->input->post('mail');
        $permiso2 = $this->input->post('permiso');
        if ($permiso2 == 'true') {
            $permiso = 1; 
        } else {
            $permiso = 0;
        }
        $result = $this->Users_model->setUsuario($id, $nombre, $apellidos, $mail, $permiso);
        echo json_encode($result);
    }

    public function confirmarCreacionUsuario(){
        $nombre = $this->input->post('nombre');
        $apellidos = $this->input->post('apellidos');
        $mail = $this->input->post('mail');
        $password2 = $this->input->post('password');
        $password = password_hash($password2, PASSWORD_DEFAULT);
        $result = $this->Users_model->createUser( $mail, $password, $nombre, $apellidos);
        echo json_encode($result);
    }
}