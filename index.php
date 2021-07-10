<?php
    session_start();

    // MySQL connection
    $mysqli = new mysqli('localhost', 'root', '', 'rental_system');

    if ($mysqli -> connect_errno) {
        echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
        exit();
    }

    // login redirect
    if (!isset($_SESSION['logged_in'])) {
        header('Location: /pages/login');
    } else {
        header('Location: /pages/homepage');
    }
?>
