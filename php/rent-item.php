<?php

require_once 'header.php';
require_once 'address.php';

class RentItem {
    public $id;
    public $name;
    public $category;
    public Address $address;
    public $description;
    public $price;

    function __construct($id, $name, $category, Address $address, $description, $price) {
        $this->id = $id;
        $this->name = $name;
        $this->category = $category;
        $this->address = $address;
        $this->description = $description;
        $this->price = $price;
    }

    static function create($name, $category, Address $address, $description, $price) {
        $id = generate_db_id('RI');

        return new RentItem($id, $name, $category, $address, $description, $price);
    }

    static function retrieve($id) {
        $sql = "SELECT * FROM rent_item WHERE rent_item.rent_item_id='{$id}'";
        $result = db_query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            return new RentItem($row['rent_item_id'], $row['item_name'], $row['category'], Address::retrieve($row['address_id']), $row['item_description'], $row['price']);
        }

        return false;
    }

    public function store() {
        $sql = "INSERT INTO rent_item
        (rent_item_id, item_name, category, address_id, item_description, price)
        VALUES ('{$this->id}', '{$this->name}', '{$this->category}', '{$this->address->id}', '{$this->description}', '{$this->price}');";

        return db_query($sql);
    }
}

function create_rent_item($item_name, $price, $description, $category, $location, $custom_add, $custom_city) {
    $address = null;

    if ($location === 'custom') {
        $address = Address::create($custom_add, '', $custom_city, 'NCR', 'PH', '');
        $address->store();
    } else {
        $address = User::retrieve($_SESSION['user_id'])->address;
    }

    return RentItem::create($item_name, $category, $address, $description, $price);
}
