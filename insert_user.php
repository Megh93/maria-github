<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

include 'db.php';

$data = json_decode(file_get_contents("php://input"), true);
$name = $data['name'];
$email = $data['email'];

if (!empty($name) && !empty($email)) {
    $sql = "INSERT INTO users (name, email) VALUES ('$name', '$email')";
    if ($conn->query($sql) === TRUE) {
        echo json_encode(["message" => "User added successfully"]);
    } else {
        echo json_encode(["error" => "Error: " . $conn->error]);
    }
} else {
    echo json_encode(["error" => "Invalid input"]);
}

$conn->close();
?>
