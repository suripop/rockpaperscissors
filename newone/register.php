<?php
// Include your connection script here (see the next step for the connection script)
include('db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Collect post data
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Encrypt password

    // Prepare SQL to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $email, $password);

    if ($stmt->execute()==TRUE) {
        echo "<script>alert('Registration successful!')</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
