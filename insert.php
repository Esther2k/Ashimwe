<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ashdecor";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if(isset($_POST['add'])){


// Set parameters and execute
$first_name = $_POST['fname'];

$email = $_POST['email'];
$phone_number = $_POST['pnumber'];
$location = $_POST['location'];
$username = $_POST['username'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO registration (first_name, email, phone_number, location, password)VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssss", $first_name, $email, $phone_number, $location, $password);

$stmt->execute();

echo "New record created successfully";
}
//$stmt->close();
$conn->close();
?>
