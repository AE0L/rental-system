<?php

require_once 'header.php';
require_once 'seller.php';
require_once 'rent-item.php';

class Catalogue {
    public $id;
    public Seller $seller;
    public RentItem $rent_item;
    public $available;
    public $post_date;

    function __construct($id, Seller $seller, RentItem $rent_item, $available, $post_date) {
        $this->id = $id;
        $this->seller = $seller;
        $this->rent_item = $rent_item;
        $this->available = $available;
        $this->post_date = $post_date;
    }

    static function create(Seller $seller, RentItem $rent_item, $available, $post_date) {
        $id = generate_db_id("CAT");

        return new Catalogue($id, $seller, $rent_item, $available, $post_date);
    }

    static function retrieve($id) {
        $sql = "SELECT * FROM catalogue WHERE catalogue.catalogue_id='{$id}';";
        $result = db_query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            return new Catalogue($row['catalogue_id'], Seller::retrieve($row['seller_id']), RentItem::retrieve($row['rent_item_id']), $row['available'], $row['post_date']);
        }

        return false;
    }

    function store() {
        $sql = "INSERT INTO catalogue
        (catalogue_id, seller_id, rent_item_id, available, post_date)
        VALUES ('{$this->id}', '{$this->seller->id}', '{$this->rent_item->id}', '{$this->available}', '{$this->post_date}');";

        return db_query($sql);
    }
}
