<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('User_model');
    }

    public function index() {
        if ($this->session->userdata('logged_in')) {
            redirect('user/usersList', 'refresh');
        } else {
            redirect('user/login', 'refresh');
        }
    }

    public function login() {
        if ($this->User_model->checkLogin() === FALSE) {
            $data['fields'] = $this->config->item('formLogin');
            $content = $this->load->view('login', $data, TRUE);
            $this->render($content, NULL);
        } else {
            redirect('/', 'refresh');
        }
    }

    public function checkLoginData($password) {

        $username = $this->input->post('username');
        $result = $this->User_model->login($username, $password);

        if ($result) {
            $sess_array = array();
            foreach ($result as $row) {
                $sess_array = array(
                    'username' => $row->username,
                    'firstname' => $row->firstname,
                    'lastname' => $row->lastname
                );
                $this->session->set_userdata('logged_in', $sess_array);
            }
            return TRUE;
        } else {
            $this->form_validation->set_message('check_login_data', 'Invalid username or password');
            return FALSE;
        }
    }

    public function logout() {
        $this->session->unset_userdata('logged_in');
        $this->session->sess_destroy();
        redirect('/', 'refresh');
    }

    public function usersList() {
        $data['users'] = $this->User_model->getUsersList();
        $content = $this->load->view('userList', $data, TRUE);
        $this->render($content, NULL);
    }

    public function addNewUser() {
        
        if ($this->form_validation->run('addUser') == FALSE) {
            var_dump($this->form_validation); die();
            $data['fields'] = $this->config->item('formAddNewUser');
            $addNewUserModalContent = $this->load->view('modals/addNewUser', $data, TRUE);
            echo $addNewUserModalContent;

//            header('Content-Type: application/json');
//            echo json_encode($addNewUserModalContent);
        }
    }

}

/* End of file welcome.php */