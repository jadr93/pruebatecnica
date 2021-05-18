<?php

class Noticias_model extends CI_Model
{
   
    public function __construct()
    {
        parent::__construct();
    }

    public function usuarioConPermiso() { // Comprobar si el usuario puede leer noticias privadas        
        $id = $this->session->userdata('id');
        $this->db->select('permiso');
        $this->db->where('id', $id);
        $query = $this->db->get('users');
        return $query->result_array();

    }
    public function readNoticias($permiso) {
        $this->db->select('id, titulo, contenido, fecha');
        if ($permiso == FALSE) {
            $this->db->where('privada', 0);
        }
        $this->db->where('publicada', 1);
        $query = $this->db->get('noticias');
        return $query->result_array();
    }

    public function createNoticia($titulo, $contenido, $privada, $publicada) {
        $query = $this->db->insert('noticias', array('titulo' => $titulo, 'contenido' => $contenido, 'privada' => $privada, 'publicada' => $publicada, 'fecha' => date('Y-m-d')));
        return $query;
    }

    public function getNoticias() {
        $this->db->select('*');
        $query = $this->db->get('noticias');
        return $query->result_array();
    }

    public function getNoticia($id) {
        $this->db->select('*');
        $this->db->where('id', $id);
        $query = $this->db->get('noticias');
        return $query->result_array();
    }

    public function setNoticia($id, $titulo, $contenido, $privada, $publicada) {
        $query = $this->db->query('UPDATE noticias set titulo ="'.$titulo.'", contenido ="'.$contenido.'",privada ='.$privada.',publicada ='.$publicada.' where id = '.$id.'');
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function borrarNoticia($id) {
        $query = $this->db->query("DELETE from noticias WHERE id = '$id'");
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function actualizarContador($id) {
            $this->db->where('id', $id);
            $this->db->select('visitas');
            $count = $this->db->get('noticias')->row();
            $this->db->where('id', $id);
            $this->db->set('visitas', ($count->visitas + 1));
            $this->db->update('noticias');
    }

    public function getCountNoticias(){
        $this->db->select('count(id) as count');
        $query = $this->db->get('noticias');
        return $query->result_array();
    }
}