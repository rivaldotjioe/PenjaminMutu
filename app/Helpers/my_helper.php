<?php

function checkLogin(){
    $session = session();
    return $session->get('logged_in');
}