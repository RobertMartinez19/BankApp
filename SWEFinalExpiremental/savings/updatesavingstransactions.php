<?php
$servername = "localhost";
$username = "quickme1_4211";
$password = "csci4211";
$dbname = "dbvpny1qngaxgp";

$trans_id = $_REQUEST['transid'];
$trans_amount = $_REQUEST['trans_amount'];

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "UPDATE savings_transactions SET trans_amount='$trans_amount' WHERE transid='$transid'";

if ($conn->query($sql) === TRUE) {
    echo "Transaction amount updated successfully";
} else {
    echo "Error updating transaction amount: " . $conn->error;
}

$conn->close();
?>
