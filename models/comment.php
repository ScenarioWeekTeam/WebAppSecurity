<?php

require $root . 'library/model.php';

class Comment extends Model {
    function __construct($name, $email, $phonenumber, $course, $comment, $id) {
        parent::__construct();
        $this->initTable();
        $this->name = $name;
        $this->email = $email;
        $this->phonenumber = $phonenumber;
        $this->course = $course;
        $this->comment = $comment;
        $this->id = $id;
    }

    function save() {
        if ($this->name && $this->email && $this->phonenumber && $this->course && $this->comment) {
            $sql = "INSERT INTO " . $this->_table . ' (name, email, phonenumber, course, comment) VALUES ("' . $this->name . '", "' .  $this->email . '", "' . $this->phonenumber . '", "' . $this->course . '", "' . $this->comment . '")';
            return $this->query($sql);
        }
        else {
            return -1;
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

    function search() {
        $sql = "SELECT id, name, email, phonenumber, course, comment FROM " . $this->_table;
        if ($this->id || $this->name || $this->email || $this->phonenumber || $this->course || $this->comment) {
            $sql = $sql . " WHERE ";
            if ($this->id) {
                $sql = $sql . "id=" . $this->id . " ";
            }
            if ($this->name) {
                $sql = $sql . "name=" . $this->name . " ";
            }
            if ($this->email) {
                $sql = $sql . "email=" . $this->email . " ";
            }
            if ($this->phonenumber) {
                $sql = $sql . "phonenumber=" . $this->phonenumber . " ";
            }
            if ($this->course) {
                $sql = $sql . "course=" . $this->course . " ";
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
        name VARCHAR(30) NOT NULL,
        email VARCHAR(30) NOT NULL,
        phonenumber VARCHAR(30) NOT NULL,
        course VARCHAR(30) NOT NULL,
        comment VARCHAR(50) NOT NULL
        )";
        return $this->query($sql);
    }

    function getName() {
        return $this->name;
    }
    
    function getEmail() {
        return $this->email;
    }
    
    function getPhonenumber() {
        return $this->phonenumber;
    }
    
    function getCourse() {
        return $this->course;
    }

    function getComment() {
        return $this->comment;
    }
    
    function getId() {
        return $this->id;
    }
}
