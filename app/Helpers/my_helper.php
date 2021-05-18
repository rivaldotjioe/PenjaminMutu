<?php

function checkLogin(){
    $session = session();
    if ($session->get('logged_in')) {
        return $session->get('logged_in');
    } else {
        return $session->get('logged_in');
    }

}