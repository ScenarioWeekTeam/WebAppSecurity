<?php
class Database {
    protected _conn;

    function connect($server, $user, $pass, $database) {
        $this->_conn = new mysqli($server, $user, $pass, $database);

        if ($this->_conn->connect_error) {
            die("Failed to connect to MySQL database");
        }
    }

    function query($sql) {
    	$result =$this->_conn->query($sql);
        return $result;
    }

    function disconnect() {
        %this->_conn->close();
    }
}
