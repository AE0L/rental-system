<div id="vehicle-features" class="features-cont">
    <?php
        $car_types = Array('Sedan', 'Truck', 'SUV','MPV', 'VAN');
        $car_transmission = Array('Automatic', 'Manual');
        $car_fuels = Array('Gasoline', 'Diesel', 'LPG', 'Hybrid', 'Electric');
        $car_plates = Array('1/2 Monday', '3/4 Tuesday', '5/6 Wednesday', '7/8 Thursday', '9/0 Friday');
    ?>

    <label>Type</label>
    <select name="car-type" id="car-type">
        <option value="" disabled selected>- Type -</option>
        <?php option_tag($car_types) ?>
    </select>

    <label>Manufacturer</label>
    <input type="text" name="car-manufacturer" id="car-manufacturer" placeholder="Enter manufacturer here...">

    <label>Model</label>
    <input type="text" name="car-model" id="car-model," placeholder="Enter model here...">

    <label>Year</label>
    <select name="car-year" id="car-year">
        <option value="" disabled selected>- Year -</option>
        <?php
            for ($x = 2021; $x >= 1970; $x--) {
                echo "<option value=\"{$x}\">{$x}</option>";
            }
        ?>
    </select>

    <label>Transmission</label>
    <select name="car-transmission" id="car-transmission">
        <option value="" disabled selected>- Transmission -</option>
        <?php option_tag($car_transmission) ?>
    </select>

    <label>Fuel Type</label>
    <select name="car-fuel" id="car-fuel">
        <option value="" disabled selected>- Fuel Type -</option>
        <?php option_tag($car_fuels) ?>
    </select>

    <label>License Plate Last Number</label>
    <select name="car-plate" id="car-plate">
        <option value="" disabled selected>- Plate Number -</option>
        <?php option_tag($car_plates) ?>
    </select>
</div>
