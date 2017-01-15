<?php

$root = "../";

require '../controllers/commentsController.php';

$controller = new CommentsController();

$comment = $controller->deleteComment($_POST["id"]);

if ($comment != -1) {
    header("Location: /index.php?success=delete");
}
else {
    header("Location: /index.php?error=delete");
}
