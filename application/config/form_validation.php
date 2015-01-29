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
            'rules' => 'trim|required|xss_clean|callback_check_login_data'
        )
    )
);
