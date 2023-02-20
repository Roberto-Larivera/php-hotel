<?php
$hotels = [

    [
        'name' => 'Hotel Belvedere',
        'description' => 'Hotel Belvedere Descrizione',
        'parking' => true,
        'vote' => 4,
        'distance_to_center' => 10.4
    ],
    [
        'name' => 'Hotel Futuro',
        'description' => 'Hotel Futuro Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 2
    ],
    [
        'name' => 'Hotel Rivamare',
        'description' => 'Hotel Rivamare Descrizione',
        'parking' => false,
        'vote' => 1,
        'distance_to_center' => 1
    ],
    [
        'name' => 'Hotel Bellavista',
        'description' => 'Hotel Bellavista Descrizione',
        'parking' => false,
        'vote' => 5,
        'distance_to_center' => 5.5
    ],
    [
        'name' => 'Hotel Milano',
        'description' => 'Hotel Milano Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 50
    ],

];

?>

<?php  ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Hotel</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container py-5">
        <div class="row mb-5">
            <div class="col text-center">
                <h1>
                    PHP Hotels
                </h1>
            </div>
        </div>
        <div class="row mb-5">
            <div class="col">
                <div>
                    <?php
                    foreach ($hotels as $hotel) {
                        echo '<ul>';
                        foreach ($hotel as $hotelKey => $hotelValue) {
                            echo '<li>';
                            echo $hotelKey . ': ' . $hotelValue;
                            echo '</li>';
                        }
                        echo '</ul>';
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="row mb-5">
            <div class="col">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Description</th>
                            <th scope="col">Parking</th>
                            <th scope="col">Vote</th>
                            <th scope="col">Distance to center</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($hotels as $hotelsKey => $hotel) {
                            echo '<tr>';
                            echo '<th scope="row">' . $hotelsKey . '</th>';
                            foreach ($hotel as $hotelKey => $hotelValue) {
                                echo '<th>';
                                echo $hotelValue;
                                echo '</th>';
                            }
                            echo '</tr>';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>



</body>

</html>