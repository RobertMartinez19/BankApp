<html>
<body>

Results of Checkings Database<br><br>

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

$sql = "SELECT * FROM checking";
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
             "balance: " . $row["Balance"]. "<br><br>". // corrected column name
             "Date: " . $row["Date"]. "<br><br>".
    }
} else {
    echo "0 results";
}
$conn->close();
?>

</body>
</html>
