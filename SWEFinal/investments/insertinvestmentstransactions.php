<?php
$servername = "localhost";
$username = "quickme1_4211";
$password = "csci4211";
$dbname = "dbvpny1qngaxgp";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$trans_type = $_POST['trans_type'];
$trans_date = $_POST['trans_date'];
$trans_amount = $_POST['trans_amount'];
$lastname = $_POST['lastname'];
$firstname = $_POST['firstname'];
$phone = $_POST['phone'];

$sql = "INSERT INTO investment_transactions (trans_type, trans_date, trans_amount, lastname, firstname, phone) 
        VALUES ('$trans_type', '$trans_date', '$trans_amount', '$lastname', '$firstname', '$phone')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
