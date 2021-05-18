<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cnoticias extends CI_Controller {
	public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model("Users_model");
        $this->load->model("Noticias_model");
    }

    public function leer($id){
        $data['noticia'] = $this->Noticias_model->getNoticia($id);
        $this->sumarvisita($id);
        $this->load->view('header');
        $this->load->view('vnoticias', $data);
    }

    function sumarvisita($id)
{
    $this->load->helper('cookie');
  $check_visitor = $this->input->cookie(urldecode($id), FALSE);
    $ip = $this->input->ip_address();
    if ($check_visitor == false) {
        $cookie = array(
            "name"   => "$id",
            "value"  => "$ip",
            "expire" =>  time() + 7200,
            "secure" => false
        );
        $this->input->set_cookie($cookie);
        $this->Noticias_model->actualizarContador($id);
    }
}
}
