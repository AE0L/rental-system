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
    </head>

    <body>
        <?php
            include '../partials/index-nav.php';
        ?>

        <header>
            <div class="image-cont">
				<img src="../img/Logo.gif" style ="width: 75%" alt="img">
            </div>
        </header>

        <main>
            <div class="wrapper">
                <div class="login-cont">
                    <span class="logo">rentALL</span>
                    <form action="" id="login-form">
                        <input type="text" name="username" id="username" placeholder="Username or Email">
                        <input type="password" name="password" id="password" placeholder="Password">
                        <input id="login" type="submit" value="Log in">
                        <div class="login-divider">
                            <hr>
                            <span>or</span>
                        </div>
                        <input id="signup" type="button" value="Sign up">
                    </form>
                </div>
            </div>
        </main>

        <script src="https://kit.fontawesome.com/2b03626812.js" crossorigin="anonymous"></script>
    </body>

</html>
