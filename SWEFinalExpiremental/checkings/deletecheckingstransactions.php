<?php
$servername = "localhost";
$username = "quickme1_4211";
$password = "csci4211";
$dbname = "dbvpny1qngaxgp";

$trans_id = $_REQUEST['trans_id'];

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "DELETE FROM checking_transactions WHERE transid='$trans_id'";

if ($conn->query($sql) === TRUE) {
    echo "Transaction deleted successfully";
} else {
    echo "Error deleting transaction: " . $conn->error;
}

$conn->close();
?>
