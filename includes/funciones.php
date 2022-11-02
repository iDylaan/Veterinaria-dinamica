<?php

function autentificado() : bool {
    session_start();
    $auth = $_SESSION['login'];
    return $auth ? true : false;
}