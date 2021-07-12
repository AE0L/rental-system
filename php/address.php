<?php

class Address {
    public $id;
    public $line_1;
    public $line_2;
    public $city;
    public $province;
    public $country;
    public $zip;

    function __construct($id, $line_1, $line_2, $city, $province, $country, $zip) {
        $this->id = $id === null ? generate_db_id('A') : $id;
        $this->line_1 = $line_1;
        $this->line_2 = $line_2;
        $this->city = $city;
        $this->province = $province;
        $this->country = $country;
        $this->zip = $zip;
    }

    static function retrieve_address($id) {
        $sql = "SELECT * FROM address WHERE address.id='{$id}'";

        $result = db_query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            return new Address($row['address_id'], $row['addressline_1'], $row['addressline_2'], $row['city'], $row['province'], $row['country'], $row['zip']);
        }
    }

    public function store_to_db() {
        $sql = "INSERT INTO address
        (address_id, addressline_1, addressline_2, city, province, country, zip)
        VALUES ('{$this->id}', '{$this->line_1}', '{$this->line_2}', '{$this->city}', '{$this->province}', '{$this->country}', '{$this->zip}');";

        return db_query($sql);
    }
}
