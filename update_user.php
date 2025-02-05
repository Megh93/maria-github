<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

include 'db.php';

$data = json_decode(file_get_contents("php://input"), true);
$id = $data['id'];
$name = $data['name'];
$email = $data['email'];

if (!empty($id) && !empty($name) && !empty($email)) {
    $sql = "UPDATE users SET name='$name', email='$email' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo json_encode(["message" => "User updated successfully"]);
    } else {
        echo json_encode(["error" => "Error: " . $conn->error]);
    }
} else {
    echo json_encode(["error" => "Invalid input"]);
}

$conn->close();
?>
