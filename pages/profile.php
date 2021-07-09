<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>rentALL | Profile</title>

        <link rel="stylesheet" href="../css/global.css">
        <link rel="stylesheet" href="../css/hamburger.css">
        <link rel="stylesheet" href="../css/profile.css">
    </head>

    <body>
        <?php
            $title = 'Profile';
            include '../partials/navbar.php';
        ?>

        <header>
            <div class="pfp-wrapper">
                <div class="pfp-header">
                    <span class="fas fa-arrow-left"></span>
                    <span>Return</span>
                    <span class="far fa-edit"></span>
                </div>

                <img src="../img/pic.jpg" id="photo" width="150px" class="pfp-pic" alt="pfp">
            </div>
        </header>

        <main>
            <div class="profile-cont">
                <span class="username">@username</span>

                <span class="seller-badge">seller</span>

                <hr class="divider">

                <div class="info-cont">
                    <label for="name">Full Name</label>
                    <span name="name">Juan B. Dela Cruz</span>

                    <label for="location">Location</label>
                    <span name="location">Quezon City</span>

                    <label for="email">Email</label>
                    <span name="email">example@email.com</span>

                    <label for="contact">Contact</label>
                    <span name="contact">xxxx-xxx-xxxx</span>
                </div>
            </div>

            <hr class="divider">

            <h2>Rental Items</h2>

            <section class="rental-items-section">
                <div class="items-cont">
                    <div class="item-card">
                        <div class="item-preview-cont">
                            <img class="item-preview" src="../img/house.jpg" alt="">
                        </div>
                        <div class="item-desc">
                            <span class="item-name">3 Story Mansion for Rent</span>
                            <span class="item-price">&#8369; 40,000</span>
                        </div>
                    </div>

                    <div class="item-card">
                        <div class="item-preview-cont">
                            <img class="item-preview" src="../img/dress.jpg" alt="">
                        </div>
                        <div class="item-desc">
                            <span class="item-name">3 Story Mansion for Rent</span>
                            <span class="item-price">&#8369; 40,000</span>
                        </div>
                    </div>

                    <div class="item-card">
                        <div class="item-preview-cont">
                            <img class="item-preview" src="../img/car.jpg" alt="">
                        </div>
                        <div class="item-desc">
                            <span class="item-name">White VAN for Family</span>
                            <span class="item-price">&#8369; 25,000</span>
                        </div>
                    </div>

                    <div class="item-card">
                        <div class="item-preview-cont">
                            <img class="item-preview" src="../img/karaokemachine.jpeg" alt="">
                        </div>
                        <div class="item-desc">
                            <span class="item-name">Karaoke Machine with Microphone</span>
                            <span class="item-price">&#8369; 5,000</span>
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
        <script src="../js/seller-page.js"></script>
        <script src="https://kit.fontawesome.com/2b03626812.js" crossorigin="anonymous"></script>
    </body>

</html>
