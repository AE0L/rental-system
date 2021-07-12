<?php
    require_once './header.php';
    require_once './address.php';

    function create_rent_item($name, $price, $desc, $category, $location, $custom_add, $custom_city) {
        $address_id = null;

        if ($location === 'custom') {
            $address_id = new Address(null, $custom_add, '', $custom_city, 'NCR','PH', '');
            $address_id->store_to_db();
        } else {
            $address_id = get_user_address($_SESSION['user_id']);
        }

        if (!$address_id) {
            die('invalid address id');
        }

        $rent_item = new RentItem(null, $name, $category, $address_id, $desc, $price);
        $result = $rent_item->store_to_db();

        if (!$result) {
            die('can\' store rent_item');
        }

        return $rent_item;
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

    class RentItem {
        public $id;
        public $name;
        public $category;
        public Address $address;
        public $description;
        public $price;

        function __construct($id, $name, $category, Address $address, $description, $price) {
            $this->id = $id === NULL ? generate_db_id("RI") : $id;
            $this->name = $name;
            $this->category = $category;
            $this->address = $address;
            $this->description = $description;
            $this->price = $price;
        }

        public function store_to_db() {
            $sql = "INSERT INTO rent_item
            (rent_item_id, item_name, category, address_id, item_description, price)
            VALUES ('{$this->id}', '{$this->name}', '{$this->category}', '{$this->address->id}', '{$this->description}', '{$this->price}');";

            return db_query($sql);
        }

        static public function retrieve_rent_item($rent_item_id) {
            $sql = "SELECT * FROM rent_item WHERE rent_item.rent_item_id='{$rent_item_id}'";
            $result = db_query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                return new RentItem($row['rent_item_id'], $row['item_name'], $row['category'], $row['address_id'], $row['item_description'], $row['price']);
            }
        }
    }
?>
