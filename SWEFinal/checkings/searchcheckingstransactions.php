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

$sql = "SELECT * FROM checking_transactions WHERE transid='$trans_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "Transaction ID: " . $row["transid"]. "<br>".
             "Transaction Type: " . $row["trans_type"]. "<br>".
             "Transaction Date: " . $row["trans_date"]. "<br>".
             "Transaction Amount: " . $row["trans_amount"]. "<br>".
             "Last Name: " . $row["lastname"]. "<br>".
             "First Name: " . $row["firstname"]. "<br>".
             "Phone: " . $row["phone"]. "<br><br>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>
