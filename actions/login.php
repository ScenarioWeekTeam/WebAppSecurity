<?php

$root = "../";

require '../controllers/accountsController.php';

$controller = new AccountController();

$login = $controller->login($_POST["username"], $_POST["password"]);
error_log("Login attempt: " . $_POST["username"] . " " . $_POST["password"]);

if ($login != -1) {
    if ($_GET['redirect']) {
        header("Location: " . $_GET['redirect']);
    }
    else {
        header("Location: /index.php?success=login");
    }
}
else {
    header("Location: /login.php?error=true");
}
