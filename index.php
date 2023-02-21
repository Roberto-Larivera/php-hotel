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
$voteHotel = $_GET['vote_hotel'] ?? 1;
/*
$parkingHotel = $_GET['parking_hotel'] ?? null;
//var_dump( $parkingHotel);
if ($parkingHotel != 'null') {
    $parkingHotel = filter_var($parkingHotel, FILTER_VALIDATE_BOOLEAN);
} else {
    $parkingHotel = null;
}
*/
if (isset($_GET['parking_hotel'])) {
    $parkingHotel = $_GET['parking_hotel'];
    if ($parkingHotel == 'true') {
        $parkingHotel = true;
    } elseif ($parkingHotel == 'false') {
        $parkingHotel = false;
    }
} else {
    $parkingHotel = '';
}

$filterList = array();
$filterListBoll = false;
$resetButton = false;

if (($parkingHotel !== '')) {
    $filterList = array();
    
        $filterListBoll = true;
        foreach ($hotels as $hotelsKey => $hotel) {

            if ($hotel['vote'] >= $voteHotel && $hotel['parking'] == $parkingHotel) {
                $filterList[] = $hotel;
            }
        }
    
} elseif ($voteHotel > 1) {
    $filterListBoll = true;
    $filterList = array();
    foreach ($hotels as $hotelsKey => $hotel) {

        if ($hotel['vote'] >= $voteHotel) {

            $filterList[] = $hotel;
        }
    }
} else {
    $filterListBoll = false;
    $filterList = array();
}


if ($resetButton) {
    $filterList = [];
    $filterListBoll = false;
    $nameHotel = '';
    $voteHotel = 0;
    $parkingHotel = 'null';
    $resetButton = false;
}

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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./style.css">
</head>

<body>
    <div class="container py-5">
        <div class="row mb-5">
            <div class="col text-center fw-bolder">
                <h1>
                    PHP Hotels
                </h1>
            </div>
        </div>

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
                                1
                            </span>
                            <input type="range" class="form-range" min="1" max="5" value="1" id="filter_hotel" name="vote_hotel">
                            <span>
                                5
                            </span>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="filter_parking-1" value="" checked name="parking_hotel">
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
                                <button type="submit" class="btn btn-success mb-3">
                                    Filter
                                </button>
                                <button reset class="btn btn-outline-danger mb-3">
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
                <table class="table table-striped">
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
                <?php
                if (count($filterList) == 0 && $filterListBoll == true) {
                    echo '<div class="text-center fs-1 ">
                            <h2 class="text-bg-danger p-3 rounded-pill ">
                                Ci dispiace, non sono stati trovati Hotel con questi filtri
                            </h2>
                            <span class="" style="font-size: 5rem;">
                                &#128546;
                            </span>
                        </div>';
                }
                ?>
            </div>
        </div>
    </div>



</body>

</html>