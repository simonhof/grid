<?php
$conn = new mysqli("localhost", "root", "mysql", "grid"); //connection string
if ($conn->connect_errno) {
    echo "Failed to connect to MySQL: (" . $conn->connect_errno . ") " . $conn->connect_error;
}