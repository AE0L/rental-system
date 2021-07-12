<?php

require_once 'header.php';

class Contact {
    public $id;
    public $mobile;
    public $landline;

    function __construct($id, $mobile, $landline) {
        $this->id = $id;
        $this->mobile = $mobile;
        $this->landline = $landline;
    }

    static function create($mobile, $landline) {
        $id = generate_db_id('C');

        return new Contact($id, $mobile, $landline);
    }

    static function retrieve($id) {
        $sql = "SELECT * FROM contacts WHERE contacts.contact_id='{$id}'";
        $result = db_query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            return new Contact($row['contact_id'], $row['mobileno'], $row['landline']);
        }

        return false;
    }

    function store() {
        $sql = "INSERT INTO contacts
        (contact_id, mobileno, landline)
        VALUES ('{$this->id}', '{$this->mobile}', '{$this->landline}');";

        return db_query($sql);
    }
}
