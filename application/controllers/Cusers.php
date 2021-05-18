<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cusers extends CI_Controller {
	public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model("Users_model");
    }

    public function index(){
        $this->load->view('vhome');
    }
}