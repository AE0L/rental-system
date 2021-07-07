<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Rental System</title>

        <link rel="stylesheet" href="./css/global.css">
        <link rel="stylesheet" href="./css/hamburger.css">
    </head>

    <body>

        <?php
            $title = 'Home';
            include('./partials/navbar.php');
        ?>
        
        <main>
            <a href="./pages/item-view">item-view</a>
            <a href="./pages/sell-item">sell-item</a>
            <a href="./pages/homepage">sell-item</a>
        </main>

        <footer>
            BSCS Project 2020
        </footer>

        <script src="./js/hamburger.js"></script>
        <script src="https://kit.fontawesome.com/2b03626812.js" crossorigin="anonymous"></script>
    </body>

</html>
