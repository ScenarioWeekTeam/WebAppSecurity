<?php
require '../controllers/commentsController.php';

$controller = new CommentsController();

$comment = $controller->addComment($_POST["name"], $_POST["email"], $_POST["phonenumber"], $_POST["course"], $_POST["comment"]);

if ($comment != -1) {
    header("Location: /index.php?success=add");
}
else {
    header("Location: /feedback.php?error=add");
}
