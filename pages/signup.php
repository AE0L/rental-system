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
                    <form action="" id="signup-form">
                        <input type="text" name="first-name" id="first-name" placeholder="First Name">
                        <input type="text" name="last-name" id="last-name" placeholder="Last Name">
                        <input type="text" name="username" id="username" placeholder="Username (4-16 characters)">
                        <input type="password" name="password" id="password" placeholder="Password">
                        <input type="password" name="re-password" id="re-password" placeholder="Verify password">
                        <input type="tel" name="mobile" id="mobile" placeholder="Mobile No.">
                        <input type="text" name="address-1" id="address-1" placeholder="Address 1">
                        <input type="text" name="address-2" id="address-2" placeholder="Address 2">

                        <input type="submit" id="submit" value="Create account">

                        <div class="login-cont">
                            <div class="login-wrapper">
                                <span>Already have an account?</span>
                                <a href="">Log in</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </main>

        <script src="https://kit.fontawesome.com/2b03626812.js" crossorigin="anonymous"></script>
    </body>

</html>
