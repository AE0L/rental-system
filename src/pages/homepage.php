<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>HOME-Rental System</title>

        <link rel="stylesheet" href="../css/global.css">
        <link rel="stylesheet" href="../css/hamburger.css">
        <link rel="stylesheet" href="../css/carousel.css">
        <link rel="stylesheet" href="../css/homepage.css">

    </head>

    <body>

        <?php
            $title = 'Home';
            include '../partials/navbar.php';
        ?>

        <header>
            <form class="searchbar">
                <input type="text" placeholder="Search here..">
                <button><span class="fas fa-search"></span></button>
            </form>
        </header>

        <main>
            <div class="carousel">
                <div class="slides">
                    <img src="../img/house.jpg" alt="">
                </div>

                <div class="slides">
                    <img src="../img/vehicle.jpg" alt="">
                </div>

                <div class="slides">
                    <img src="../img/car.jpg" alt="">
                </div>

                <div class="carousel-dots">
                    <span class="dot" onclick="currentSlide(1)"></span>
                    <span class="dot" onclick="currentSlide(2)"></span>
                    <span class="dot" onclick="currentSlide(3)"></span>
                </div>

                <div class="carousel-nav-cont">
                    <div class="slide-prev">
                        <a onclick="plusSlides(-1)"><span class="fas fa-angle-left"></span></a>
                    </div>

                    <div class="slide-next">
                        <a onclick="plusSlides(1)"><span class="fas fa-angle-right"></span></a>
                    </div>
                </div>
            </div>

            <section class=category>
                <h2>Categories</h2>
                <div class="category-cont">
                    <div class="category-item">
                        <a href="#"><img src="../img/houserent.jpg" height="50px" alt="house"></a>
                        <p>Property/Estate</p>
                    </div>

                    <div class="category-item">
                        <a href="#"><img src="../img/vehicle.jpg" height="50px" alt="vehicle"></a>
                        <p>Vehicle</p>
                    </div>

                    <div class="category-item">
                        <a href="#"><img src="../img/appliances.jpg" height="50px" alt="appliances"></a>
                        <p>Appliances</p>
                    </div>

                    <div class="category-item">
                        <a href="#"><img src="../img/furniture.jpg" height="50px" alt="furniture"></a>
                        <p>Furnitures</p>
                    </div>

                    <div class="category-item">
                        <a href="#"><img src="../img/clothing.jpg" height="50px" alt="apparel"></a>
                        <p>Apparel</p>
                    </div>
                </div>
            </section>

            <section class="recommend-cont">
                <h2>Popular Items</h2>
                <div class="items-cont">
                    <div class="item-card">
                        <div class="user-cont">
                            <img class="user-pfp" src="../img/profile.png" width="10px" alt="">
                            <span class="user-name">username</span>
                        </div>
                        <div class="item-preview-cont">
                            <img class="item-preview" src="../img/house.jpg" alt="">
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
                            <img class="item-preview" src="../img/dress.jpg" alt="">
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
                            <img class="item-preview" src="../img/car.jpg" alt="">
                        </div>
                        <div class="item-desc">
                            <span class="item-name">White VAN for Family</span>
                            <span class="item-price">&#8369; 25,000</span>
                            <span class="item-loc">Quezon City</span>
                        </div>
                    </div>

                    <div class="item-card">
                        <div class="user-cont">
                            <img class="user-pfp" src="../img/profile.png" width="10px" alt="">
                            <span class="user-name">username</span>
                        </div>
                        <div class="item-preview-cont">
                            <img class="item-preview" src="../img/karaokemachine.jpeg" alt="">
                        </div>
                        <div class="item-desc">
                            <span class="item-name">Karaoke Machine with Microphone</span>
                            <span class="item-price">&#8369; 5,000</span>
                            <span class="item-loc">Pasig City</span>
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

</html>
