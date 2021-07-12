<?php

require_once 'header.php';
require_once 'user.php';

class Seller {
    public $id;
    public $user;

    function __construct($id, User $user) {
        $this->id = $id;
        $this->user = $user;
    }

    static function create(User $user) {
        $id = generate_db_id("S");

        return new Seller($id, $user);
    }

    static function retrieve($id) {
        $sql = "SELECT * FROM seller WHERE seller.seller_id='{$id}'";
        $result = db_query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            return new Seller($row['seller_id'], User::retrieve($row['user_id']));
        }

        return false;
    }

    static function retrieve_by_user($id) {
        $sql = "SELECT * FROM seller WHERE seller.user_id='{$id}'";
        $result = db_query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            return new Seller($row['seller_id'], User::retrieve($row['user_id']));
        }

        return false;
    }

    function store() {
        $sql = "INSERT INTO seller
        (seller_id, user_id)
        VALUES ('{$this->id}', '{$this->user->id}');";

        return db_query($sql);
    }
}
