<?php

$config = array(
    'login' => array(
        array(
            'field' => 'username',
            'label' => 'Username',
            'rules' => 'trim|required|xss_clean'
        ),
        array(
            'field' => 'password',
            'label' => 'Password',
            'rules' => 'trim|required|xss_clean|callback_checkLoginData'
        )
    ),
    'addUser' => array(
        array(
            'field' => 'username',
            'label' => 'Username',
            'rules' => 'trim|required|xss_clean|is_unique'
        ),
        array(
            'field' => 'firstname',
            'label' => 'Firstname',
            'rules' => 'trim|required|xss_clean'
        ),
        array(
            'field' => 'lastname',
            'label' => 'Lastname',
            'rules' => 'trim|required|xss_clean'
        ),
        array(
            'field' => 'email',
            'label' => 'Email',
            'rules' => 'trim|required|xss_clean|valid_email'
        )
    )
);
