<?php
$servername = "localhost";
$username = "quickme1_4211";
$password = "csci4211";
$dbname = "dbvpny1qngaxgp";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$trans_type = $_POST['trans_type'];
$trans_date = $_POST['trans_date'];
$trans_amount = $_POST['trans_amount'];
$lastname = $_POST['lastname'];
$firstname = $_POST['firstname'];
$phone = $_POST['phone'];

// Generate a random transaction ID
$trans_id = mt_rand(1000000000, 9999999999);

$sql = "INSERT INTO savings_transactions (transid, trans_type, trans_date, trans_amount, lastname, firstname, phone) 
        VALUES ('$trans_id', '$trans_type', '$trans_date', '$trans_amount', '$lastname', '$firstname', '$phone')";

if ($conn->query($sql) === TRUE) {
    echo "Transaction created successfully. Transaction ID: " . $trans_id;
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
