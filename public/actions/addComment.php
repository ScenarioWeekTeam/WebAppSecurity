<?php
$root = "../";

require '../controllers/commentsController.php';

$controller = new CommentsController();

$comment = $controller->addComment(htmlspecialchars($_POST["name"]), htmlspecialchars($_POST["email"]), htmlspecialchars($_POST["phonenumber"]), htmlspecialchars($_POST["course"]), htmlspecialchars($_POST["comment"]));
if ($comment === TRUE) {
    header("Location: /index.php?success=add");
}
else {
    header("Location: /feedback.php?error=add");
}
