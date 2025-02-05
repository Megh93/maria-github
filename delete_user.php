<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

include 'db.php';

$data = json_decode(file_get_contents("php://input"), true);
$id = $data['id'];

if (!empty($id)) {
    $sql = "DELETE FROM users WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo json_encode(["message" => "User deleted successfully"]);
    } else {
        echo json_encode(["error" => "Error: " . $conn->error]);
    }
} else {
    echo json_encode(["error" => "Invalid input"]);
}

$conn->close();
?>
