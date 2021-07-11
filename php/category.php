<?php
    // INSERT TO category_appliance TABLE
    function create_appliances(Appliance $a) {
        $sql = "INSERT INTO category_appliance (appliance_id, rent_item_id, appliance_type, appliance_condition)
        VALUES ({$a->id}, {$a->rent_item_id}, {$a->type}, {$a->condition})";

        return db_query($sql);
    }

    // INSERT TO category_other TABLE
    function create_others(Other $o) {
        $sql = "INSERT INTO category_other (other_id, rent_item_id, item_type, item_condition)
        VALUES ({$o->id}, {$o->rent_item_id}, {$o->type}, {$o->condition});";

        return db_query($sql);
    }

    // INSERT to category_furniture TABLE
    function create_furniture(Furniture $f) {
        $sql = "INSERT INTO category_furniture (furniture_id, rent_item_id, furniture_type, furniture_condition)
        VALUES ({$f->id}, {$f->rent_item_id}, {$f->type}, {$f->condition});";

        return db_query($sql);
    }

    // INSERT INTO category_male_clothing & category_woman_clothing TABLE
    function create_clothing(Clothing $c) {
        $table = $id_col = "";

        if ($c->gender === 'M') {
            $table = 'category_male_clothing';
            $id_col = 'male_clothing_id';
        } else {
            $table = 'category_woman_clothing';
            $id_col = 'woman_clothing_id';
        }
        
        $sql = "INSERT INTO {$table} 
        ({$id_col}, rent_item_id, cloth_type, cloth_size, cloth_brand, cloth_condition)
        VALUES ({$c->id}, {$c->rent_item_id}, {$c->type}, {$c->size}, {$c->brand}, {$c->condition})";

        return db_query($sql);
    }

    // INSERT INTO category_vehicle TABLE
    function create_vehicle(Vehicle $v) {
        $sql = " INSERT INTO category_vehicle
        (vehicle_id, rent_item_id, vehicle_type, manufacturer, manufactured_year, model, transmission, fuel, license_plate_last_no)
        VALUE ({$v->vehicle_id}, {$v->rent_item_id}, {$v->type}, {$v->manufacturer}, {$v->year}, {$v->model}, {$v->transmission}, {$v->fuel}, {$v->plate});
        ";

        return db_query($sql);
    }

    // INSERT INTO category_property TABLE
    function create_property(Property $p) {
        $sql = " INSERT INTO category_property 
        (property_id, rent_item_id, prop_type, min_floor, max_floor, min_lot, max_lot, bedroom, bathroom, parking, pets)
        VALUE ({$p->id}, {$p->rent_item_id}, {$p->type}, {$p->min_floor}, {$p->max_floor}, {$p->min_lot}, {$p->max_lot}, {$p->bedroom}, {$p->bathroom}, {$p->parking}, {$p->pets});
        ";

        return db_query($sql);
    }


    class Property {
        public $id;
        public $rent_item_id;
        public $type;
        public $min_floor;
        public $max_floor;
        public $min_lot;
        public $max_lot;
        public $bedroom;
        public $bathroom;
        public $parking;
        public $pets;

        function __construct($rent_item_id, $type, $min_floor, $max_floor, $min_lot, $max_lot, $bedroom, $bathroom, $parking, $pets) {
            $this->id = generate_db_id("CP");
            $this->rent_item_id = $rent_item_id;
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
    }

    class Appliance {
        public $id;
        public $rent_item_id;
        public $type;
        public $condition;

        function __construct($rent_item_id, $type, $condition) {
            $this->id = generate_db_id("CA");
            $this->rent_item_id = $rent_item_id;
            $this->type = $type;
            $this->condition = $condition;
        }
    }

    class Other {
        public $id;
        public $rent_item_id;
        public $type;
        public $condition;

        function __construct($rent_item_id, $type, $condition) {
            $this->id = generate_db_id("CO");
            $this->rent_item_id = $rent_item_id;
            $this->type = $type;
            $this->condition = $condition;
        }
    }
    
    class Furniture {
        public $id;
        public $rent_item_id;
        public $type;
        public $condition;

        function __construct($rent_item_id, $type, $condition) {
            $this->id = generate_db_id('CV');
            $this->rent_item_id = $rent_item_id;
            $this->type = $type;
            $this->condition = $condition;
        }
    }

    class Clothing {
        public $id;
        public $rent_item_id;
        public $gender;
        public $type;
        public $size;
        public $brand;
        public $condition;

        function __construct($rent_item_id, $gender, $type, $size, $brand, $condition) {
            if ($gender === 'M') {
                $this->id = generate_db_id('CMC');
            } else {
                $this->id = generate_db_id('CWC');
            }

            $this->rent_item_id = $rent_item_id;
            $this->gender = $gender;
            $this->type = $type;
            $this->size = $size;
            $this->brand = $brand;
            $this->condition = $condition;
        }
    }

    class Vehicle {
        public $id;
        public $rent_item_id;
        public $type;
        public $manufacturer;
        public $year;
        public $model;
        public $transmission;
        public $fuel;
        public $plate;

        function __construct($rent_item_id, $type, $manufacturer, $year, $model, $transmission, $fuel, $plate) {
            $this->id = generate_db_id("CV");
            $this->rent_item_id = $rent_item_id;
            $this->type = $type;
            $this->manufacturer = $manufacturer;
            $this->year = $year;
            $this->model = $model;
            $this->transmission = $transmission;
            $this->fuel = $fuel;
            $this->plate = $plate;
        }
    }
?>
