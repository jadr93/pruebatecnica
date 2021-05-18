<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clogin extends CI_Controller {
	public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model("Users_model");
        $this->load->model("Noticias_model");
        $this->load->library('ReCaptcha');
    }

    public function index(){
        if ($this->session->userdata('loggedIn') == TRUE){
            $permiso = $this->Noticias_model->usuarioConPermiso();
            if ($permiso[0]["permiso"] == 1){
                $data['noticias'] = $this->Noticias_model->readNoticias(TRUE);
            } else {
                $data['noticias'] = $this->Noticias_model->readNoticias(FALSE);
            }
            $this->load->view('header');
            $this->load->view('vhome', $data);
        } else {
            $this->load->view('vlogin');
        }
    }

    public function login(){

        $mail = $this->input->post('mail');
        $password = $this->input->post('password');
        $data = $this->Users_model->checkIfRegistered($mail, $password); // Comprobar si los datos son correctos
        if (isset($data[0]["pass"]) && password_verify($password, $data[0]['pass'])) {
            $this->session->set_userdata('loggedIn', TRUE);  // Almacenar variables de sesión
            $this->session->set_userdata('id', $data[0]["id"]); 
            $this->session->set_userdata('nombre', $data[0]["nombre"]);
            $permiso = $this->Noticias_model->usuarioConPermiso();
            if ($permiso[0]["permiso"] == 1){
                $data['noticias'] = $this->Noticias_model->readNoticias(TRUE);
            } else {
                $data['noticias'] = $this->Noticias_model->readNoticias(FALSE);
            }
            $this->load->view('header');
            $this->load->view('vhome', $data);
        } else {
            $data['loginerror'] = TRUE; // Flag para mostrar mensaje de error en la vista de login
            $this->load->view('vlogin', $data);
        }
    }

    public function register(){
        
        $mail = $this->input->post('mail');
        $password2 = $this->input->post('password');
        $password = password_hash($password2, PASSWORD_DEFAULT);
        $nombre = $this->input->post('nombre');
        $apellidos = $this->input->post('apellidos');
        $id = $this->Users_model->checkIfExists($mail); // Comprobar si el usuario existe
        if (isset($id[0]["id"])){
            $data['yaexiste'] = TRUE; // El usuario ya existe
            $this->load->view('vregister', $data);
        } else {
            $captcha_answer = $this->input->post('g-recaptcha-response');
            $response = $this->recaptcha->verifyResponse($captcha_answer);
            if ($response['success']) {
                $id = $this->Users_model->createUser($mail, $password, $nombre, $apellidos); // Crear usuario
                $data['creado'] = TRUE; // Usuario creado
                $para      =  $mail;
                $titulo    = '¡Bienvenido!';
                $mensaje   = 'Te has registrado con éxito en nuestra web.';
                $cabeceras = 'From: jadr1993@gmail.com' . "\r\n" .
                'Reply-To: jadr1993@gmail.com' . "\r\n" .
                'X-Mailer: PHP/' . phpversion();
                mail($para, $titulo, $mensaje);
                $this->load->view('vlogin', $data);
            } else {
                $this->load->view('vregister');
            }
        }
    }

    public function logout(){
        $this->session->sess_destroy();
        $this->session->set_userdata('loggedIn', FALSE);
        $this->load->view('vlogin');

    }
}