<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = json_decode(file_get_contents("php://input"));

    $username = $data->username;
    $password = password_hash($data->password, PASSWORD_BCRYPT);

    $conn = new mysqli("localhost", "id21255006_teddy", "Lucky12345@", "id21255006_teddy");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo json_encode(["success" => true]);
    } else {
        echo json_encode(["success" => false]);
    }

    $conn->close();
}
?>
