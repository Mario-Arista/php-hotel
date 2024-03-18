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

    // Filtraggio degli hotel in base alla select
    if (isset($_GET['parcheggio'])) {

        $filteredHotels = [];

        foreach ($hotels as $hotel) {

            if ($_GET['parcheggio'] == 2 && $hotel['parking'] == true) {

                $filteredHotels[] = $hotel;

            } else if ($_GET['parcheggio'] == 3 && $hotel['parking'] == false) {
                $filteredHotels[] = $hotel;

            } else if ($_GET['parcheggio'] == 1) {
                $filteredHotels = $hotels;
            }
        }

    } else {

        $filteredHotels = $hotels;
    }

?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Hotel</title>

    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<body class="bg-dark">

    <header class="container-fluid bg-secondary">
        <h1 class="text-warning fs-1 p-3 text-center">TROVA IL TUO HOTEL</h1>
    </header>
    
    <main class="container-fluid"> 

        <div class="row-col-1">

            <div class="col-6 m-auto pt-4">
                <form action="index.php" method="GET">

                    <select class="form-select" name="parcheggio" aria-label="Default select example">
                        <option selected value="">Filtra per parcheggio</option>
                        <option value="1">Tutti gli Hotel</option>
                        <option value="2">Con Parcheggio</option>
                        <option value="3">Senza Parcheggio</option>
                    </select>

                    <!-- <div>
                        <label class="text-white p-2" for="parola">Cerca per voto (es. almeno 2):</label>
                        <input class="w-100 p-2 border border-0 rounded-3" name="voto" id="voto" type="number" placeholder="2">
                    </div> -->

                    <input id="invia" class="text-dark bg-warning p-2 w-100 border border-0 rounded-3 mt-3" type="submit" label="INVIA">
                </form>

            </div>

            <div class="col-6 m-auto mt-5">
                <table class="table">
                    <thead>
                        <tr>
                            <?php 
                                foreach ($hotels[0] as $key => $value) {
                                    $formatted_key = str_replace('_', ' ', strtoupper($key));
                                    echo "<th>$formatted_key</th>";
                                }
                            ?>
                        </tr>
                    </thead>

                    <tbody>
                        <?php 
                            foreach ($filteredHotels as $currentHotel) {

                                echo "<tr>";
                                foreach ($currentHotel as $key => $value) {
                                    if ($key == 'parking') {
                                        echo "<td>" . ($value ? "available" : "not available") . "</td>";
                                    } else {
                                        echo "<td>$value</td>";
                                    }
                                }
                                echo "</tr>";
                            }
                        ?>

                    </tbody>
                </table>
            </div>
        </div>
    </main>


     <!-- BOOTSTRAP -->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>