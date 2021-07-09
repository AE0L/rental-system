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
