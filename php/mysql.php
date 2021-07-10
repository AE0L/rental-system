<?php
    // MySQL connection
    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $db = 'rental_system';
    $db_conn = new mysqli($host, $user, $pass, $db);

    
    function db_connect() {
        global $host;
        global $user;
        global $pass;
        global $db;
        global $db_conn;

        if (!$db_conn->ping()) {
            $db_conn->connect($host, $user, $pass, $db);
        }

        if ($db_conn->connect_errno) {
            echo "Failed to connect to MySQL: " . $db_conn -> connect_error;
            exit();
        }
    }

    function db_close() {
        global $db_conn;

        $db_conn->close();
    }

    function db_query($sql) {
        global $db_conn;

        return $db_conn->query($sql);
    }
?>
