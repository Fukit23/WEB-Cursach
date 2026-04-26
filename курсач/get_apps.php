<?php
header('Content-Type: application/json');

$conn = new mysqli("localhost", "root", "mishkaumka2006", "app_store_db");

if ($conn->connect_error) {
    die(json_encode(["error" => "Connection failed"]));
}

$query = "SELECT a.id, a.name, a.description, a.icon_id, v.type, v.price, v.download_link 
          FROM apps a 
          JOIN versions v ON a.id = v.app_id";

$result = $conn->query($query);
$data = [];

if ($result) {
    while($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

echo json_encode($data);
$conn->close();
?>