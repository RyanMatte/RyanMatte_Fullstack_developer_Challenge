<?php
$email = $_POST['email'];
$password1 = md5($_POST['password']);
$servername = "localhost";
$username = "root";
$password = "";
// Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM `fullstack`.`users` WHERE email='$email' AND password ='$password1' ";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "1 result";
        $type = $row['type'];
        if($type == "Admin"){
            header("Location: adminPage.php");
        } else {
            header("Location: homepage.php");
        }

    }
} else {
    header("Location: index.php");
}
$conn->close();
?>
