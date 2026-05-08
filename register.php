<?php
$conn = new mysqli("localhost", "root", "", "nexcell_db");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['register-email'];
    $password = password_hash($_POST['register-password'], PASSWORD_BCRYPT);

    // Check if email already exists
    $checkEmail = $conn->prepare("SELECT email FROM users WHERE email = ?");
    $checkEmail->bind_param("s", $email);
    $checkEmail->execute();
    $res = $checkEmail->get_result();

    if ($res->num_rows > 0) {
        echo "<script>alert('Email already registered.'); window.history.back();</script>";
    } else {
        $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $username, $email, $password);

        if ($stmt->execute()) {
            echo "<script>alert('Registration successful! Please login.'); window.location.href='home.php';</script>";
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    }
    $checkEmail->close();
}
$conn->close();
?>