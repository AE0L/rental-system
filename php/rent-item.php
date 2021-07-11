<?php
    require_once 'header.php';

    function create_rent_item($name, $price, $desc, $category, $location, $custom_add, $custom_city) {
        $rent_item_id = generate_db_id("RI");
        $address_id = null;

        if ($location === 'custom') {
            $address_id = create_address($custom_add, $custom_city);
        } else {
            $address_id = get_user_address($_SESSION['user_id']);
        }

        if (!$address_id) {
            die('invalid address id');
        }

        $sql = "INSERT INTO rent_item (rent_item_id, item_name, category, address_id, item_description, price) VALUES ('{$rent_item_id}', '{$name}', '{$category}', '{$address_id}', '{$desc}', {$price});";

        $result = db_query($sql);

        global $db_conn;

        if (!$result) {
            die($sql.'\n'.$db_conn->error);
        }

        return $rent_item_id;
    }

    function get_user_address($user_id) {
        global $db_conn;
        
        $result = db_query("SELECT address_id FROM users WHERE users.user_id='{$user_id}'");

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            return $row['address_id'];
        } else {
            die("[DB_ERROR]: user_id not found");
            return false;
        }
    }

    function create_address($add, $city) {
        $address_id = generate_db_id('A');
        $addressline_1 = $add;
        $province = 'NCR';
        $country = 'PH';

        $sql = "INSERT INTO address (address_id, addressline_1, city, province, country) 
        VALUES ('{$address_id}', '{$addressline_1}', '{$city}', '{$province}', '{$country}')";

        if (db_query($sql) === TRUE) {
            return $address_id;
        } else {
            die("[DB_ERROR]: error inserting on address table");
            return false;
        }
    }
?>
