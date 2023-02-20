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

//$_GET('');

//$nameHotel = $_GET['name_hotel'] ?? '';
$voteHotel = $_GET['vote_hotel'] ?? 0;

$parkingHotel = $_GET['parking_hotel'] ?? null;
var_dump($parkingHotel);

if ($parkingHotel != 'null') {
    $parkingHotel = filter_var($_GET['parking_hotel'], FILTER_VALIDATE_BOOLEAN);
} else {
    $parkingHotel = null;
}
var_dump($parkingHotel);


echo '<br><br><br><br>';
//var_dump($nameHotel);
//echo '<br>';
var_dump($voteHotel);
echo '<br>';
var_dump($parkingHotel);
$filterList = array();
$filterListBoll = false;
$resetButton = false;

//

if ($voteHotel != 0 ||  $parkingHotel != null) {
    $filterListBoll = true;
    $filterList = array();

    // if($nameHotel != null &&  $nameHotel != ''){
    //     foreach ($hotels as $hotelsKey => $hotel) {
    //         if($nameHotel){
    //             $filterName = in_array($nameHotel, $hotel);
    //             if($filterName ){
    //                 echo 'entrato name <br>';

    //                 $filterList[]= $hotel;
    //             }
    //         }
    //     }
    // }
    if ($voteHotel != 0 && $parkingHotel != null) {
        foreach ($hotels as $hotelsKey => $hotel) {

            if ($hotel['vote'] >= $voteHotel && $hotel['parking'] === $parkingHotel) {

                echo '<br> entrato vote  ';

                $filterList[] = $hotel;
            }
        }
    } else {
        if ($voteHotel != 0) {
            foreach ($hotels as $hotelsKey => $hotel) {

                if ($hotel['vote'] >= $voteHotel) {

                    echo '<br> entrato vote  ';

                    $filterList[] = $hotel;
                }
            }
        }
        if ($parkingHotel != null) {
            echo '<br> #### diverso null';
            foreach ($hotels as $hotelsKey => $hotel) {

                if ($hotel['parking'] === $parkingHotel) {
                    echo '<br> entrato parking ';
                    var_dump($parkingHotel);
                    var_dump($hotel['parking']);

                    $filterList[] = $hotel;
                }
            }
        }
    }
} else {
    $filterListBoll = false;
}


if ($resetButton) {
    $filterList = [];
    $filterListBoll = false;
    $nameHotel = '';
    $voteHotel = 0;
    $parkingHotel = '';
    $resetButton = false;
}
//echo '<br> ************ filterlistboll';
//var_dump($filterListBoll);

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
        <pre>
            <?php
            //echo var_dump($filterList);
            ?>
        </pre>

        <div class="row">
            <div class="col-6 offset-3">
                <form action="" method="GET">

                    <!-- <div class="row">
                        <div class="col-auto">
                            <label for="filter_name" class="form-label">Name Hotel</label>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-auto">
                            <input type="text" class="form-control" id="filter_name" placeholder="Hotel Example" name="name_hotel">
                        </div>
                    </div> -->

                    <div class="row">
                        <div class="col-auto">
                            <label for="filter_hotel" class="form-label">Vote Hotel</label>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-10 d-flex gap-5">
                            <span>
                                0
                            </span>
                            <input type="range" class="form-range" min="0" max="5" value="0" id="filter_hotel" name="vote_hotel">
                            <span>
                                5
                            </span>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="filter_parking-1" value="null" checked name="parking_hotel">
                                <label class="form-check-label" for="filter_parking-1">
                                    Everyone
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="filter_parking-1" value="true" name="parking_hotel">
                                <label class="form-check-label" for="filter_parking-1">
                                    With parking
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="filter_parking-2" value="false" name="parking_hotel">
                                <label class="form-check-label" for="filter_parking-2">
                                    Without parking
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-auto">
                            <div class="col-auto">
                                <button type="submit" class="btn btn-primary mb-3">
                                    Filter
                                </button>
                                <button reset  value="true" class="btn btn-primary mb-3">
                                    Reset
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
                        if ($filterListBoll) {
                            foreach ($filterList as $hotelsKey => $hotel) {
                                echo '<tr>';
                                echo '<th scope="row">' . $hotelsKey + 1 . '</th>';
                                foreach ($hotel as $hotelKey => $hotelValue) {
                                    echo '<th>';
                                    if (is_bool($hotelValue)) {
                                        echo ($hotelValue ? 'yes' : 'no');
                                    } else {
                                        echo $hotelValue;
                                    }
                                    echo '</th>';
                                }
                                echo '</tr>';
                            }
                        } else {

                            foreach ($hotels as $hotelsKey => $hotel) {
                                echo '<tr>';
                                echo '<th scope="row">' . $hotelsKey + 1 . '</th>';
                                foreach ($hotel as $hotelKey => $hotelValue) {
                                    echo '<th>';
                                    if (is_bool($hotelValue)) {
                                        echo ($hotelValue ? 'yes' : 'no');
                                    } else {
                                        echo $hotelValue;
                                    }
                                    echo '</th>';
                                }
                                echo '</tr>';
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>



</body>

</html>