<?php
require '../controllers/accountsController.php';

$controller = new AccountController();

$login = $controller->login($_POST["username"], $_POST["password"]);

if ($login != -1) {
    if ($_GET['redirect']) {
        header("Location: " . $_GET['redirect']);
    }
    else {
        header("Location: /index.html?success=login");
    }
}
else {
    header("Location: /login.php?error=true");
}
