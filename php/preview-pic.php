<?php
    function upload_preview_pics($rent_item_id) {
        if (!empty($_FILES)) {
            foreach ($_FILES['preview_pics']['tmp_name'] as $key=>$tmp_name) {
                $img_data = addslashes(file_get_contents($_FILES['preview_pics']['tmp_name'][$key]));
                $img_prop = getimagesize($_FILES['preview_pics']['tmp_name'][$key]);
                $preview_pics_id = generate_db_id('PP');
                $sql = "INSERT INTO preview_pics (preview_pics_id, rent_item_id, preview_img, img_type) VALUES ('{$preview_pics_id}', '{$rent_item_id}', '{$img_data}', '{$img_prop['mime']}')";

                if (!db_query($sql)) {
                    global $db_conn;
                    die($db_conn->error);
                }
            }

            return true;
        }

        die('is_uploaded_file()');
    }
?>
