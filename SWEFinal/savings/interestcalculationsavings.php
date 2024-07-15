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
$month = $_POST['month'];

$sql = "SELECT Balance, interest_rate, date FROM savings WHERE Acct_no='$Acct_no'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $balance = $row["Balance"];
    $interest_rate = $row["interest_rate"];
    $date = $row["Date"];

    // Convert date to timestamp
    $timestamp = strtotime($date);
    
    // Calculate number of months since account creation
    $months_since_creation = round(abs(time() - $timestamp) / (30 * 24 * 60 * 60));
    
    // Calculate interest
    $monthly_interest_rate = $interest_rate / 12 / 100;
    $interest = $balance * $monthly_interest_rate * $months_since_creation;

    // Add interest to the balance
    $balance_with_interest = $balance + $interest;

    echo "Account Number: " . $Acct_no . "<br>";
    echo "Current Balance: $" . $balance . "<br>";
    echo "Interest Rate: " . $interest_rate . "%<br>";
    echo "Date Account Created: " . $date . "<br>";
    echo "Number of Months Since Creation: " . $months_since_creation . "<br>";
    echo "Interest Earned: $" . $interest . "<br>";
    echo "Balance with Interest: $" . $balance_with_interest . "<br>";
} else {
    echo "Account not found";
}

$conn->close();
?>
