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

    // Fetching user record from the database
    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // User found, verify password
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            // Password correct, login successful
            // Redirecting to homepage or dashboard
            header("Location: ../homepage/homepage.html");
            exit();
        } else {
            // Password incorrect
            echo "Incorrect password! <a href='login.html'>Go back</a>";
        }
    } else {
        // User not found
        echo "User not found! <a href='login.html'>Go back</a>";
    }
}

$conn->close();
?>
