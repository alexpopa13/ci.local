<?php

class User_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function checkLogin() {
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger" role="alert">', '</div>');
        if ($this->form_validation->run('login') == FALSE) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function checkNewUser() {
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger" role="alert">', '</div>');
        if ($this->form_validation->run('addUser') == FALSE) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function login($username, $password) {
        $this->db->select('username, firstname, lastname');
        $this->db->from('users');
        $this->db->where('username', $username);
        $this->db->where('password', MD5($password));
        $this->db->limit(1);

        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function getUsersList() {
        $this->db->select('*');
        $this->db->from('users');
        $query = $this->db->get();
        return $query->result();
    }

    public function addNewUser() {
        $data = array(
            'username' => $this->input->post('username'),
            'firstname' => $this->input->post('username'),
            'lastname' => $this->input->post('lastname'),
            'email' => $this->input->post('email'),
            'password' => md5($this->input->post('user_name'))
        );
        $this->db->insert('users', $data);
        if ($this->db->affected_rows() > 0)
            return TRUE;
        else
            return FALSE;
    }

}
