<?php
include_once 'config.php';

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username === "admin" && $password === "admin") {
        header("Location: ../html-files/admin-dashboard.html");
        exit();
    }

    $sql = "SELECT id, username, password FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows == 1) {
        $stmt->bind_result($id, $username, $hashed_password);
        $stmt->fetch();
        if (password_verify($password, $hashed_password)) {
            session_regenerate_id();
            $_SESSION['username'] = $username;
            $_SESSION['id'] = $id;
            header("Location: ../html-files/user-dashboard.html");
            exit();
        } else {
            header("Location: ../homepage.html?login=error");
            exit();
        }
    } else {
        header("Location: ../homepage.html?login=error");
        exit();
    }
}

$stmt->close();
$conn->close();
?>
