<html>
<head>
    <title>Admin</title>
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
<body>
<div class="list-group" style="margin-right: 100px; margin-left: 100px; padding-top: 30px">
    <div class="card" >
        <div class="card-body">
            <h1>Select a Lab you wish to update</h1>
            <p>Or click here to add a new entry</p>
            <a href="newEntry.php" class="btn btn-outline-dark my-2 my-sm-0" type="submit">Add New Entry</a>
            <a href="index.php" class="btn btn-outline-dark my-2 my-sm-0" type="submit">Logout</a>
        </div>
    </div>
    <br>
    <form action="update.php" method="POST">
        <div class="form-group">
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

            $sql = "SELECT *  FROM fullstack.labs GROUP BY title";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    $title = $row["title"];
                    $latitude = $row["latitude"];
                    echo "<button type=\"submit\" method = \"POST\" class=\"list-group-item list-group-item-action\" name=\"submit_btn\" value= $latitude>$title</button>";
                }
            } else {
                echo "0 results";
            }
            $conn->close();
            ?>
        </div>
    </form>
</div>
</body>
</html>
