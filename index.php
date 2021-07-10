<?php
    session_start();

    // MySQL connection
    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $db = 'rental_system';
    $db_conn = new mysqli($host, $user, $pass, $db);

    if ($db_conn -> connect_errno) {
        echo "Failed to connect to MySQL: " . $db_conn -> connect_error;
        exit();
    }

    // login redirect
    if (!isset($_SESSION['logged_in'])) {
        header('Location: /pages/login');
    } else {
        header('Location: /pages/homepage');
    }

    /*
     * Table ID-generator
     * template: header + ID + 5-digit random number
     * example: U-ID-43562 (user id)
     *          RI-ID-43614 (rental item ID)
     *
     *      IDs       TABLE
     *     ----------------------------------------
     *      U       - user
     *      RI      - rent_item
     *      A       - address 
     *      CON     - contacts
     *      S       - seller
     *      CTL     - catalogue
     *      CTG     - category
     *      CAPP    - category_apppliance
     *      CMC     - category_male_clothing
     *      CWC     - category_woman_clothing
     *      CP      - category_property
     *      CV      - category_vehicle
     */
    function generate_db_id($header) {
        $random = mt_rand(1, 99999);
        $str_rand = str_pad($random, 5, '0', STR_PAD_LEFT);

        return "${header}-ID-${str_rand}";
    }
?>
