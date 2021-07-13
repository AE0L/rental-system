<?php

require_once 'address.php';
require_once 'contact.php';
require_once 'user.php';

$username = $email = $firstname = $lastname = $gender = "";
$mobile = $address_1 = $address_2 = $city = "";
$errors = array(); 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $firstname = clean_input($_POST['firstname']);
    $lastname = clean_input($_POST['lastname']);
    $username = clean_input($_POST['username']);
    $gender = clean_input($_POST['gender']);
    $email = clean_input($_POST['email']);
    $password_1 = clean_input($_POST['password_1']);
    $password_2 = clean_input($_POST['password_2']);
    $mobile = clean_input($_POST['mobile']);
    $address_1 = clean_input($_POST['address_1']);
    $address_2 = clean_input($_POST['address_2']);
    $city = clean_input($_POST['city']);

    if ($password_1 != $password_2) {
      array_push($errors, "The two passwords do not match");
    }

    $is_exists = User::is_exist($username, $email);

    if ($is_exists) {
        $errors = array_merge($errors, $is_exists);
    }
  
    if (count($errors) == 0) {
        $password = md5($password_1);

        $address = Address::create($address_1, $address_2, $city, 'NCR', 'PH', '');
        $contact = Contact::create($mobile, '');
        $user = User::create($firstname, $lastname, $username, $password, $gender, $email, $address, $contact);

        global $db_conn;

        if (!$address->store()) {
            exit($db_conn->error);
        }

        if (!$contact->store()) {
            exit($db_conn->error);
        }

        if (!$user->store()) {
            exit($db_conn->error);
        }

        $_SESSION['user_id'] = $user->id;
        $_SESSION['logged_in'] = TRUE;

        header('location: /');
    }
}

?>

