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

$sql = "SELECT * FROM investment_transactions WHERE transid=$transid";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "Trans ID: " . $row["transid"]. "<br>".
             "Trans Type: " . $row["trans_type"]. "<br>".
             "Trans Date: " . $row["trans_date"]. "<br>".
             "Trans Amount: $" . $row["trans_amount"]. "<br>".
             "Last Name: " . $row["lastname"]. "<br>".
             "First Name: " . $row["firstname"]. "<br>".
             "Phone: " . $row["phone"]. "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>
