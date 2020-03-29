<?php
$address = $_POST['address'];
$country = $_POST['country'];
$city = $_POST['city'];
$googlequery = preg_replace('/\s+/', '+', $address);
session_start();
$title = $_SESSION["title"];
session_abort();
$status = 0;
$privacy = "";
if (empty($_POST['status'])) {
    $status = 0;
} else {
    $status = 1;
}
if (empty($_POST['private'])) {
    $privacy = "Private";
} else {
    $privacy = "Public";
}
$servername = "localhost";
$username = "root";
$password = "";

// getting new coordinates using the google maps api
$geocode = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address='.$googlequery.'&key=AIzaSyCfPwAGXZq_o2ge5zPmE0L_rlaRZVlnY9I');

$output= json_decode($geocode);

$lat = $output->results[0]->geometry->location->lat;
$long = $output->results[0]->geometry->location->lng;
//the results are a new lat and long to store
// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "UPDATE `fullstack`.`labs` SET
`privacy` = '$privacy',
`latitude` = '$lat',
`longitude` = '$long',
`address` = '$address',
`city` = '$country',
`country` = '$country',
`status` = '$status'
WHERE `title` = '$title';
";
if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
    header("Location: adminpage.php");
} else {
    echo "Error updating record: " . $conn->error;
    header("Location: adminpage.php");
}
mysqli_close($conn);

?>