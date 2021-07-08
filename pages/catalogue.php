<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Rental System | Catalogue</title>

        <link rel="stylesheet" href="../css/global.css">
        <link rel="stylesheet" href="../css/hamburger.css">
        <link rel="stylesheet" href="../css/catalogue.css">
    </head>

    <body>
        <?php
            $title = 'Catalogue';
            include '../partials/navbar.php';
        ?>

        <header class="search-cont-mobile">
            <form class="searchbar">
                <input type="text" placeholder="Search here..">
                <button><span class="fas fa-search"></span></button>
            </form>

            <button id="filter"><span class="fas fa-filter"></span>Filter</button>
            <button id="category">All Categories <span class="fas fa-caret-down"></span></button>
            <button id="sort"><span class="fas fa-sort"></span>Sort</button>
        </header>

        <main>
            <div class="catalogue-cont">
                <div class="item-card">
                    <div class="item-card-header">
                        <div class="user-cont">
                            <img class="user-pfp" src="../img/profile.png" width="10px" alt="">
                            <span class="user-name">username</span>
                        </div>
                        <span class="item-name">3 Story Mansion for Rent</span>
                    </div>
                    <div class="item-preview-cont">
                        <img class="item-preview" src="../img/house.jpg" width="50%" alt="">
                    </div>
                    <div class="item-desc">
                        <span class="item-price">&#8369; 40,000</span>
                        <span class="item-category"><strong>Category:</strong> Property/Estate</span>
                        <span class="item-loc"><strong>Location:</strong> Caloocan City</span>
                        <div class="item-rating">
                            Rating:
                            <div class="rating-cont">
                                <span class="fas fa-star"></span>
                                <span class="fas fa-star"></span>
                                <span class="fas fa-star"></span>
                                <span class="fas fa-star"></span>
                                <span class="fas fa-star-half-alt"></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="item-card">
                    <div class="item-card-header">
                        <div class="user-cont">
                            <img class="user-pfp" src="../img/profile.png" width="10px" alt="">
                            <span class="user-name">username</span>
                        </div>
                        <span class="item-name">Pastel Pink Dress</span>
                    </div>
                    <div class="item-preview-cont">
                        <img class="item-preview" src="../img/dress.jpg" width="50%" alt="">
                    </div>
                    <div class="item-desc">
                        <span class="item-price">&#8369; 1,500</span>
                        <span class="item-category"><strong>Category:</strong> Clothing/Apparel</span>
                        <span class="item-loc"><strong>Location:</strong> Taguig City</span>
                        <div class="item-rating">
                            Rating:
                            <div class="rating-cont">
                                <span class="fas fa-star"></span>
                                <span class="fas fa-star"></span>
                                <span class="fas fa-star"></span>
                                <span class="fas fa-star"></span>
                                <span class="far fa-star"></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="item-card">
                    <div class="item-card-header">
                        <div class="user-cont">
                            <img class="user-pfp" src="../img/profile.png" width="10px" alt="">
                            <span class="user-name">username</span>
                        </div>
                        <span class="item-name">Karaoke Machine with Microphone</span>
                    </div>
                    <div class="item-preview-cont">
                        <img class="item-preview" src="../img/karaokemachine.jpeg" width="50%" alt="">
                    </div>
                    <div class="item-desc">
                        <span class="item-price">&#8369; 5,000</span>
                        <span class="item-category"><strong>Category:</strong> Machinery/Appliances</span>
                        <span class="item-loc"><strong>Location:</strong> Pasig City</span>
                        <div class="item-rating">
                            Rating:
                            <div class="rating-cont">
                                <span class="fas fa-star"></span>
                                <span class="fas fa-star"></span>
                                <span class="fas fa-star"></span>
                                <span class="far fa-star"></span>
                                <span class="far fa-star"></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="item-card">
                    <div class="item-card-header">
                        <div class="user-cont">
                            <img class="user-pfp" src="../img/profile.png" width="10px" alt="">
                            <span class="user-name">username</span>
                        </div>
                        <span class="item-name">White VAN for family</span>
                    </div>
                    <div class="item-preview-cont">
                        <img class="item-preview" src="../img/car.jpg" width="50%" alt="">
                    </div>
                    <div class="item-desc">
                        <span class="item-price">&#8369; 25,000</span>
                        <span class="item-category"><strong>Category:</strong> Vehicle</span>
                        <span class="item-loc"><strong>Location:</strong> Quezon City</span>
                        <div class="item-rating">
                            Rating:
                            <div class="rating-cont">
                                <span class="fas fa-star"></span>
                                <span class="fas fa-star"></span>
                                <span class="fas fa-star"></span>
                                <span class="fas fa-star-half-alt"></span>
                                <span class="far fa-star"></span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </main>

        <?php
            include '../partials/footer.php';
        ?>

        <script src="../js/hamburger.js"></script>
        <script src="https://kit.fontawesome.com/2b03626812.js" crossorigin="anonymous"></script>
    </body>

</html>
