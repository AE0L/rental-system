<?php
    include './php/header.php';

    // login redirect
    if (!isset($_SESSION['logged_in'])) {
        header('Location: /pages/login');
    } else {
        header('Location: /pages/homepage');
    }


?>
