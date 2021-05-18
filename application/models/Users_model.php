<?php

class Users_model extends CI_Model
{
   
    public function __construct()
    {
        parent::__construct();
    }

    public function checkIfRegistered($mail, $password) {
        $this->db->select('id, nombre, pass');
        $this->db->where('mail', $mail);
        $query = $this->db->get('users');
        return $query->result_array();
    }

    public function checkIfAdmin($login, $password) {
        $this->db->select('id, login');
        $this->db->where('login', $login);
        $this->db->where('password', $password);
        $query = $this->db->get('admins');
        return $query->result_array();
    }
    
    public function checkIfExists($mail) {
        $this->db->select('id, pass');
        $this->db->where('mail', $mail);
        $query = $this->db->get('users');
        return $query->result_array();
    }

    public function createUser($mail, $pass, $nombre, $apellidos) {
        $query = $this->db->insert('users', array('mail' => $mail, 'pass' => $pass, 'nombre' => $nombre, 'apellidos' => $apellidos));
        return $query;
    }

    public function getUsuarios() {
        $this->db->select('*');
        $query = $this->db->get('users');
        $this->db->order_by("id asc");
        return $query->result_array();
    }

    public function getStats() {
        $this->db->select('*');
        $query = $this->db->get('users');
        return $query->result_array();
    }

    public function getUsuario($id) {
        $this->db->select('*');
        $this->db->where('id', $id);
        $query = $this->db->get('users');
        return $query->result_array();
    }

    public function setUsuario($id, $nombre, $apellidos, $mail, $permiso) {
        $query = $this->db->query('UPDATE users set nombre ="'.$nombre.'", apellidos ="'.$apellidos.'",mail ="'.$mail.'",permiso ='.$permiso.' where id = '.$id.'');
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function borrarUsuario($id) {
        $query = $this->db->query("DELETE from users WHERE id = '$id'");
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function getCountUsers(){
        $this->db->select('count(id) as count');
        $query = $this->db->get('users');
        return $query->result_array();
    }
}