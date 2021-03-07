<?php

function checkLogin(){
    $session = session();
    if (is_null($session->get('logged_in'))) {
        return false;
    } else {
        return $session->get('logged_in');
    }

}