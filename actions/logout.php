<?php
require '../controllers/accountsController.php';

$controller = new AccountController();

$controller->logout();

header("Location: /index.php?success=logout");
