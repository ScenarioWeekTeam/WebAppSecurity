<?php
class Account extends Model {
    function __construct($user, $comment, $id) {
        parent::__construct();
        $this->initTable();
        $this->user = $user;
        $this->comment = $comment;
        $this->id = $id
    }

    function save() {
        if ($this->id) {
            if (!$this->user || !$this->comment) {
                $this->find();
            }
            $sql = "UPDATE " . $this->_table . " SET user=" . $this->user . ' comment="' . $this->comment . '" WHERE id=' . $this->id;
            return $this->query($sql);
        }
        else {
            if ($this->user && $this->comment) {
                $sql = "INSERT INTO " . $this->_table . ' (user, comment) VALUES ("' . $this->user . "', '" . $this->comment . '")';
                return $this->query($sql);
            }
            else {
                return -1;
            }
        }
    }

    function delete() {
        if ($this->id) {
            $sql = "DELETE FROM " . $this->_table . " WHERE id=" . $this->id;
            return $this->query($sql);
        }
        else {
            return -1;
        }
    }

    function find() {
        if ($this->id) {
            if (!$this->user && !$this->comment) {
                $sql = "SELECT user, comment FROM " . $this->_table . " WHERE id=" . $this->id;
                $result = $this->query($sql);
            }
            else if (!$this->user) {
                $sql = "SELECT user FROM " . $this->_table . " WHERE id=" . $this->id;
                $result = $this->query($sql);
            }
            else if (!$this->comment) {
                $sql = "SELECT comment FROM " . $this->_table . " WHERE id=" . $this->id;
                $result = $this->query($sql);
            }
            else {
                return;
            }
        }
        else if ($this->user && $this->comment) {
            $sql = "SELECT id FROM " . $this->_table . " WHERE user=" . $this->user . ' comment="' . $this->comment . '"';
            $result = $this->query($sql);
        }
        else {
            return -1;
        }

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if ($row["id"]) {
                $this->id = $row["id"];
            }
            if ($row["user"]) {
                $this->user = $row["user"];
            }
            if ($row["comment"]) {
                $this->comment = $row["comment"];
            }
        }
        else {
            return -1;
        }
    }

    function search() {
        $sql = "SELECT id, user, comment FROM " . $this->_table
        if ($this->id || $this->user || $this->comment) {
            $sql = $sql . " WHERE "
            if ($this->id) {
                $sql = $sql . "id=" . $this->id . " ";
            }
            if ($this->user) {
                $sql = $sql . "user=" . $this->user . " ";
            }
            if ($this->comment) {
                $sql = $sql . "comment=" . $this->comment;
            }
        }
        return $this->query($sql);
    }

    function initTable() {
        $sql = "CREATE TABLE " . $this->_table . " (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        user INT(6) UNSIGNED NOT NULL,
        comment VARCHAR(50) NOT NULL
        )";
        return $this->query($sql);
    }

    function getUser() {
        return $this->user;
    }

    function getComment() {
        return $this->comment();
    }
}
