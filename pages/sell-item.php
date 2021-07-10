<?php
    require_once '../php/header.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $item_name = clean_input($_POST['item_name']);
        $base_price = clean_input($_POST['base_price']);
        $item_description = clean_input($_POST['item_description']);
        $category = clean_input($_POST['category']);
        $location = clean_input($_POST['location']);

        if ($category === 'appliances') {
            $app_type = clean_input($_POST['app-type']);
            $app_cond = clean_input($_POST['app-condition']);
        } else if ($category === 'other') {
            $other_type = clean_input($_POST['other-type']);
            $other_cond = clean_input($_POST['other-condition']);
        } else if ($category === 'furniture') {
            $furn_type = clean_input($_POST['furn-type']);
            $furn_cond = clean_input($_POST['furn-condition']);
        } else if ($category === 'm-cloth') {
            $m_cloth_type = clean_input($_POST['m-cloth-type']);
            $m_cloth_brand = clean_input($_POST['m-cloth-brand']);
            $m_cloth_size = clean_input($_POST['m-cloth-size']);
            $m_cloth_cond = clean_input($_POST['m-cloth-condition']);
        } else if ($category === 'w-cloth') {
            $w_cloth_type = clean_input($_POST['w-cloth-type']);
            $w_cloth_brand = clean_input($_POST['w-cloth-brand']);
            $w_cloth_size = clean_input($_POST['w-cloth-size']);
            $w_cloth_cond = clean_input($_POST['w-cloth-condition']);
        } else if ($category === 'vehicle') {
            $car_type = clean_input($_POST['car-type']);
            $car_year = clean_input($_POST['car-year']);
            $car_manufacturer = clean_input($_POST['car-manufacturer']);
            $car_model = clean_input($_POST['car-model']);
            $car_transmission = clean_input($_POST['car-transmission']);
            $car_fuel = clean_input($_POST['car-fuel']);
            $car_plate = clean_input($_POST['car-plate']);
        } else if ($category === 'property') {
            $prop_type = clean_input($_POST['prop-type']);
            $min_floor = null;
            $max_floor = null;
            $min_lot = null;
            $max_lot = null;
            $bedroom = null;
            $bathroom = null;
            $parking = null;
            $pet = null;

            if (in_array($prop_type, array('Apartment & Condo', 'House & Lot', 'Townhouse', 'Commercial'))) {
                $min_floor = clean_input($_POST['min-floor-area']);
                $max_floor = clean_input($_POST['max-floor-area']);
                $bedroom = clean_input($_POST['bedrooms']);
                $bathroom = clean_input($_POST['bathrooms']);
                $parking = clean_input($_POST['parking']);
            }

            if ($prop_type !== 'Apartment & Condo') {
                $min_lot = clean_input($_POST['min-lot-area']);
                $max_lot = clean_input($_POST['max-lot-area']);
            }

            if (!in_array($prop_type, array('Lot', 'Commercial'))) {
                $pet = clean_input($_POST['allow-pet']);
            }
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
            <form class="rental-item-form" method="post">
                <label for="item-name">Rental Item Name</label>
                <input required type="text" name="item_name" id="item-name" placeholder="Enter item name here...">

                <label for="base-price">Base Price</label>
                <div class="base-price-cont">
                    <span class="base-price-php">&#8369;</span>
                    <input required type="number" name="base_price" id="base-price" placeholder="Enter price here..">
                </div>

                <label for="item-description">Item Description</label>
                <textarea name="item_description" id="item-description" cols="30" rows="10" required
                    placeholder="Enter item description here..."></textarea>

                <label for="pictures">Pictures</label>
                <input required type="file" name="preview_pics[]" id="item-pics" multiple accept="image/*"
                    enctype="multipart/form-data">

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
                <select required name="location" id="location">
                    <option value="" disabled selected>- location -</option>
                    <?php
                        $cities = array('Caloocan', 'Las Pinas', 'Makati', 'Mandaluyong', 'Manila', 'Marikina', 'Muntinlupa', 'Navotas', 'Paranaque', 'Pasay', 'Pasig', 'Quezon', 'San Juan', 'Taguig', 'Velenzuela');

                        foreach ($cities as $city) {
                            echo "<option value=\"{$city} City\">{$city} City</option>";
                        }
                    ?>
                </select>

                <div class="form-btn-cont">
                    <input id="clear" class="btn" type="reset" value="Clear">
                    <button class="btn" type="submit" formmethod="post">Post</button>
                </div>
            </form>
        </main>

        <?php include '../partials/footer.php'; ?>

        <script src="../js/hamburger.js"></script>
        <script src="../js/sell-item.js"></script>
        <script src="https://kit.fontawesome.com/2b03626812.js" crossorigin="anonymous"></script>
    </body>

</html>
