<?php
    require_once '../php/header.php';
    require_once '../php/user.php';
    require_once '../php/seller.php';

    $user = User::retrieve($_SESSION['user_id']);
    $is_seller = Seller::retrieve($user->id);

    if ($is_seller) {
        $is_seller = true;
    }
?>
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
            <div class="profile-wrapper">
                <div class="profile-cont">
                    <div class="desktop-pfp">
                        <img src="../img/pic.jpg" id="photo" width="125px" class="desktop-pfp-pic" alt="pfp">
                    </div>
                    <div class="username-cont">
                        <span class="username">@<?php echo $user->username ?></span>

                        <?php if ($is_seller) { ?>
                        <span class="seller-badge">seller</span>
                        <?php } ?>
                    </div>

                    <hr class="divider">

                    <div class="info-cont">
                        <label for="name">Full Name</label>
                        <span name="name"><?php echo "{$user->lastname}, {$user->firstname}" ?></span>

                        <label for="location">Location</label>
                        <span name="location"><?php echo $user->address->city ?></span>

                        <label for="email">Email</label>
                        <span name="email"><?php echo $user->email ?></span>

                        <label for="contact">Contact</label>
                        <span name="contact"><?php echo $user->contact->mobile ?></span>
                    </div>
                </div>
            </div>

            <hr class="divider">

            <section class="rental-items-section">
                <h2>Rental Items</h2>

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
