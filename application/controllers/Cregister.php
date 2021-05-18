<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cregister extends CI_Controller {
	public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model("Users_model");
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
            $this->load->view('vregister');
        }
    }
}