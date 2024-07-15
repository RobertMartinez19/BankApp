<?php
$servername = "localhost";
$username = "quickme1_4211";
$password = "csci4211";
$dbname = "dbvpny1qngaxgp";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$Acct_no = $_POST['Acct_no'];
$lastname = $_POST['lastname'];
$firstname = $_POST['firstname'];
$address = $_POST['address'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$balance = $_POST['Balance'];
$date = $_POST['date'];
$interest_rate = $_POST['interest_rate'];

$sql = "INSERT INTO Investment (Acct_no, lastname, firstname, address, email, phone, Balance, Date, interest_rate) 
        VALUES ('$Acct_no', '$lastname', '$firstname', '$address', '$email', '$phone', '$balance', '$date', '$interest_rate')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
