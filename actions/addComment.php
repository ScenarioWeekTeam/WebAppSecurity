<?php
$root = "../";

require '../controllers/commentsController.php';

$controller = new CommentsController();

$comment = $controller->addComment($_POST["name"], $_POST["email"], $_POST["phonenumber"], $_POST["course"], $_POST["comment"]);
if ($comment === TRUE) {
    header("Location: /index.html?success=add");
}
else {
    header("Location: /feedback.php?error=add");
}
