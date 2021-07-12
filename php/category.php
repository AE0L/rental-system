<?php

    require_once 'header.php';
    require_once 'rent-item.php';

    class Property {
        public $id;
        public $rent_item;
        public $type;
        public $min_floor;
        public $max_floor;
        public $min_lot;
        public $max_lot;
        public $bedroom;
        public $bathroom;
        public $parking;
        public $pets;

        function __construct($id, RentItem $rent_item, $type, $min_floor, $max_floor, $min_lot, $max_lot, $bedroom, $bathroom, $parking, $pets) {
            $this->id = $id;
            $this->rent_item = $rent_item;
            $this->type = $type;
            $this->min_floor = $min_floor;
            $this->max_floor = $max_floor;
            $this->min_lot = $min_lot;
            $this->max_lot = $max_lot;
            $this->bedroom = $bedroom;
            $this->bathroom = $bathroom;
            $this->parking = $parking;
            $this->pets = $pets;
        }

        static function create(RentItem $rent_item, $type, $min_floor, $max_floor, $min_lot, $max_lot, $bedroom, $bathroom, $parking, $pets) {
            $id = generate_db_id('CP');

            return new Property($id, $rent_item, $type, $min_floor, $max_floor, $min_lot, $max_lot, $bedroom, $bathroom, $parking, $pets);
        }

        static function retrieve_by_rent_item($id) {
            $sql = "SELECT * FROM category_property WHERE category_property.rent_item_id='{$id}'";
            $result = db_query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();

                return new Property($row['property_id'], RentItem::retrieve($row['rent_item_id']), $row['prop_type'], $row['min_floor'], $row['max_floor'], $row['min_lot'], $row['max_lot'], $row['bedroom'], $row['bathroom'], $row['parking'], $row['pets']);
            }

            return false;
        }

        function store() {
            $sql = " INSERT INTO category_property 
            (property_id, rent_item_id, prop_type, min_floor, max_floor, min_lot, max_lot, bedroom, bathroom, parking, pets)
            VALUE ('{$this->id}', '{$this->rent_item->id}', '{$this->type}', '{$this->min_floor}', '{$this->max_floor}', '{$this->min_lot}', '{$this->max_lot}', '{$this->bedroom}', '{$this->bathroom}', '{$this->parking}', '{$this->pets}');";

            return db_query($sql);
        }
    }

    class Appliance {
        public $id;
        public RentItem $rent_item;
        public $type;
        public $condition;

        function __construct($id, RentItem $rent_item, $type, $condition) {
            $this->id = $id;
            $this->rent_item = $rent_item;
            $this->type = $type;
            $this->condition = $condition;
        }

        static function create(RentItem $rent_item, $type, $condition) {
            $id = generate_db_id('CA');

            return new Appliance($id, $rent_item, $type, $condition);
        }

        static function retrieve_by_rent_item($id) {
            $sql = "SELECT * FROM category_appliance WHERE category_appliance.rent_item_id='{$id}'";
            $result = db_query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();

                return new Appliance($row['appliance_id'], RentItem::retrieve($row['rent_item_id']), $row['appliance_type'], $row['appliance_condition']);
            }

            return false;
        }

        function store() {
            $sql = "INSERT INTO category_appliance (appliance_id, rent_item_id, appliance_type, appliance_condition)
            VALUES ('{$this->id}', '{$this->rent_item->id}', '{$this->type}', '{$this->condition}')";

            return db_query($sql);
        }
    }

    class Other {
        public $id;
        public RentItem $rent_item;
        public $type;
        public $condition;

        function __construct($id, RentItem $rent_item, $type, $condition) {
            $this->id = $id;
            $this->rent_item = $rent_item;
            $this->type = $type;
            $this->condition = $condition;
        }

        static function create(RentItem $rent_item, $type, $condition) {
            $id = generate_db_id('CO');

            return new Other($id, $rent_item, $type, $condition);
        }

        static function retrieve_by_rent_item($id) {
            $sql = "SELECT * FROM category_other WHERE category_other.rent_item_id='{$id}'";
            $result = db_query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();

                return new Other($row['other_id'], RentItem::retrieve($row['rent_item_id']), $row['item_type'], $row['item_condition']);
            }

            return false;
        }

        function store() {
            $sql = "INSERT INTO category_other (other_id, rent_item_id, item_type, item_condition)
            VALUES ('{$this->id}', '{$this->rent_item->id}', '{$this->type}', '{$this->condition}');";

            return db_query($sql);
        }
    }
    
    class Furniture {
        public $id;
        public RentItem $rent_item;
        public $type;
        public $condition;

        function __construct($id, RentItem $rent_item, $type, $condition) {
            $this->id = $id;
            $this->rent_item = $rent_item;
            $this->type = $type;
            $this->condition = $condition;
        }

        static function create(RentItem $rent_item, $type, $condition) {
            $id = generate_db_id('CF');

            return new Furniture($id, $rent_item, $type, $condition);
        }

        static function retrieve_by_rent_item($id) {
            $sql = "SELECT * FROM category_furniture WHERE category_furniture.rent_item_id='{$id}'";
            $result = db_query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();

                return new Furniture($row['furniture_id'], RentItem::retrieve($row['rent_item_id']), $row['furniture_type'], $row['furniture_condition']);
            }

            return false;
        }

        function store() {
            $sql = "INSERT INTO category_furniture (furniture_id, rent_item_id, furniture_type, furniture_condition)
            VALUES ('{$this->id}', '{$this->rent_item->id}', '{$this->type}', '{$this->condition}');";

            return db_query($sql);
        }
    }

    class Clothing {
        public $id;
        public RentItem $rent_item;
        public $gender;
        public $type;
        public $size;
        public $brand;
        public $condition;

        function __construct($id, RentItem $rent_item, $gender, $type, $size, $brand, $condition) {
            $this->id = $id;
            $this->rent_item = $rent_item;
            $this->gender = $gender;
            $this->type = $type;
            $this->size = $size;
            $this->brand = $brand;
            $this->condition = $condition;
        }

        static function create(RentItem $rent_item, $gender, $type, $size, $brand, $condition) {
            $id = "";

            if ($gender === 'M') {
                $id = generate_db_id('CMC');
            } else {
                $id = generate_db_id('CWC');
            }

            return new Clothing($id, $rent_item, $gender, $type, $size, $brand, $condition);
        }

        static function retrieve_by_rent_item($id, $gender) {
            $table = $id_col = "";

            if ($gender === 'M') {
                $table = 'category_male_clothing';
                $id_col = 'male_clothing_id';
            } else {
                $table = 'category_woman_clothing';
                $id_col = 'woman_clothing_id';
            }

            $sql = "SELECT * FROM {$table} WHERE {$table}.rent_item_id='{$id}'";
            $result = db_query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();

                return new Clothing($row[$id_col], RentItem::retrieve($row['rent_item_id']), $gender, $row['cloth_type'], $row['cloth_size'], $row['cloth_brand'], $row['cloth_condition']);
            }

            return false;
        }

        function store() {
            $table = $id_col = "";

            if ($this->gender === 'M') {
                $table = 'category_male_clothing';
                $id_col = 'male_clothing_id';
            } else {
                $table = 'category_woman_clothing';
                $id_col = 'woman_clothing_id';
            }
            
            $sql = "INSERT INTO {$table} 
            ({$id_col}, rent_item_id, cloth_type, cloth_size, cloth_brand, cloth_condition)
            VALUES ('{$this->id}', '{$this->rent_item->id}', '{$this->type}', '{$this->size}', '{$this->brand}', '{$this->condition}')";

            return db_query($sql);
        }
    }

    class Vehicle {
        public $id;
        public RentItem $rent_item;
        public $type;
        public $manufacturer;
        public $year;
        public $model;
        public $transmission;
        public $fuel;
        public $plate;

        function __construct($id, RentItem $rent_item, $type, $manufacturer, $year, $model, $transmission, $fuel, $plate) {
            $this->id = $id;
            $this->rent_item = $rent_item;
            $this->type = $type;
            $this->manufacturer = $manufacturer;
            $this->year = $year;
            $this->model = $model;
            $this->transmission = $transmission;
            $this->fuel = $fuel;
            $this->plate = $plate;
        }

        static function create(RentItem $rent_item, $type, $manufacturer, $year, $model, $transmission, $fuel, $plate) {
            $id = generate_db_id('CV');

            return new Vehicle($id, $rent_item, $type, $manufacturer, $year, $model, $transmission, $fuel, $plate);
        }

        static function retrieve_by_rent_item($id) {
            $sql = "SELECT * FROM category_vehicle WHERE category_vehicle.rent_item_id='{$id}'";
            $result = db_query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();

                return new Vehicle($row['vehicle_id'], RentItem::retrieve($row['rent_item_id']), $row['vehicle_type'], $row['manufacturer'], $row['manufactured_year'], $row['model'], $row['transmission'], $row['fuel'], $row['license_plate_last_no']);
            }

            return false;
        }

        function store() {
            $sql = " INSERT INTO category_vehicle
            (vehicle_id, rent_item_id, vehicle_type, manufacturer, manufactured_year, model, transmission, fuel, license_plate_last_no)
            VALUE ('{$this->id}', '{$this->rent_item->id}', '{$this->type}', '{$this->manufacturer}', '{$this->year}', '{$this->model}', '{$this->transmission}', '{$this->fuel}', '{$this->plate}');
            ";

            return db_query($sql);
        }
    }
?>
