<?php
// Database connection details
$servername = "localhost";
$username = "quickme1_4211";
$password = "csci4211";
$dbname = "dbvpny1qngaxgp";

// Establishing connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handling form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieving form data
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Hashing the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Inserting the user into the database
    $sql = "INSERT INTO users (username, password) 
            VALUES ('$username', '$hashed_password')";

    if ($conn->query($sql) === TRUE) {
        // Registration successful, display message
        echo "Registration successful! <a href='login.html'>Login now</a>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
