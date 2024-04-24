<?php
session_start(); // Start the session at the beginning of the script

// Include your connection script here
include('db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    //Retrive user data from the database
    /*$sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result=$conn->query($sql);*/

    $stmt = $conn->prepare("SELECT id, username, password FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        
        if (password_verify($password, $user['password'])) {
            // Set session or cookie here as needed
            $_SESSION['loggedin'] = true; // Indicate the user is logged in
            $_SESSION['username'] = $user['username']; // Store the username or any other user data as needed*/
            echo "<script>alert('Login successful!')</script>";
        }else{
            echo "Invalid password!";
        }
    }else{
        echo "User not found!";
    }
}
$stmt->close();
$conn->close();
?>
