<?php
require '../controllers/accountsController.php';

$controller = new AccountController();

$register = $controller->register($_POST["username"], $_POST["password"]);

if ($login != -1) {
    header("Location: /index.php?success=register");
}
else {
    header("Location: /register.php?error=true");
}
