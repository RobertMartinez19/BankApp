<?php
$servername = "localhost";
$username = "quickme1_4211";
$password = "csci4211";
$dbname = "dbvpny1qngaxgp";

$trans_id = $_REQUEST['transid'];

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT *, ROUND((trans_amount + (trans_amount * interest_rate)), 2) AS balance_with_interest,
                ROUND((trans_amount * interest_rate), 2) AS interest_earned
        FROM savings_transactions WHERE transid='$trans_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $balance_with_interest = '$' . number_format($row["balance_with_interest"], 2);
        $interest_earned = '$' . number_format($row["interest_earned"], 2);
        
        echo "Transaction ID: " . $row["transid"]. "<br>".
             "Transaction Type: " . $row["trans_type"]. "<br>".
             "Transaction Date: " . $row["trans_date"]. "<br>".
             "Transaction Amount: $" . $row["trans_amount"]. "<br>".
             "Balance with Interest: " . $balance_with_interest . "<br>".
             "Interest Earned: " . $interest_earned . "<br>".
             "Last Name: " . $row["lastname"]. "<br>".
             "First Name: " . $row["firstname"]. "<br>".
             "Phone: " . $row["phone"]. "<br><br>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>
