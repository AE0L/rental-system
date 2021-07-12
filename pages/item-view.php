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
                <!-- <div class="item-view-return">
                    <span class="fas fa-arrow-left"></span>
                    <span>Return</span>
                </div> -->
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
        </header>

        <main>
            <div class="name-price-cont">
                <h1 id="item-name"><?php echo $rent_item->name ?></h1>
                <p id="seller-name">@<?php echo $seller->username ?></p>

                <div class="price-cont">
                    <h2>&#8369;</h2>
                    <h2 id="rental-price"><?php echo $rent_item->price ?></h2>
                </div>
            </div>

            <hr class="divider">

            <div class="item-info-cont">
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

                    <div class="feature-group">
                        <label>Type</label>
                        <span><?php echo $appliance->type ?></span>
                    </div>

                    <div class="feature-group">
                        <label>Condition</label>
                        <span><?php echo $appliance->condition ?></span>
                    </div>

                    <?php
                    } else if ($category === 'furniture') {
                        $furniture = Furniture::retrieve_by_rent_item($rent_item->id);
                ?>

                    <div class="feature-group">
                        <label>Type</label>
                        <span><?php echo $furniture->type ?></span>
                    </div>

                    <div class="feature-group">
                        <label>Condition</label>
                        <span><?php echo $furniture->condition ?></span>
                    </div>

                    <?php
                    } else if ($category === 'Other') {
                        $other = Other::retrieve_by_rent_item($rent_item->id);
                ?>

                    <div class="feature-group">
                        <label>Type</label>
                        <span><?php echo $other->type ?></span>
                    </div>

                    <div class="feature-group">
                        <label>Condition</label>
                        <span><?php echo $other->condition ?></span>
                    </div>

                    <?php
                    } else if ($category === 'm-cloth' || $category === 'w-cloth') {
                        $cloth = Clothing::retrieve_by_rent_item($rent_item->id, $category === 'm-cloth' ? 'M' : 'W');
                ?>

                    <div class="feature-group">
                        <label>Gender</label>
                        <span><?php echo $category === 'M' ? 'Men\'s' : 'Women\'s' ?></span>
                    </div>

                    <div class="feature-group">
                        <label>Type</label>
                        <span><?php echo $cloth->type ?></span>
                    </div>

                    <div class="feature-group">
                        <label>Size</label>
                        <span><?php echo $cloth->size ?></span>
                    </div>

                    <div class="feature-group">
                        <label>Brand</label>
                        <span><?php echo $cloth->brand ?></span>
                    </div>

                    <div class="feature-group">
                        <label>Condition</label>
                        <span><?php echo $cloth->condition ?></span>
                    </div>

                    <?php
                    } else if ($category == 'property') {
                        $property = Property::retrieve_by_rent_item($rent_item->id);
                    ?>

                    <div class="feature-group">
                        <label>Type</label>
                        <span><?php echo $property->type ?></span>
                    </div>

                    <?php

                        if (in_array($property->type, array('Apartment & Condo', 'House & Lot', 'Townhouse', 'Commercial'))) {
                    ?>

                    <div class="feature-group">
                        <label>Min Floor Area</label>
                        <span><?php echo $property->min_floor ?></span>
                    </div>

                    <div class="feature-group">
                        <label>Max Floor Area</label>
                        <span><?php echo $property->max_floor ?></span>
                    </div>

                    <?php
                        }

                        if ($property->type !== 'Apartment & Condo') {
                ?>

                    <div class="feature-group">
                        <label>Min Lot Area</label>
                        <span><?php echo $property->min_lot ?></span>
                    </div>

                    <div class="feature-group">
                        <label>Max Lot Area</label>
                        <span><?php echo $property->max_lot ?></span>
                    </div>

                    <?php
                        }

                        if (in_array($property->type, array('Apartment & Condo', 'House & Lot', 'Townhouse', 'Commercial'))) {
                ?>

                    <div class="feature-group">
                        <label>Bedrooms</label>
                        <span><?php echo $property->bedroom ?></span>
                    </div>

                    <div class="feature-group">
                        <label>Bathrooms</label>
                        <span><?php echo $property->bathroom ?></span>
                    </div>

                    <div class="feature-group">
                        <label>Parking</label>
                        <span><?php echo $property->parking ?></span>
                    </div>

                    <?php
                        }

                        if (!in_array($property->type, array('Lot', 'Commercial'))) {
                ?>

                    <div class="feature-group">
                        <label>Pets Allowed?</label>
                        <span><?php echo $property->pets ? 'Yes' : 'No' ?></span>
                    </div>

                    <?php
                        }
                    }
                ?>
                </div>

                <div class="main-section">
                    <h4>Description</h4>
                    <p class="description">
                        <?php echo $rent_item->description ?>
                    </p>
                </div>


                <div class="mobile main-section contact-cont">
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

                <div class="mobile main-section">
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
            </div>

            <div class="desktop aside-section">
                <div class="aside-group">
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

                <div class="aside-group">
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
            </div>
        </main>

        <?php include '../partials/footer.php' ?>

        <script src="../js/hamburger.js"></script>
        <script src="../js/carousel.js"></script>
        <script src="https://kit.fontawesome.com/2b03626812.js" crossorigin="anonymous"></script>

        <script>
        const price = el('rental-price')
        let value = price.innerText;
        price.innerText = parseFloat(value).toLocaleString()
        </script>
    </body>

</html>
