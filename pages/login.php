<?php
session_start();

$errors = array();

$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'rental_system';
// Try and connect using the info above.
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $query = $con->prepare("SELECT user_id, passwordhash FROM users WHERE username = ?");
    // Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
    $query->bind_param('s', $username);
    $query->execute();
    // Store the result so we can check if the account exists in the database.
    $query->store_result();
    if ($query->num_rows > 0) {
        $query->bind_result($user_id, $passwordhash);
        $query->fetch();
        // Account exists, now we verify the password.
        // Note: remember to use password_hash in your registration file to store the hashed passwords.
        if ($password === $passwordhash) {
            // Verification success! User has logged-in!
            // Create sessions, so we know the user is logged in, they basically act like cookies but remember the data on the server.
            session_regenerate_id();
            $_SESSION['logged_in'] = TRUE;
            $_SESSION['name'] = $_POST['username'];
            $_SESSION['id'] = $user_id;
            header('Location: /');
        } else {
            // Incorrect password
            array_push($errors, "Incorrect password.");
        }
    } else {
        // Incorrect username
        array_push($errors, "Username or password are incorrect.");
    }
        $query->close();

}

?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Rental System</title>

        <link rel="stylesheet" href="../css/global.css">
        <link rel="stylesheet" href="../css/index-nav.css">
        <link rel="stylesheet" href="../css/login.css">

        <script>
            function toLogin() {
                window.location.href="signup.php";
            }
        </script>
    </head>

    <body>
        <?php
            include '../partials/index-nav.php';
        ?>

        <header>
            <div class="image-cont">
                <img src="../img/car.jpg" alt="img">
            </div>
        </header>


        <main>

            <div class="wrapper">
                <div class="login-cont">
                    <span class="logo">rentALL</span>
                    <form action="" id="login-form" method="post">
                        <?php include_once '../php/signuperrors.php'; ?>
                        <input type="text" name="username" id="username" placeholder="Username" required>
                        <input type="password" name="password" id="password" placeholder="Password" required>
                        <button id="login" class="btn" type="submit" formmethod="post" name="login">Login</button>
                        <div class="login-divider">
                            <hr>
                            <span>or</span>
                        </div>
                        <input id="signup" type="button" value="Sign up" onclick="toLogin()" >
                   </form>
                </div>
            </div>



        </main>


        <script src="https://kit.fontawesome.com/2b03626812.js" crossorigin="anonymous"></script>
    </body>

</html>
