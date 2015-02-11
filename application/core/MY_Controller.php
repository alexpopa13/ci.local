<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

    protected $layout = 'index';
    protected $stylesheets = array(
        'bootstrap.min.css',
        'bootstrap-theme.min.css',
        'custom.css'
    );
    protected $javascripts = array(
        'jquery-1.11.2.min.js',
        'bootstrap.min.js',
        'custom.js'
    );

    public function __construct() {
        parent::__construct();
        $allowed = array('index', 'login', 'logout');
        if (!$this->session->userdata('logged_in')) {
            
        } else {
            if ($this->session->userdata('logged_in')['role'] == "ADMIN") {
                $allowed[] = "usersList";  $allowed[] = "addNewUser"; $allowed[] = "editUser"; $allowed[] = "getAddNewUserForm"; $allowed[] = "getEditUserForm"; $allowed[] = "sendMail";
            } else {
                $allowed[] = "editUser";
            }
        }
        if (!in_array($this->router->fetch_method(), $allowed)) {
            redirect('/');
        }
    }

    protected function render($content, $footer) {
        $view_data = array(
            'header' => $this->load->view('header', NULL, TRUE),
            'content' => $content,
            'footer' => $footer,
            'stylesheets' => $this->get_stylesheets(),
            'javascripts' => $this->get_javascripts()
        );

        $this->load->view($this->layout, $view_data);
    }

    protected function get_stylesheets() {
        return $this->stylesheets;
    }

    protected function get_javascripts() {
        return $this->javascripts;
    }

}
