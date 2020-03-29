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
$sql = "INSERT INTO `fullstack`.`users`
(`username`,
`password`,
`type`,
`email`)
VALUES
('$email',
'$password1',
'User',
'$email')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    header("location: homepage.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    header("location: register.php");
}
$conn->close();
?>

