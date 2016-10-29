<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "webDB";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO comments (firstname, lastname, text)
VALUES ('$_POST[firstname]', '$_POST[lastname]', '$_POST[text]')";

if ($conn->query($sql) === TRUE) {
    echo "Odeslano";
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>