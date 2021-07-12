<?php

require_once 'header.php';
require_once 'address.php';
require_once 'contact.php';

class User {
    public $id;
    public $firstname;
    public $lastname;
    public $username;
    public $password;
    public $gender;
    public $email;
    public Contact $contact;
    public Address $address;

    function __construct($id, $firstname, $lastname, $username, $password, $gender, $email, Address $address, Contact $contact) {
        $this->id = $id;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->username = $username;
        $this->password = $password;
        $this->gender = $gender;
        $this->email = $email;
        $this->contact = $contact;
        $this->address = $address;
    }

    static function create($firstname, $lastname, $username, $password, $gender, $email, Address $address, Contact $contact) {
        $id = generate_db_id('U');

        return new User($id, $firstname, $lastname, $username, $password, $gender, $email, $address, $contact);
    }

    static function retrieve($id) {
        $sql = "SELECT * FROM users WHERE users.user_id='{$id}'";
        $result = db_query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            return new User($row['user_id'], $row['firstname'], $row['lastname'], $row['username'], $row['passwordhash'], $row['gender'], $row['email'], Address::retrieve($row['address_id']), Contact::retrieve($row['contact_id']));
        }

        return false;
    }

    static function is_exist($username, $email) {
        $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
        $result = db_query($user_check_query);

        if ($result->num_rows == 0) {
            return false;
        }

        $user = $result->fetch_assoc();

        $errors = array();

        if ($user) {
            if ($user['username'] === $username) {
                array_push($errors, "Username already exists");
            }

            if ($user['email'] === $email) {
                array_push($errors, "email already exists");
            }
        }

        return $errors;
    }


    function store() {
        $sql = "INSERT INTO users
        (user_id, firstname, lastname, username, passwordhash, gender, email, address_id, contact_id)
        VALUES ('{$this->id}', '{$this->firstname}', '{$this->lastname}', '{$this->username}', '{$this->password}', '{$this->gender}', '{$this->email}', '{$this->address->id}', '{$this->contact->id}');";

        return db_query($sql);
    }
}
