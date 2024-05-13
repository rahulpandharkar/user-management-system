<?php
include_once 'config.php';

$sql = "SELECT id, username, email, created_at FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo '<table style="border-collapse: collapse; width: 100%;">';
    echo '<thead><tr style="background-color: #f2f2f2;"><th style="border: 1px solid #dddddd; text-align: left; padding: 8px;">ID</th><th style="border: 1px solid #dddddd; text-align: left; padding: 8px;">Username</th><th style="border: 1px solid #dddddd; text-align: left; padding: 8px;">Email</th><th style="border: 1px solid #dddddd; text-align: left; padding: 8px;">Timestamp</th></tr></thead>';
    echo '<tbody>';
    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">' . $row['id'] . '</td>';
        echo '<td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">' . $row['username'] . '</td>';
        echo '<td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">' . $row['email'] . '</td>';
        echo '<td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">' . $row['created_at'] . '</td>';
        echo '</tr>';
    }
    echo '</tbody></table>';
} else {
    echo 'No users found';
}
$conn->close();
?>
