<?php

require_once 'header.php';

function upload_preview_pics(RentItem $rent_item) {
    if (!empty($_FILES)) {
        foreach ($_FILES['preview_pics']['tmp_name'] as $key=>$tmp_name) {
            $img_data = addslashes(file_get_contents($_FILES['preview_pics']['tmp_name'][$key]));
            $img_prop = getimagesize($_FILES['preview_pics']['tmp_name'][$key]);
            $preview_pic = PreviewPic::create($rent_item, $img_data, $img_prop['mime']);

            $result = $preview_pic->store();

            if (!$result) {
                global $db_conn;
                die($db_conn->error);
            }
        }

        return true;
    }

    return false;
}

class PreviewPic {
    public $id;
    public RentItem $rent_item;
    public $img;
    public $type;

    function __construct($id, RentItem $rent_item, $img, $type) {
        $this->id = $id;
        $this->rent_item = $rent_item;
        $this->img = $img;
        $this->type = $type;
    }

    static function create(RentItem $rent_item, $img, $type) {
        $id = generate_db_id('PP');

        return new PreviewPic($id, $rent_item, $img, $type);
    }

    static function get_all_rent_item_pics($id) {
        $sql = "SELECT * FROM preview_pics WHERE preview_pics.rent_item_id='{$id}'";
        $result = db_query($sql);
        $pic_array = array();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $pic = new PreviewPic($row['preview_pics_id'], RentItem::retrieve($row['rent_item_id']), $row['preview_img'], $row['img_type']);

                array_push($pic_array, $pic);
            }
        }

        return $pic_array;
    }

    function store() {
        $sql = "INSERT INTO preview_pics 
        (preview_pics_id, rent_item_id, preview_img, img_type) 
        VALUES ('{$this->id}', '{$this->rent_item->id}', '{$this->img}', '{$this->type}')";

        return db_query($sql);
    }
}
