<?php 
    require_once '../php/header.php';
    require_once '../php/signupserver.php'; 
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>rentALL | Register</title>

        <link rel="stylesheet" href="../css/global.css">
        <link rel="stylesheet" href="../css/index-nav.css">
        <link rel="stylesheet" href="../css/signup.css">
    </head>

    <body>
        <?php
            include '../partials/index-nav.php';
        ?>


        <main>
            <div class="wrapper">
                <div class="signup-cont">
                    <span class="signup-title">Sign up</span>
                    <form method="post" id="signup-form">
                        <?php include_once '../php/signuperrors.php'; ?>

                        <input required type="text" name="firstname" id="first-name" placeholder="First Name">
                        <input required type="text" name="lastname" id="last-name" placeholder="Last Name">
                        <input required type="email" name="email" id="email" placeholder="Email">
                        <input required type="text" name="username" id="username"
                            placeholder="Username (4-16 characters)">
                        <select required name="gender" id="gender">
                            <option value="" disabled selected>- Gender -</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="others">Other</option>
                        </select>
                        <input required type="password" name="password_1" id="password" placeholder="Password">
                        <input required type="password" name="password_2" id="re-password"
                            placeholder="Verify password">
                        <input required type="text" name="mobile" id="mobile" placeholder="Mobile No.">
                        <input required type="text" name="address_1" id="address-1" placeholder="Address 1">
                        <input type="text" name="address_2" id="address-2" placeholder="Address 2">
                        <input required type="text" name="city" id="city" placeholder="City">

                        <button id="create" class="btn" type="submit" formmethod="post">Create Account</button>

                        <div class="login-cont">
                            <div class="login-wrapper">
                                <span>Already have an account?</span>
                                <a href="login.php">Log in</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </main>

        <script src="https://kit.fontawesome.com/2b03626812.js" crossorigin="anonymous"></script>
    </body>

</html>
