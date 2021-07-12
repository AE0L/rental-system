<?
    require_once '../php/header.php';
    require_once '../php/item-view.php';
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Rental System</title>

        <link rel="stylesheet" href="../css/global.css">
        <link rel="stylesheet" href="../css/item-view.css">
        <link rel="stylesheet" href="../css/hamburger.css">
    </head>

    <body>
        <?php
            $title = 'Item View';
            include '../partials/navbar.php';
        ?>

        <header>
            <div class="gallery-cont">
                <div class="item-view-return">
                    <span class="fas fa-arrow-left"></span>
                    <span>Return</span>
                </div>
                <div class="gallery-carousel">
                    gallery
                </div>
            </div>

            <div class="name-price-cont">
                <h1 id="item-name">RENTAL ITEM NAME</h1>
                <p id="seller-name">SELLER NAME</p>

                <div class="price-cont">
                    <h2 id="rental-price">RENTAL PRICE</h2>
                    <h4 id="price-per">/ per x</h4>
                </div>
            </div>
        </header>

        <hr class="divider">

        <main>
            <div class="main-placeholder main-features">
                main features
            </div>

            <div class="main-section">
                <h4>Description</h4>
                <p class="description">
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eum, voluptatibus veritatis corrupti,
                    expedita omnis consequatur harum iusto, dolorum laborum explicabo accusantium! Maxime repellat
                    rerum
                    quod doloremque nemo molestias explicabo quae?
                </p>
            </div>

            <div class="main-section contact-cont">
                <h4>Contact Details</h4>
                <div class="contact-details">
                    <span class="fas fa-mobile"></span>
                    <span>Phone</span>
                    <pre>xxxx-xx-xxx</pre>

                    <span class="fas fa-phone"></span>
                    <span>Landline</span>
                    <pre>xxx-xxxx</pre>

                    <span class="fas fa-envelope"></span>
                    <span>E-mail</span>
                    <pre>sample@email.com</pre>
                </div>
            </div>

            <div class="main-section">
                <h4>Location Details</h4>
                <div class="main-placeholder">
                    location details
                </div>
            </div>

            <div class="main-section">
                <h4>Seller Details</h4>
                <div class="main-placeholder">
                    seller details
                </div>
            </div>
        </main>

        <footer>
            BSCS Project 2020
        </footer>

        <script src="../js/hamburger.js"></script>
        <script src="https://kit.fontawesome.com/2b03626812.js" crossorigin="anonymous"></script>
    </body>

</html>
