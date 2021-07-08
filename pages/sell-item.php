<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Rental System</title>


        <link rel="stylesheet" href="../css/global.css">
        <link rel="stylesheet" href="../css/hamburger.css">
        <link rel="stylesheet" href="../css/sell-item.css">
    </head>

    <body>
        <?php
            include '../partials/navbar.php';
        ?>

        <header>
            <h2><span class="fas fa-arrow-left"></span>Post Rental Item</h2>
        </header>

        <main>
            <form class="rental-item-form" action="">
                <label for="item-name">Rental Item Name</label>
                <input type="text" name="item-name" id="item-name">

                <label for="base-price">Base Price</label>
                <input type="number" name="base-price" id="base-price">

                <label for="payment-frequency">Frequency of payment</label>
                <select name="payment-frequency" id="payment-frequency">
                    <option disabled selected>- frequency -</option>
                    <option value="day">day</option>
                    <option value="month">month</option>
                    <option value="quarter">quarter</option>
                    <option value="year">year</option>
                    <option value="custom">custom</option>
                </select>

                <label for="item-description">Item Description</label>
                <textarea name="item-description" id="item-description" cols="30" rows="10"></textarea>

                <label for="pictures">Pictures</label>
                <div id="picture-gallery"></div>

                <label for="category">Category</label>
                <select name="category" id="category">
                    <option disabled selected>- category -</option>
                </select>


                <label for="sub-category">Sub-Category</label>
                <select name="sub-category" id="sub-category">
                    <option disabled selected>- sub-category -</option>
                </select>

                <label for="features">Features</label>
                <div id="features-cont"></div>

                <label for="location">Location</label>
                <select name="location" id="location">
                    <option selected disabled>- location -</option>
                    <option value="users">profile address</option>
                    <option value="custom">custom</option>
                </select>

                <label for="custom-address">Custom Address</label>
                <textarea name="custom-address" id="custom-address" cols="30" rows="10"></textarea>

                <div class="form-btn-cont">
                    <input class="btn" type="reset" value="Clear">
                    <input class="btn" type="submit" value="Post">
                </div>
            </form>
        </main>

        <footer>
            BSCS Project 2020
        </footer>

        <script src="../js/hamburger.js"></script>
        <script src="https://kit.fontawesome.com/2b03626812.js" crossorigin="anonymous"></script>
    </body>

</html>
