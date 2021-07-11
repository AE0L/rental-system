<?php
    require_once '../php/header.php';

    function change_category($category) {
        echo "<script>change_category('{$category}')</script>";
    }
	
	// if ($cat_property = 'pages/catalogue?category=property/estate')
	// {
	// 	$cat_components = parse_url($cat_property);
	// 	parse_str($cat_components['query'], $params);
	// 	echo $params[''];
	// }
	
	// else if ($cat_vehicle = 'pages/catalogue?category=vehicle')
	// {
	// 	$cat_components = parse_url($cat_property);
	// 	parse_str($cat_components['query'], $params);
	// 	echo $params[''];
	// }
	
	// else if ($cat_appliances = 'pages/catalogue?category=appliances')
	// {
	// 	$cat_components = parse_url($cat_property);
	// 	parse_str($cat_components['query'], $params);
	// 	echo $params[''];
	// }
	
	// else if ($cat_furniture = 'pages/catalogue?category=furniture')
	// {
	// 	$cat_components = parse_url($cat_property);
	// 	parse_str($cat_components['query'], $params);
	// 	echo $params[''];
	// }
	
	// else if ($cat_clothing = 'pages/catalogue?category=clothing')
	// {
	// 	$cat_components = parse_url($cat_property);
	// 	parse_str($cat_components['query'], $params);
	// 	echo $params[''];
	// }
	
	// else ($cat_other = 'pages/catalogue?category')
	// {
	// 	$cat_components = parse_url($cat_property);
	// 	parse_str($cat_components['query'], $params);
	// 	echo $params[''];
	// }
?>

<!--
if($category == 'Property/Estate')
	{
		$query = "SELECT * FROM category_property";
	}
	else if ($category == 'Vehicle')
	{
		$query = "SELECT * FROM category_vehicle";
	}
	else if ($category == 'Appliances')
	{
		$query = "SELECT * FROM category_appliances";
	}
	else if ($category == 'Furniture')
	{
		$query = "SELECT * FROM category_furniture";
	}
	else if ($category == 'Clothing')
	{
		$query = "SELECT * FROM category_male_clothing && category_female_clothing";
	}
	else 
	{
		$query = "SELECT * FROM category_other";
	}
-->

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

    <body id="body">
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

            <div id="mobile-filter-modal" class="mobile-filter-cont">
                <div class="mobile-filter-header">
                    <span id="mobile-filter-close" class="fas fa-times"></span>
                    <span class="title">Filter</span>
                </div>

                <div class="mobile-filter-content">
                    <?php
                        $is_mobile = true;
                        include '../partials/filters/property.php';
                        include '../partials/filters/vehicle.php';
                        include '../partials/filters/furniture.php';
                        include '../partials/filters/m-clothing.php';
                        include '../partials/filters/w-clothing.php';
                        include '../partials/filters/appliances.php';
                    ?>

                    <hr class="search-divider">

                    <div class="price-cont">
                        <h2 class="section-title">Price</h2>

                        <form action="" id="price-form">
                            <input type="number" name="min-price" id="min-price" placeholder="Minimum">
                            <input type="number" name="max-price" id="max-price" placeholder="Maximum">
                        </form>
                    </div>

                    <input class="filter-button" type="submit" value="Apply filter">
                </div>
            </div>

            <div id="mobile-sort-modal" class="mobile-sort-cont">
                <div class="mobile-sort-header">
                    <span id="mobile-sort-close" class="fas fa-times"></span>
                    <span class="title">Sort</span>
                </div>

                <div class="mobile-sort-content">
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

                    <input class="sort-button" type="submit" value="Sort catalogue">
                </div>
            </div>

            <div id="mobile-category-modal" class="mobile-category-cont">
                <div class="mobile-category-header">
                    <span id="mobile-category-close" class="fas fa-times"></span>
                    <span class="title">Categories</span>
                </div>

                <div id="mobile-category-cont" class="mobile-category-content">
                    <?php
                        $categories = Array("Any", "Property/Estate", "Vehicle", 'Furniture', 'TV & Home Appliances', "Women's Wear", "Men's Wear", "Others");

                        foreach ($categories as $category) {
                            echo "<div id=\"categ-{$category}\" class=\"category-item\">{$category}</div>";
                        }
                    ?>
                </div>
            </div>
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
                        <h2 class="section-title">Filter</h2>

                        <?php
                            $is_mobile = false;

                            include '../partials/filters/property.php';
                            include '../partials/filters/vehicle.php';
                            include '../partials/filters/furniture.php';
                            include '../partials/filters/w-clothing.php';
                            include '../partials/filters/m-clothing.php';
                            include '../partials/filters/appliances.php';
                        ?>
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

                    <input class="filter-button" type="submit" value="Apply filter">
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
        <script src="../js/catalogue.js"></script>
        <script src="https://kit.fontawesome.com/2b03626812.js" crossorigin="anonymous"></script>

        <?php
            $cat = $_GET['category'];

            switch ($cat) {
                case 'property':
                    change_category('property');
					$query = "SELECT * FROM category_property";
                    break;
                case 'vehicle':
                    change_category('vehicle');
					$query = "SELECT * FROM category_vehicle";
                    break;
                case 'appliances':
                    change_category('appliances');
					$query = "SELECT * FROM category_appliances";
                    break;
                case 'furniture':
                    change_category('furniture');
					$query = "SELECT * FROM category_furniture";
                    break;
                case 'clothing':
                    change_category('m-cloth');
					$query = "SELECT * FROM category_male_clothing && category_female_clothing";
                    break;

                default: $query = "SELECT * FROM category_other";
            }
			
			$sql = mysqli_query($conn, $query);
			
			if (mysql_num_rows($sql)>0)
			{
				while ($row = mysqli_fetch_array($sql))
				{
					print_r($row);
				}
			}
        ?>
    </body>

</html>
