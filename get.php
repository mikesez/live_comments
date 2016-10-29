<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "webDB";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT id, firstname, lastname, text FROM comments ORDER BY id DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<br>Jmeno: " . $row["firstname"]. " " . $row["lastname"]. "<br>Komentar: " . $row["text"] . "<br>";
    }
} 

$conn->close();
?>