<?php
$servername = "localhost";
$username = "quickme1_4211";
$password = "csci4211";
$dbname = "dbvpny1qngaxgp";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$Acct_no = $_REQUEST['Acct_no'];

$sql = "SELECT * FROM checking WHERE Acct_no='$Acct_no'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "Acct_no: " . $row["Acct_no"]. "<br>";
        echo "Last Name: " . $row["lastname"]. "<br>";
        echo "First Name: " . $row["firstname"]. "<br>";
        echo "Address: " . $row["address"]. "<br>";
        echo "Email: " . $row["email"]. "<br>";
        echo "Phone: " . $row["phone"]. "<br>";
        echo "Balance: $" . $row["Balance"]. "<br>"; // Corrected column name
        echo "Date: " . $row["Date"]. "<br>"; // Corrected column name
        }
} else {
    echo "0 results";
}
$conn->close();
?>
