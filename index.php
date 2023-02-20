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

        <!-- <div class="row mb-5">
            <div class="col">
                <div>
                    <?php
                    /*
                    foreach ($hotels as $hotel) {
                        echo '<ul>';
                        foreach ($hotel as $hotelKey => $hotelValue) {
                            echo '<li>';
                            echo $hotelKey . ': ' . $hotelValue;
                            echo '</li>';
                        }
                        echo '</ul>';
                    }
                    */
                    ?>
                </div>
            </div>
        </div> -->

        <div class="row">
            <div class="col-6 offset-3">
                <form action="" method="GET">

                    <div class="row">
                        <div class="col-auto">
                            <label for="filter_name" class="form-label">Name Hotel</label>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-auto">
                            <input type="text" class="form-control" id="filter_name" placeholder="Hotel Example" name="name_hotel">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-auto">
                            <label for="filter_hotel" class="form-label">Vote Hotel</label>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-10 d-flex gap-5">
                            <span>
                                1
                            </span>
                            <input type="range" class="form-range" min="1" max="5" id="filter_hotel" name="vote_hotel">
                            <span>
                                5
                            </span>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col">
                            <div class="form-check">
                                <input class="form-check-input" type="radio"  id="filter_parking-1" checked value="true" name="parking_hotel">
                                <label class="form-check-label" for="filter_parking-1">
                                    With parking
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio"  id="filter_parking-2" value="false" name="parking_hotel">
                                <label class="form-check-label" for="filter_parking-2">
                                    Without parking
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-auto">
                            <div class="col-auto">
                                <button class="btn btn-primary mb-3">
                                    Filter
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
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