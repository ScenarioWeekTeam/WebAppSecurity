<?php

require $root . 'models/account.php';

class AccountController {
    function __construct() {
        session_start();
    }

    function __destruct() {

    }

    function login($username, $password) {
        $account = new Account($username, $password, NULL);
        $results = $account->search();
        if ($results->num_rows === 1) {
            $row = $results->fetch_assoc();
            $_SESSION['user'] = $row['id'];
            $_SESSION['username'] = $row['username'];
            return;
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
