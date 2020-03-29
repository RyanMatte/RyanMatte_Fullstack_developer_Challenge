<html>
<head>
    <title>Update</title>
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
    </style>
</head>

<body>
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
            $privacy = $row["privacy"];
        }
    } else {
        echo "0 results";
    }
    $conn->close();
    session_start();
    $_SESSION["title"] = $title;
    ?>
    <div class="jumbotron" style = "margin-right: 10%;margin-left: 10%; margin-top: 50px">
        <h1 class="display-4"> Update Lab Info for <?php echo $title ?></h1>
        <hr class="my-4">
        <h3>Please enter the Lab Details</h3>
    </div>

    <form style="margin-right: 20%;margin-left: 20%; margin-top: 50px" action="updater.php" method="POST">
        <div class="form-group">
            <input type="text" class="form-control" id="<?php echo $address ?>" aria-describedby="emailHelp" placeholder="Enter the address" name="address" value="<?php echo $address ?>">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" id="<?php echo $country ?>" aria-describedby="emailHelp" placeholder="Enter the Country" name="country" value="<?php echo $country ?>">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" id="<?php echo $city ?>" aria-describedby="emailHelp" placeholder="Enter the City" name="city" value="<?php echo $city ?>">
        </div>
        <div class="form-check">
            <input type="checkbox" class="form-check-input" name = "status" id="exampleCheck1" <?php if ($status == 1) { echo "checked";}?> value="1">
            <label class="form-check-label" for="exampleCheck1">Open?</label>
        </div>
        <div class="form-check">
            <input type="checkbox" class="form-check-input" name = "private" id="exampleCheck1" <?php if ($privacy == "Public") { echo "checked";}?> value="1">
            <label class="form-check-label" for="exampleCheck1">Is this Public?</label>
        </div>
        <br>
        <button type="submit" class="btn btn-light">Submit</button>
    </form>
</body>
</html>
