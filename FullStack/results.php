<html>
<head>
    <title>Result</title>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <meta name="viewport" content="initial-scale=1.0">
    <meta charset="utf-8">
    <link rel="icon" href="top.png">
    <style>
        #map {
            height: 50%;
        }
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
            background-color: #AFDB88;
        }
    </style>
</head>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <img src="logo.png" style="height: 30px; margin-right: 5px">
        <ul class="navbar-nav mr-auto">

            <li class="nav-item active">
                <a class="nav-link" href="homepage.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="index.php">Logout</a>
            </li>
        </ul>
        <form action="search.php" method="POST" class="form-inline my-2 my-lg-0">
            <div class="form-group">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search">
                <button class="btn btn-outline-dark my-2 my-sm-0" type="submit">Search</button>
            </div>
        </form>
    </div>
</nav>
<body>
<div id="map"></div>
<?php

$servername = "localhost";
$username = "root";
$password = "";
// Create connection
$conn = new mysqli($servername, $username, $password);
$title = $_POST['submit_btn'];
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM fullstack.labs WHERE latitude = '$title'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $address = $row["address"];
        $title = $row["title"];
        $country = $row["country"];
        $city = $row["city"];
        $latitude = $row["latitude"];
        $longitude = $row["longitude"];
        $status = $row["status"];
    }
} else {
    echo "0 results";
}
$conn->close();
?>
<script>
    var map;
    function initMap(listener) {
        var map = new google.maps.Map(document.getElementById('map'), {
            center: {lat: <?php echo $latitude ?>, lng: <?php echo $longitude ?>},
            zoom: 18
        });
        var marker = new google.maps.Marker({
            position: {lat: <?php echo $latitude ?>, lng: <?php echo $longitude ?>},
            map: map,
            title: '<?php echo $title?>'
        });
    }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCfPwAGXZq_o2ge5zPmE0L_rlaRZVlnY9I&callback=initMap"
        async defer></script>

<div class="card mx-auto" style="width: 50%; margin-top: 20px">
    <div class="card-body">
        <h5 class="card-title"><?php echo $title ?></h5>
        <h6 class="card-subtitle mb-2 text-muted"><?php echo $address ?></h6>
        <p class="card-text text-muted"><?php echo $city ?> , <?php echo $country ?></p>
        <?php if($status == 1) {
            echo "<p class=\"card-text text-muted\" style=\"color: #AFDB88\">open</p>";
        } else {
            echo "<p class=\"card-text text-muted\" style=\"color: gray\">This Lab has closed down</p>";
        }
        ?>

    </div>
</div>
</body>
</html>
<?php
require __DIR__.'/../bootstrap/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
);
$kernel->terminate($request, $response);
?>