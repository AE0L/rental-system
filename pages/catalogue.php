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
            <section class="search-wrapper-desktop">
                <div class="search-cont-desktop">
                    <form class="searchbar-filter">
                        <input id="searchbar-filter-input" type="text" placeholder="Search here...">
                        <button id="searchbar-filter-btn"><span class="fas fa-search"></span></button>
                    </form>

                    <div class="search-category-cont">
                        <h2 class="section-title">Category</h2>
                        <select name="category" id="search-category">
                            <option value="Any">Any</option>
                            <option value="property">Property/Estate</option>
                            <option value="vehicle">Vehicle</option>
                            <option value="furniture">Furniture</option>
                            <optgroup label="Clothing/Apparel">
                                <option value="m-cloth">Men's Wear</option>
                                <option value="w-cloth">Women's Wear</option>
                            </optgroup>
                            <option value="appliances">TV & Home Appliances</option>
                        </select>
                    </div>

                    <hr class="search-divider">

                    <div class="filter-cont">
                        <?php
                            function option_tag($array) {
                                foreach($array as $item) {
                                    echo "<option value=\"{$item}\">{$item}</option>";
                                }
                            }
                        ?>
                        <h2 class="section-title">Filter</h2>

                        <div class="prop-filter">
                            <?php
                                $prop_type = Array('Apartment & Condo', 'House & Lot', 'Townhouse', 'Lot', 'Commercial');
                                $prop_room = Array('1','2','3','4','5','5+');
                                $prop_park = Array('0','1','2','2+');
                            ?>

                            <form id="prop-filter-form" action="">
                                <label>Property Type</label>
                                <select id="prop-type">
                                    <option value="any">Any</option>
                                    <?php option_tag($prop_type) ?>
                                </select>

                                <label>Min Floor Area</label>
                                <input type="number" name="min-floor-area" id="prop-min-floor-area"
                                    placeholder="Enter area here...">

                                <label>Max Floor Area</label>
                                <input type="number" name="max-floor-area" id="prop-max-floor-area"
                                    placeholder="Enter area here...">

                                <label>Min Lot Area</label>
                                <input type="number" name="min-lot-area" id="prop-min-lot-area"
                                    placeholder="Enter area here...">

                                <label>Max Lot Area</label>
                                <input type="number" name="max-lot-area" id="prop-max-lot-area"
                                    placeholder="Enter area here...">

                                <label>Bedrooms</label>
                                <select name="bedrooms" id="prop-bedrooms">
                                    <option value="any">Any</option>
                                    <?php option_tag($prop_room) ?>
                                </select>

                                <label>Bathrooms</label>
                                <select name="bathrooms" id="prop-bathrooms">
                                    <option value="any">Any</option>
                                    <?php option_tag($prop_room) ?>
                                </select>

                                <label>Parking Space</label>
                                <select name="parking" id="prop-parking">
                                    <option value="any">Any</option>
                                    <?php option_tag($prop_park) ?>
                                </select>

                                <label>
                                    <input type="checkbox" name="allow-pet" id="prop-allow-pet">
                                    Pets allowed
                                </label>

                                <label>Location</label>
                                <select name="prop-location" id="prop-location">
                                    <option disabled selected>- location -</option>
                                </select>
                            </form>
                        </div>

                        <div class="vehicle-filter">
                            <?php
                                $car_types = Array('Sedan', 'Truck', 'SUV','MPV', 'VAN');
                                $car_transmission = Array('Automatic', 'Manual');
                                $car_fuels = Array('Gasoline', 'Diesel', 'LPG', 'Hybrid', 'Electric');
                                $car_plates = Array('1/2 Monday', '3/4 Tuesday', '5/6 Wednesday', '7/8 Thursday', '9/0 Friday');
                            ?>

                            <form action="" id="vehicle-filter-form">
                                <label>Type</label>
                                <select name="type" id="car-type">
                                    <option value="any" selected>Any</option>
                                    <?php option_tag($car_types) ?>
                                </select>

                                <label>Year</label>
                                <select name="year" id="car-year">
                                    <option value="any" selected>Any</option>
                                    <?php
                                        for ($x = 2021; $x >= 1970; $x--) {
                                            echo "<option value=\"{$x}\">{$x}</option>";
                                        }
                                    ?>
                                </select>

                                <label>Transmission</label>
                                <select name="transmission" id="car-transmission">
                                    <option value="any" selected>Any</option>
                                    <?php option_tag($car_transmission) ?>
                                </select>

                                <label>Fuel Type</label>
                                <select name="fuel" id="car-fuel">
                                    <option value="any" selected>Any</option>
                                    <?php option_tag($car_fuels) ?>
                                </select>

                                <label>License Plate Last Number</label>
                                <select name="plate" id="car-plate">
                                    <option value="any" selected>Any</option>
                                    <?php option_tag($car_plates) ?>
                                </select>
                            </form>
                        </div>

                        <div class="furniture-filter">
                            <?php
                                $furn_types = Array('Furniture', 'Outdoor Furniture', 'Office Furniture & Fixtures', 'Lighting & Fans', 'Home Decor', 'Bedding & Towels', 'Bathroom & Kitchen Fixtures', 'Cleaning & Homecare Supplies', 'Kitchenware & Tableware', 'Security & Locks', 'Gardening', 'Home Improvement & Organization');
                                $furn_condition = Array('New', 'Used');
                            ?>
                            <form action="" id="furniture-filter-form">
                                <label>Type</label>
                                <select name="furn-type" id="furn-type">
                                    <option value="any" selected>Any</option>
                                    <?php option_tag($furn_types) ?>
                                </select>

                                <label>Condition</label>
                                <select name="furn-condition" id="furn-condition">
                                    <option value="any" selected>Any</option>
                                    <?php option_tag($furn_condition) ?>
                                </select>
                            </form>
                        </div>

                        <div class="w-cloth-filter">
                            <?php
                                $w_cloth_types = Array('Activewear', 'Tops', 'Bottoms', 'Dresses & Sets', 'Footwear', 'Coats, Jackets, & Outerwear', 'Bags & Wallets', 'Swimwear', 'Maternity Wear', 'Watches & Accessories', 'Undergarment & Lounges', 'Jewelry & Organizers', 'Others');
                                $w_cloth_sizes = Array('XXS', 'XS', 'S', 'M', 'L', 'XL', 'XXL', 'XXXL', 'XXXXL');
                                $w_cloth_condition = Array('New', 'Used');
                            ?>

                            <form action="" id="w-cloth-filter-form">
                                <label>Type</label>
                                <select name="w-cloth-type" id="w-cloth-type">
                                    <option value="Any" selected>Any</option>
                                    <?php option_tag($w_cloth_types) ?>
                                </select>

                                <label>Size</label>
                                <select name="w-cloth-size" id="w-cloth-size">
                                    <option value="Any" selected>Any</option>
                                    <?php option_tag($w_cloth_sizes) ?>
                                </select>

                                <label>Condition</label>
                                <select name="w-cloth-condition" id="w-cloth-condition">
                                    <option value="Any" selected>Any</option>
                                    <?php option_tag($w_cloth_condition) ?>
                                </select>
                            </form>
                        </div>

                        <div class="m-cloth-filter">
                            <?php
                                $w_cloth_types = Array('Activewear', 'Tops & Sets', 'Bottoms', 'Footwear', 'Coats, Jackets, & Outerwear', 'Bags & Wallets', 'Watches & Accessories', 'Others');
                                $w_cloth_sizes = Array('XXS', 'XS', 'S', 'M', 'L', 'XL', 'XXL', 'XXXL', 'XXXXL');
                                $w_cloth_condition = Array('New', 'Used');
                            ?>

                            <form action="" id="m-cloth-filter-form">
                                <label>Type</label>
                                <select name="m-cloth-type" id="m-cloth-type">
                                    <option value="Any" selected>Any</option>
                                    <?php option_tag($w_cloth_types) ?>
                                </select>

                                <label>Size</label>
                                <select name="m-cloth-size" id="m-cloth-size">
                                    <option value="Any" selected>Any</option>
                                    <?php option_tag($w_cloth_sizes) ?>
                                </select>

                                <label>Condition</label>
                                <select name="m-cloth-condition" id="m-cloth-condition">
                                    <option value="Any" selected>Any</option>
                                    <?php option_tag($w_cloth_condition) ?>
                                </select>
                            </form>
                        </div>

                        <div class="app-filter">
                            <?php
                                $app_types = Array('TV & Entertainment','Kitchen Appliances','Air Conditioning & Heating','Washing Machine & Dryers','Vacuum Cleaner & Housekeeping','Water Heater & Instant Showers','Air Purifier & Dehumidifiers','Electrical, Adaptors, & Sockets','Irons & Steamers','Other Home Appliances');
                                $app_condition = Array('New', 'Used');
                            ?>
                            <form action="" id="app-filter-form">
                                <label>Type</label>
                                <select name="app-type" id="app-type">
                                    <option value="Any" selected>Any</option>
                                    <?php option_tag($app_types) ?>
                                </select>

                                <label>Condition</label>
                                <select name="app-condition" id="app-condition">
                                    <option value="Any">Any</option>
                                    <?php option_tag($app_condition) ?>
                                </select>
                            </form>
                        </div>
                    </div>

                    <hr class="search-divider">

                    <div class="sort-cont">
                        <h2 class="section-title">Sort</h2>

                        <form action="" id="sort-form">
                            <select name="search-sort" id="search-sort">
                                <?php
                                $sort = Array('Recent', 'Price - High to Low', 'Price - Low to High');
                                option_tag($sort);
                            ?>
                            </select>
                        </form>
                    </div>

                    <hr class="search-divider">

                    <div class="price-cont">
                        <h2 class="section-title">Price</h2>

                        <form action="" id="price-form">
                            <input type="number" name="min-price" id="min-price" placeholder="Minimum">
                            <input type="number" name="max-price" id="max-price" placeholder="Maximum">
                        </form>
                    </div>
                </div>
            </section>

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
