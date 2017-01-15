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
        if ($_SESSION['username'] && $id) {
            if ($_SESSION['username'] === 'Admin') {
                $comment = new Comment(NULL, NULL, NULL, NULL, NULL, $id);
                return $comment->delete();
            }
            else {
                $comment = new Comment(NULL, NULL, NULL, $_SESSION['username'], NULL, $id);
                $result = $comment.search();
                if ($result->num_rows === 1) {
                    return $comment->delete();
                }
                else {
                    return -1;
                }
            }
        else {
            return -1;
        }
    }
}
