<?php

// Replace these variables with your actual database credentials
$host = "your_mysql_host";
$username = "your_mysql_user";
$password = "your_mysql_password";
$database = "user";

// Create a connection
$conn = new mysqli($host, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Execute a query to select all data from the 'user' table
$sql = "SELECT * FROM user";
$result = $conn->query($sql);

// Check if the query was successful
if ($result === false) {
    die("Error executing the query: " . $conn->error);
}

// Fetch all rows from the result as an associative array
$rows = array();
while ($row = $result->fetch_assoc()) {
    $rows[] = $row;
}

// Close the connection
$conn->close();

// Output the data as JSON
header('Content-Type: application/json');
echo json_encode($rows);

?>
