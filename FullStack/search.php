
<html>
<head>
    <title>Search</title>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <meta name="viewport" content="initial-scale=1.0">
    <link rel="icon" href="top.png">
    <meta charset="utf-8">

    <style>
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
            background-color: #AFDB88;
        }
        .navbar{
            display: block;
            position: fixed;
            width: 100%;
            z-index: 3;
        }
    </style>
</head>
<nav class="navbar navbar-expand-lg navbar-light bg-light" >
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
<br><br><br>
<div class="card" style="margin-right: 100px;margin-left: 100px">
    <div class="card-body">
        <h1 >Search Results</h1>
    </div>
</div>
<form action="results.php" method="POST">
    <div class="form-group">
        <div class="list-group" style="margin-right: 100px;margin-left: 100px">
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            // Create connection
            $conn = new mysqli($servername, $username, $password);
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            $var = $_POST['search'];
            $sql = "SELECT * FROM fullstack.labs WHERE title = '$var' OR city = '$var' OR country = '$var'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    $title = $row["title"];
                    $country = $row["country"];
                    $city = $row["city"];
                    $latitude = $row["latitude"];
                    $longitude = $row["longitude"];
                    echo "<button type = \"submit\" method = \"post\" class=\"list-group-item list-group-item-action flex-column align-items-start\" name =\"submit_btn\" value= $latitude>";
                    echo "<div class=\"d-flex w-100 justify-content-between\">";
                    echo "<h5 class=\"mb-1\">$title</h5>";
                    echo "</div>";
                    echo "<p class=\"mb-1\"> $city</p>";
                    echo "<p class=\"mb-1\"> $country</p>";
                    echo "</button>";
                }
            } else {
                echo "<br>";
                echo "<div class=\"card\" style=\"margin-right: 100px;margin-left: 100px\">";
                echo "    <div class=\"card-body\">";
                echo "        <h3 >0 Results</h3>";
                echo "    </div>";
                echo "</div>";
            }
            ?>
        </div>
    </div>
</form>
</body>
</html>

