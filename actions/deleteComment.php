<?php

$root = "../";

require '../controllers/commentsController.php';

$controller = new CommentsController();

$comment = $controller->deleteComment($_GET["id"]);

if ($comment === -1) {
    header("Location: /index.php?error=delete");
    header("Location: /index.php?success=delete");
}
else {
    header("Location: /index.php?success=delete");
}
