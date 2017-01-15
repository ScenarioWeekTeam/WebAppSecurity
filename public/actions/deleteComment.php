<?php

$root = "../";

require '../controllers/commentsController.php';

$controller = new CommentsController();

if ($_GET['csrf'] === $_SESSION['CSRF-Delete-' . $_GET["id"]]) {
    $_SESSION['CSRF-Delete-' . $_GET["id"]] = NULL;
    $comment = $controller->deleteComment(htmlspecialchars($_GET["id"]));

    if ($comment === -1) {
        header("Location: /index.php?error=delete");
    }
    else {
        header("Location: /index.php?success=delete");
    }
}
else {
    eader("Location: /index.php?error=delete");
}
