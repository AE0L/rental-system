<?php

require_once 'header.php';
require_once 'preview-pic.php';

db_connect();

if (isset($_GET['image_id'])) {
    $preview_pic = PreviewPic::retrieve($_GET['image_id']);

    header('Content-Type: ' . $preview_pic->type);
    echo $preview_pic->img;
}

db_close();
