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
        $data['users'] = $this->User_model->getUsersList("id");
        $getParams = $this->input->get(NULL, TRUE);

        if ($this->input->server('REQUEST_METHOD') === 'GET' && isset($getParams['sortby'])) {
            $data['users'] = $this->User_model->getUsersList($getParams['sortby']);
        }

        $content = $this->load->view('userList', $data, TRUE);
        if ($this->input->server('REQUEST_METHOD') === 'GET' && $getParams['request'] != "AJAX") {
            $this->render($content, NULL);
        } else {
            echo $content;
        }
    }

    public function addNewUser() {
        $data['fields'] = $this->config->item('formAddNewUser');

        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $this->form_validation->set_error_delimiters('<div class="alert alert-danger" role="alert">', '</div>');
            if ($this->form_validation->run('addUser')) {
                if ($this->User_model->addNewUser()) {
                    $addNewUserModalContent = $this->load->view('modals/addNewUserSuccess');
                } else {
                    $addNewUserModalContent = $this->load->view('modals/addNewUserError');
                }
            } else {
                $addNewUserModalContent = $this->load->view('modals/addNewUser', $data, TRUE);
            }
        } else {
            $addNewUserModalContent = $this->load->view('modals/addNewUser', $data, TRUE);
        }
        echo $addNewUserModalContent;
    }

}

/* End of file welcome.php */