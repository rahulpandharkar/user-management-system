<?php
include_once 'config.php';

if(isset($_POST['username'])) {
    $username = $_POST['username'];

    $sql = "DELETE FROM users WHERE username = ?";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("s", $username);
        if ($stmt->execute()) {
            if ($stmt->affected_rows > 0) {
                echo "User deleted successfully";
            } else {
                echo "Error: Username not found";
            }
        } else {
            echo "Error: Unable to delete user";
        }
    } else {
        echo "Error: Unable to prepare statement";
    }
    $stmt->close();
} else {
    echo "Error: Username not provided";
}
$conn->close();
?>
