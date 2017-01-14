<?php
require '../controllers/commentsController.php';

$controller = new CommentsController();

$comment = $controller->addComment($_POST["comment"]);

if ($comment != -1) {
    header("Location: /index.php");
}
else {
    header("Location: /index.php?error=add");
}
