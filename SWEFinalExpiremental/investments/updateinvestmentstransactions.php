<?php
$servername = "localhost";
$username = "quickme1_4211";
$password = "csci4211";
$dbname = "dbvpny1qngaxgp";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$transid = $_POST['transid'];
$trans_type = $_POST['trans_type'];
$trans_date = $_POST['trans_date'];
$trans_amount = $_POST['trans_amount'];
$lastname = $_POST['lastname'];
$firstname = $_POST['firstname'];
$phone = $_POST['phone'];

$sql = "UPDATE investment_transactions SET trans_type='$trans_type', trans_date='$trans_date', trans_amount='$trans_amount', lastname='$lastname', firstname='$firstname', phone='$phone' WHERE transid=$transid";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
?>
