<?php
    require_once '../php/header.php';
    require_once '../php/rent-item.php';
    require_once '../php/category.php';
    require_once '../php/catalogue.php';
    require_once '../php/preview-pic.php';

    // TESTING
    // $_SESSION['user_id'] = 'U-ID-12345';
    // =======

    db_connect();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        upload_rent_item();
    }

    function upload_rent_item() {
        $item_name = clean_input($_POST['item_name']);
        $base_price = clean_input($_POST['base_price']);
        $item_description = clean_input($_POST['item_description']);
        $category = clean_input($_POST['category']);
        $location = clean_input($_POST['location']);
        $custom_add = null;
        $custom_city = null;

        if ($location === 'custom') {
            $custom_add = clean_input($_POST['custom-loc-add']);
            $custom_city = clean_input($_POST['custom-loc-city']);
        }

        $rent_item_id = create_rent_item($item_name, $base_price, $item_description, $category, $location, $custom_add, $custom_city);

        if(!$rent_item_id) {
            die('invalid rent item id');
            return false;
        }

        if ($category === 'appliances') {
            $app_type = clean_input($_POST['app-type']);
            $app_cond = clean_input($_POST['app-condition']);

            $appliance = new Appliance($rent_item_id, $app_type, $app_cond);
            create_appliances($appliance);
        } else if ($category === 'other') {
            $other_type = clean_input($_POST['other-type']);
            $other_cond = clean_input($_POST['other-condition']);

            $other = new Other($rent_item_id, $other_type, $other_cond);
            create_others($other);
        } else if ($category === 'furniture') {
            $furn_type = clean_input($_POST['furn-type']);
            $furn_cond = clean_input($_POST['furn-condition']);

            $furniture = new Furniture($rent_item_id, $furn_type, $furn_cond);
            create_furniture($furniture);
        } else if ($category === 'm-cloth') {
            $m_cloth_type = clean_input($_POST['m-cloth-type']);
            $m_cloth_brand = clean_input($_POST['m-cloth-brand']);
            $m_cloth_size = clean_input($_POST['m-cloth-size']);
            $m_cloth_cond = clean_input($_POST['m-cloth-condition']);

            $clothing = new Clothing($rent_item_id, 'M', $m_cloth_type, $m_cloth_size, $m_cloth_brand, $m_cloth_cond);
            create_clothing($clothing);
        } else if ($category === 'w-cloth') {
            $w_cloth_type = clean_input($_POST['w-cloth-type']);
            $w_cloth_brand = clean_input($_POST['w-cloth-brand']);
            $w_cloth_size = clean_input($_POST['w-cloth-size']);
            $w_cloth_cond = clean_input($_POST['w-cloth-condition']);

            $clothing = new Clothing($rent_item_id, 'W', $w_cloth_type, $w_cloth_size, $w_cloth_brand, $w_cloth_cond);
            create_clothing($clothing);
        } else if ($category === 'vehicle') {
            $car_type = clean_input($_POST['car-type']);
            $car_year = clean_input($_POST['car-year']);
            $car_manufacturer = clean_input($_POST['car-manufacturer']);
            $car_model = clean_input($_POST['car-model']);
            $car_transmission = clean_input($_POST['car-transmission']);
            $car_fuel = clean_input($_POST['car-fuel']);
            $car_plate = clean_input($_POST['car-plate']);

            $vehicle = new Vehicle($rent_item_id, $car_type, $car_manufacturer, $car_year, $car_model, $car_transmission, $car_fuel, $car_plate);
            create_vehicle($vehicle);
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

            $property = new Property($rent_item_id, $prop_type, $min_floor, $max_floor, $min_lot, $max_lot, $bedroom, $bathroom, $parking, $pet);
            create_property($property);
        }

        add_rent_item_to_catalogue($_SESSION['user_id'], $rent_item_id, date("Y-m-d H:i:s"));
        upload_preview_pics($rent_item_id);
    }

    db_close();
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
            <form class="rental-item-form" method="post" enctype="multipart/form-data">
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
                <input required type="file" name="preview_pics[]" id="item-pics" multiple accept="image/*">

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
                    <option disabled selected value="">- Location -</option>
                    <option value="user">Your Address</option>
                    <option value="custom">Custom Address</option>
                </select>

                <label for="custom-loc" id="custom-loc-label">Custom Location</label>
                <div id="custom-loc-cont" class="custom-loc-cont">
                    <label>Custom Address</label>
                    <textarea name="custom-loc-add" id="custom-loc-add" cols="30" rows="3"
                        placeholder="Enter custom address here..."></textarea>

                    <label>City</label>
                    <select required name="custom-loc-city" id="custom-loc-city">
                        <option value="" disabled selected>- City -</option>
                        <?php
                            $cities = array('Caloocan', 'Las Pinas', 'Makati', 'Mandaluyong', 'Manila', 'Marikina', 'Muntinlupa', 'Navotas', 'Paranaque', 'Pasay', 'Pasig', 'Quezon', 'San Juan', 'Taguig', 'Velenzuela');

                            foreach ($cities as $city) {
                                echo "<option value=\"{$city} City\">{$city} City</option>";
                            }
                        ?>
                    </select>
                </div>
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
