<?php

class CommentsController {
    function __construct() {
        session_start();
    }

    function __destruct() {

    }

    function addComment($comment) {
        if ($_SESSION[user]) {
            $comment = new Comment($user, $comment);
            return $comment->save();
        }
        else {
            return -1;
        }
    }

    function deleteComment($id) {
        $comment = new Comment(NULL, NULL, $id);
        return $comment.delete();
    }

    function editComment($id, $comment) {
        $oldComment = new Comment(NULL, NULL, $id);
        if ($oldComment->find != -1) {
            if ($_SESSION['user'] === $oldComment->getUser()) {
                $newComment = new Comment($_SESSION['user'], $comment, $id);
                $newComment->save();
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
