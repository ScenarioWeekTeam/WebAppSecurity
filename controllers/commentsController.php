<?php

require $root . 'models/comment.php';

class CommentsController {
    function __construct() {
        session_start();
    }

    function __destruct() {

    }

    function addComment($name, $email, $phonenumber, $course, $comment) {
        $comment = new Comment($name, $email, $phonenumber, $course, $comment, NULL);
        return $comment->save();
    }

    function deleteComment($id) {
        $comment = new Comment(NULL, NULL, NULL, NULL, $id);
        return $comment.delete();
    }
}
