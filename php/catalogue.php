<?php
    function add_rent_item_to_catalogue($user_id, $rent_item_id, $post_date) {
        $seller_id = get_seller_id($user_id);

        if ($seller_id->num_rows <= 0) {
            die("unable to retrieve seller id");
        }

        $cat = new Catalogue($seller_id->fetch_assoc()['seller_id'], $rent_item_id, true, $post_date);

        $sql = "INSERT INTO catalogue
        (catalogue_id, seller_id, rent_item_id, available, post_date)
        VALUES ('{$cat->id}', '{$cat->seller_id}', '{$cat->rent_item_id}', '{$cat->available}', '{$cat->post_date}');";

        $result = db_query($sql);

        if (!$result) {
            die('unable to store catalogue item');
        }
    }

    function get_seller_id($user_id) {
        $sql = "SELECT seller_id FROM seller WHERE seller.user_id='{$user_id}'";

        return db_query($sql);
    }

    class Catalogue {
        public $id;
        public $seller_id;
        public RentItem $rent_item;
        public $available;
        public $post_date;

        function __construct($id, $seller_id, RentItem $rent_item, $available, $post_date) {
            $this->id = is_null($id) ? generate_db_id('CAT') : $id;
            $this->seller_id = $seller_id;
            $this->rent_item = $rent_item;
            $this->available = $available;
            $this->post_date = $post_date;
        }

        static function retrieve_catalogue_item($id) {
            $sql = "SELECT * FROM catalogue WHERE catalogue.catalogue_id='{$id}';";
            $result = db_query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();

                return new Catalogue($row['catalogue_id'], $row['seller_id'], RentItem::retrieve_rent_item($row['rent_item_id']), $row['available'], $row['post_date']);
            }

            return false;
        }

        function store() {
            $sql = "INSERT INTO catalogue
            ()
            VALUES ();";
        }
    }
?>
