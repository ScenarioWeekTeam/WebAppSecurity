<?php
class Account extends Model {
    function __construct($username, $password, $id) {
        parent::__construct();
        $this->initTable();
        $this->username = $username;
        $this->password = $password;
        $this->id = $id
        if ($this->id) {
            if (!$this->username)
        }
    }

    function save() {
        if ($this->id) {
            if (!$this->username || !$this->password) {
                $this->find();
            }
            $sql = "UPDATE " . $this->_table . " SET username=" . $this->username . " password=" . $this->password . " WHERE id=" . $this->id;
            return $this->query($sql);
        }
        else {
            if ($this->username && $this->password) {
                $sql = "INSERT INTO " . $this->_table . " (username, password) VALUES ('" . $this->username . "', '" . $this->password . "')";
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
            if (!$this->username && !$this->password) {
                $sql = "SELECT username, password FROM " . $this->_table . " WHERE id=" . $this->id;
                $result = $this->query($sql);
            }
            else if (!$this->username) {
                $sql = "SELECT username FROM " . $this->_table . " WHERE id=" . $this->id;
                $result = $this->query($sql);
            }
            else if (!$this->password) {
                $sql = "SELECT password FROM " . $this->_table . " WHERE id=" . $this->id;
                $result = $this->query($sql);
            }
            else {
                return;
            }
        }
        else if ($this->username && $this->password) {
            $sql = "SELECT id FROM " . $this->_table . " WHERE username=" . $this->username . " password=" . $this->password;
            $result = $this->query($sql);
        }
        else if ($this->username) {
            $sql = "SELECT id, password FROM " . $this->_table . " WHERE username=" . $this->username;
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
            if ($row["username"]) {
                $this->username = $row["username"];
            }
            if ($row["password"]) {
                $this->password = $row["password"];
            }
        }
        else {
            return -1;
        }
    }

    function search() {
        $sql = "SELECT id, username FROM " . $this->_table
        if ($this->id || $this->username || $this->password) {
            $sql = $sql . " WHERE "
            if ($this->id) {
                $sql = $sql . "id=" . $this->id . " ";
            }
            if ($this->username) {
                $sql = $sql . "username=" . $this->username . " ";
            }
            if ($this->password) {
                $sql = $sql . "password=" . $this->password;
            }
        }
        return $this->query($sql);
    }

    function initTable() {
        $sql = "CREATE TABLE " . $this->_table . " (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(30) NOT NULL,
        password VARCHAR(30) NOT NULL
        )";
        return $this->query($sql);
    }
}
