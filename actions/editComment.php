<?php
require '../controllers/commentsController.php';

$controller = new CommentsController();

$comment = $controller->editComment($_POST["id"],$_POST["comment"]);

if ($comment != -1) {
    header("Location: /index.php?success=edit");
}
else {
    if ($_POST["id"])
        header("Location: /editComment.php?error=true&id=" . $_POST["id"]);
    }
    else {
        header("Location: /index.php?error=edit");
    }
}
