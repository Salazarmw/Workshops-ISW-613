<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Current Date and Time</title>
</head>
<body>
    <h1>Date and Time</h1>
    <p>
        <?php
        // Set the time zone of the desired region
        date_default_timezone_set('America/Costa_Rica');

        // Get the current date and time
        $currentDateTime = date('d-m-Y- H:i:s');

        // Display the current date and time
        echo "The current date and time is: " . $currentDateTime;
        ?>
    </p>
</body>
</html>
