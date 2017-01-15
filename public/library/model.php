<?php

require $root . 'library/database.php';
require $root . '../config/config.php';

class Model extends Database {
    protected $_model;

    function __construct() {
        $this->connect(DB_SERVER,DB_USER,DB_PASS,DB_DATABASE);
        $this->_model = get_class($this);
        $this->_table = strtolower($this->_model)."s";
    }

    function __destruct() {
        $this->disconnect();
    }
}
