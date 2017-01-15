<?php

$root = "../";

require '../controllers/accountsController.php';

$controller = new AccountController();

if ($_POST['CSRFTOKEN'] === $_SESSION['CSRF-Login']) {
    $_SESSION['CSRF-Login'] = NULL;
    $login = $controller->login(htmlspecialchars($_POST["username"]), htmlspecialchars($_POST["password"]));

    if ($login != -1) {
        header("Location: /index.php?success=login");
    }
    else {
        header("Location: /login.php?error=true");
    }
}
else {
    header("Location: /login.php?error=true");
}
