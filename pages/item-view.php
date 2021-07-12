<?php
    require_once '../php/header.php';
    require_once '../php/catalogue.php';
    require_once '../php/user.php';
    require_once '../php/seller.php';
    require_once '../php/category.php';
    require_once '../php/address.php';
    require_once '../php/contact.php';
    require_once '../php/preview-pic.php';

    $id = $_GET['item'];

    $catalogue_item = Catalogue::retrieve("CAT-ID-{$id}");
    $seller = $catalogue_item->seller->user;
    $rent_item = $catalogue_item->rent_item;
    $category = $rent_item->category;
    $pics = PreviewPic::get_all_rent_item_pics($rent_item->id);
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Rental System</title>

        <link rel="stylesheet" href="../css/global.css">
        <link rel="stylesheet" href="../css/item-view.css">
        <link rel="stylesheet" href="../css/hamburger.css">
        <link rel="stylesheet" href="../css/carousel.css">
    </head>

    <body>
        <?php
            $title = 'Item View';
            include '../partials/navbar.php';
        ?>

        <header>
            <div class="gallery-cont">
                <div class="item-view-return">
                    <span class="fas fa-arrow-left"></span>
                    <span>Return</span>
                </div>
                <div class="carousel">
                    <?php
                        foreach ($pics as $pic) {
                    ?>
                    <div class="slides">
                        <img alt="preview" src="/php/get-image?image_id=<?php echo $pic->id ?>">
                    </div>
                    <?php } ?>

                    <div class="carousel-dots">
                        <?php for ($x = 1; $x <= count($pics); $x++) { ?>
                        <span class="dot" onclick="currentSlide(<?php echo $x ?>)"></span>
                        <?php } ?>
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
            </div>

            <div class="name-price-cont">
                <h1 id="item-name"><?php echo $rent_item->name ?></h1>
                <p id="seller-name">@<?php echo $seller->username ?></p>

                <div class="price-cont">
                    <h2 id="rental-price">&#8369; <?php echo $rent_item->price ?></h2>
                </div>
            </div>
        </header>

        <hr class="divider">

        <main>
            <div class="main-features">
                <?php
                    if ($category === 'vehicle') {
                        $vehicle = Vehicle::retrieve_by_rent_item($rent_item->id);
                ?>

                <div class="feature-group">
                    <label>Type</label>
                    <span>
                        <?php echo $vehicle->type ?>
                    </span>
                </div>

                <div class="feature-group">
                    <label>Manufacturer</label>
                    <span>
                        <?php echo $vehicle->manufacturer ?>
                    </span>
                </div>

                <div class="feature-group">
                    <label>Year</label>
                    <span>
                        <?php echo $vehicle->year ?>
                    </span>
                </div>

                <div class="feature-group">
                    <label>Model</label>
                    <span>
                        <?php echo $vehicle->model ?>
                    </span>
                </div>

                <div class="feature-group">
                    <label>Transmission</label>
                    <span>
                        <?php echo $vehicle->transmission ?>
                    </span>
                </div>

                <div class="feature-group">
                    <label>Fuel Type</label>
                    <span>
                        <?php echo $vehicle->fuel ?>
                    </span>
                </div>

                <div class="feature-group">
                    <label>License Plate Last No.</label>
                    <span>
                        <?php echo $vehicle->plate ?>
                    </span>
                </div>

                <?php
                    } else if ($category === 'appliances') {
                        $appliance = Appliance::retrieve_by_rent_item($rent_item->id);
                        ?>

                <?php
                    }
                ?>
            </div>

            <div class="main-section">
                <h4>Description</h4>
                <p class="description">
                    <?php echo $rent_item->description ?>
                </p>
            </div>

            <div class="main-section contact-cont">
                <h4>Contact Details</h4>
                <div class="contact-details">
                    <span class="fas fa-mobile"></span>
                    <span>Phone</span>
                    <pre><?php echo $seller->contact->mobile ?></pre>

                    <span class="fas fa-phone"></span>
                    <span>Landline</span>
                    <pre><?php echo $seller->contact->landline ?></pre>

                    <span class="fas fa-envelope"></span>
                    <span>E-mail</span>
                    <pre><?php echo $seller->email ?></pre>
                </div>
            </div>

            <div class="main-section">
                <h4>Location Details</h4>
                <div class="location-cont">
                    <div class="location-group">
                        <label>Address</label>
                        <span><?php echo $rent_item->address->line_1 ?></span>
                    </div>

                    <div class="location-group">
                        <label>City</label>
                        <span><?php echo $rent_item->address->city ?></span>
                    </div>
                </div>
            </div>

            <div class="main-section">
                <h4>Seller Details</h4>
                <div class="seller-cont">
                    <div class="seller-group">
                        <label>Name</label>
                        <span><?php echo "{$seller->lastname}, {$seller->firstname}" ?></span>
                    </div>

                    <div class="seller-group">
                        <label>Username</label>
                        <span><?php echo $seller->username ?></span>
                    </div>
                </div>
            </div>
        </main>

        <?php include '../partials/footer.php' ?>

        <script src="../js/hamburger.js"></script>
        <script src="../js/carousel.js"></script>
        <script src="https://kit.fontawesome.com/2b03626812.js" crossorigin="anonymous"></script>
    </body>

</html>
