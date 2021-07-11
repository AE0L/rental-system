<?php
	include "connection.php";
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Property/Estate-Rental System</title>

        <link rel="stylesheet" href="../css/global.css">
        <link rel="stylesheet" href="../css/hamburger.css">
        <link rel="stylesheet" href="../css/carousel.css">
        <link rel="stylesheet" href="../css/homepage.css">

    </head>

    <body>

        <?php
            $title = 'Categories';
            include '../partials/navbar.php';
        ?>
        <main>
			<section class="recommend-cont">
                <h2>Property/Estate</h2>
                <div class="items-cont">
                    <div class="item-card">
                        <div class="user-cont">
                            <img class="user-pfp" src="../img/profile.png" width="10px" alt="">
                            <span class="user-name">username</span>
                        </div>
                        <div class="item-preview-cont">
                             <a href="#"><img class="item-preview" src="../img/house.jpg" alt=""></a>
                        </div>
                        <div class="item-desc">
                            <span class="item-name">3 Story Mansion for Rent</span>
                            <span class="item-price">&#8369; 40,000</span>
                            <span class="item-loc">Caloocan City</span>
                        </div>
                    </div>

                    <div class="item-card">
                        <div class="user-cont">
                            <img class="user-pfp" src="../img/profile.png" width="10px" alt="">
                            <span class="user-name">username</span>
                        </div>
                        <div class="item-preview-cont">
                             <a href="#"><img class="item-preview" src="../img/house.jpg" alt=""></a>
                        </div>
                        <div class="item-desc">
                            <span class="item-name">3 Story Mansion for Rent</span>
                            <span class="item-price">&#8369; 40,000</span>
                            <span class="item-loc">Caloocan City</span>
                        </div>
                    </div>

                    <div class="item-card">
                        <div class="user-cont">
                            <img class="user-pfp" src="../img/profile.png" width="10px" alt="">
                            <span class="user-name">username</span>
                        </div>
                        <div class="item-preview-cont">
                             <a href="#"><img class="item-preview" src="../img/house.jpg" alt=""></a>
                        </div>
                        <div class="item-desc">
                            <span class="item-name">3 Story Mansion for Rent</span>
                            <span class="item-price">&#8369; 40,000</span>
                            <span class="item-loc">Caloocan City</span>
                        </div>
                    </div>

                    <div class="item-card">
                        <div class="user-cont">
                            <img class="user-pfp" src="../img/profile.png" width="10px" alt="">
                            <span class="user-name">username</span>
                        </div>
                        <div class="item-preview-cont">
                            <a href="#"><img class="item-preview" src="../img/house.jpg" alt=""></a>
                        </div>
                        <div class="item-desc">
                            <span class="item-name">3 Story Mansion for Rent</span>
                            <span class="item-price">&#8369; 40,000</span>
                            <span class="item-loc">Caloocan City</span>
                        </div>
                    </div>
                </div>

                <div class="check-more-cont">
                    <span>check out more</span>
                    <span class="fas fa-angle-right"></span>
                </div>
            </section>
			</main>
			
<?php
            include '../partials/footer.php';
?>


        <script src="../js/hamburger.js"></script>
        <script src="../js/carousel.js"></script>
        <script src="https://kit.fontawesome.com/2b03626812.js" crossorigin="anonymous"></script>
 </body>