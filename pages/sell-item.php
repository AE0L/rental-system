<?php
    function option_tag($array) {
        foreach($array as $item) {
            echo "<option value=\"{$item}\">{$item}</option>";
        }
    }
?>
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
            $title = "Rent Item";
            include '../partials/navbar.php';
        ?>

        <header>
            <h2><span class="fas fa-arrow-left"></span>Post Rental Item</h2>
        </header>

        <main>
            <form class="rental-item-form" action="">
                <label for="item-name">Rental Item Name</label>
                <input required type="text" name="item-name" id="item-name" placeholder="Enter item name here...">

                <label for="base-price">Base Price</label>
                <div class="base-price-cont">
                    <span class="base-price-php">&#8369;</span>
                    <input required type="number" name="base-price" id="base-price" placeholder="Enter price here..">
                </div>

                <label for="item-description">Item Description</label>
                <textarea name="item-description" id="item-description" cols="30" rows="10" required
                    placeholder="Enter item description here..."></textarea>

                <label for="pictures">Pictures</label>
                <input required type="file" name="preview-pics" id="item-pics" multiple accept="image/*">

                <label for="category">Category</label>
                <select name="category" id="category" required>
                    <option value="" disabled selected>- category -</option>
                    <option value="property">Property/Estate</option>
                    <option value="vehicle">Vehicle</option>
                    <option value="furniture">Furniture</option>
                    <optgroup label="Clothing/Apparel">
                        <option value="m-cloth">Men's Wear</option>
                        <option value="w-cloth">Women's Wear</option>
                    </optgroup>
                    <option value="appliances">TV & Home Appliances</option>
                    <option value="other">Others</option>
                </select>

                <label for="features">Features</label>
                <div id="temp-features-cont">
                    Select a category first
                </div>
                <?php
                    include '../partials/sell-item-features/appliances.php';
                    include '../partials/sell-item-features/furnitures.php';
                    include '../partials/sell-item-features/properties.php';
                    include '../partials/sell-item-features/vehicles.php';
                    include '../partials/sell-item-features/m-clothing.php';
                    include '../partials/sell-item-features/w-clothing.php';
                    include '../partials/sell-item-features/others.php';
                ?>

                <label>Location</label>
                <select required name="prop-location" id="prop-location">
                    <option value="" disabled selected>- location -</option>
                    <?php
                        $cities = Array('Caloocan', 'Las Pinas', 'Makati', 'Mandaluyong', 'Manila', 'Marikina', 'Muntinlupa', 'Navotas', 'Paranaque', 'Pasay', 'Pasig', 'Quezon', 'San Juan', 'Taguig', 'Velenzuela');

                        foreach ($cities as $city) {
                            echo "<option value=\"{$city} City\">{$city} City</option>";
                        }
                    ?>
                </select>

                <div class="form-btn-cont">
                    <input id="clear" class="btn" type="reset" value="Clear">
                    <input class="btn" type="submit" value="Post">
                </div>
            </form>
        </main>

        <?php include '../partials/footer.php' ?>

        <script src="../js/hamburger.js"></script>
        <script src="../js/sell-item.js"></script>
        <script src="https://kit.fontawesome.com/2b03626812.js" crossorigin="anonymous"></script>
    </body>

</html>
