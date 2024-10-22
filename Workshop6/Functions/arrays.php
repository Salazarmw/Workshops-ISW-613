<?php
// Function to display capitals and countries
function mostrarCapitales()
{
    $ceu = array(
        "Italy" => "Rome",
        "Luxembourg" => "Luxembourg",
        "Belgium" => "Brussels",
        "Denmark" => "Copenhagen",
        "Finland" => "Helsinki",
        "France" => "Paris",
        "Slovakia" => "Bratislava",
        "Slovenia" => "Ljubljana",
        "Germany" => "Berlin",
        "Greece" => "Athens",
        "Ireland" => "Dublin",
        "Netherlands" => "Amsterdam",
        "Portugal" => "Lisbon",
        "Spain" => "Madrid",
        "Sweden" => "Stockholm",
        "United Kingdom" => "London",
        "Cyprus" => "Nicosia",
        "Lithuania" => "Vilnius",
        "Czech Republic" => "Prague",
        "Estonia" => "Tallin",
        "Hungary" => "Budapest",
        "Latvia" => "Riga",
        "Malta" => "Valetta",
        "Austria" => "Vienna",
        "Poland" => "Warsaw"
    );

    // Sort by country name (array keys)
    ksort($ceu);

    foreach ($ceu as $country => $capital) {
        echo "The capital of $country is $capital.<br>";
    }
}

// Function to calculate the temperature
function calcularTemperatura()
{
    $temperatures = array(78, 60, 62, 68, 71, 68, 73, 85, 66, 64, 76, 63, 75, 76, 73, 68, 62, 73, 72, 65, 74, 62, 62, 65, 64, 68, 73, 75, 79, 73);

    // Calculate the average temperature
    $average = array_sum($temperatures) / count($temperatures);
    echo "Average Temperature is : " . round($average, 1) . "<br>";

    // Remove duplicates
    $unique_temperatures = array_unique($temperatures);

    // Sort temperatures
    sort($unique_temperatures);

    // Get the five lowest temperatures
    $lowest_temperatures = array_slice($unique_temperatures, 0, 5);
    echo "List of 5 lowest temperatures : " . implode(", ", $lowest_temperatures) . "<br>";

    // Get the five highest temperatures
    $highest_temperatures = array_slice($unique_temperatures, -5);
    echo "List of 5 highest temperatures : " . implode(", ", $highest_temperatures) . "<br>";
}
