<?php

$config = array(
    'formLogin' => array(
        'username' => array(
            'name' => 'username',
            'id' => 'username',
            'placeholder' => 'Username',
            'class' => 'form-control',
            'aria-describedby' => 'sizing-addon3',
        ),
        'password' => array(
            'name' => 'password',
            'id' => 'password',
            'placeholder' => 'Password',
            'class' => 'form-control',
            'aria-describedby' => 'sizing-addon3',
            'type' => 'password'
        ),
        'submit' => array(
            'content' => 'Submit',
            'class' => 'btn btn-default',
            'aria-label' => 'Center Align',
            'type' => 'submit'
        )
    ),
    'formAddNewUser' => array(
        'username' => array(
            'name' => 'username',
            'id' => 'username',
            'placeholder' => 'Username',
            'class' => 'form-control',
            'aria-describedby' => 'sizing-addon3',
        ),
        'firstname' => array(
            'name' => 'firstname',
            'id' => 'firstname',
            'placeholder' => 'Firstname',
            'class' => 'form-control',
            'aria-describedby' => 'sizing-addon3',
        ),
        'lastname' => array(
            'name' => 'lastname',
            'id' => 'lastname',
            'placeholder' => 'Lastname',
            'class' => 'form-control',
            'aria-describedby' => 'sizing-addon3',
        ),
        'email' => array(
            'name' => 'email',
            'id' => 'email',
            'placeholder' => 'Email',
            'class' => 'form-control',
            'aria-describedby' => 'sizing-addon3',
        ),
        'submit' => array(
            'onclick' => 'addNewUser();',
            'content' => 'Add user',
            'class' => 'btn btn-default',
            'aria-label' => 'Center Align',
            'type' => 'button'
        )
    )
);