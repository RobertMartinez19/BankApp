<?php
$servername = "localhost";
$username = "quickme1_4211";
$password = "csci4211";
$dbname = "dbvpny1qngaxgp";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM Investment";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "Account Number: " . $row["Acct_no"]. "<br>".
             "Last Name: " . $row["lastname"]. "<br>".
             "First Name: " . $row["firstname"]. "<br>".
             "Address: " . $row["address"]. "<br>".
             "Email: " . $row["email"]. "<br>".
             "Phone: " . $row["phone"]. "<br>".
             "Balance: $" . $row["Balance"]. "<br>".
             "Date: " . $row["Date"]. "<br>".
             "Interest Rate: " . $row["interest_rate"]. "<br><br>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>
