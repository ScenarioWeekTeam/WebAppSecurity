<?php

require '../models/account.php';

class AccountsController {
    function __construct() {
        session_start();
    }

    function __destruct() {

    }

    function login($username, $password) {
        $account = new Account($username, $password, NULL);
        if ($account->find() != -1) {
            $_SESSION['user'] = $account->getId();
            $_SESSION['username'] = $username;
        }
        else {
            return -1;
        }
    }

    function logout() {
        session_unset();
        session_destroy();
    }
}
