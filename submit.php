<?php
$server = "localhost";
$username = "root";
$password = "";
$dbname = "registration_form";

// Create connection
$con = new mysqli($server, $username, $password, $dbname);

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
} else {
    echo "Connected successfully<br>";
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $date_of_birth = $_POST['dob'];
    $gender = $_POST['gender'];

    // Prepare an SQL statement for execution
    $stmt = $con->prepare("INSERT INTO test (name, Email, Phone, Date_of_Birth, Gender) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $name, $email, $phone, $date_of_birth, $gender);

    // Execute the prepared statement
    if ($stmt->execute()) {
        echo "Data submitted successfully";
    } else {
        echo "Query failed: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
} else {
    echo "No data submitted";
}

// Close the connection
$con->close();
?>
