<html>
<body>

Results of Savings Database<br><br>

<?php
$servername = "localhost";
$username = "quickme1_4211";
$password = "csci4211";
$dbname = "dbvpny1qngaxgp";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM savings";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Account Number: " . $row["Acct_no"]. "<br>".
             "Last Name: " . $row["lastname"]. "<br>".
             "First Name: " . $row["firstname"]. "<br>".
             "Address: " . $row["address"]. "<br>".
             "Email: " . $row["email"]. "<br>".
             "Phone: " . $row["phone"]. "<br>".
             "Balance: $" . number_format($row["Balance"], 2) . "<br><br>". // Format balance for display
             "Date: " . $row["Date"]. "<br><br>".
             "Interest Rate: " . $row["interest_rate"]. "<br><br>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>

</body>
</html>