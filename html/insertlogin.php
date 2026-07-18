<?php
// Direct account creation. (The old flow emailed a verification link, but
// InfinityFree's free tier disables PHP mail(), so we create the account
// immediately instead.)
require __DIR__ . '/db.php';

if (isset($_POST['submit'])) {
    $email    = trim($_POST['email']);
    $password = $_POST['userpassword'];

    if ($email === '' || $password === '') {
        echo 'Email and password are required.';
        $conn->close();
        exit();
    }

    // Reject duplicate accounts.
    $stmt = $conn->prepare('SELECT Email FROM user_login_data WHERE Email = ?');
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $exists = $stmt->get_result()->fetch_assoc();
    $stmt->close();
    if ($exists) {
        echo 'An account with that email already exists.';
        $conn->close();
        exit();
    }

    $hash = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $conn->prepare('INSERT INTO user_login_data (Email, Password) VALUES (?, ?)');
    $stmt->bind_param('ss', $email, $hash);
    if ($stmt->execute()) {
        header('Location: /html/success.php');
        exit();
    } else {
        echo 'Sign up failed. Please try again.';
    }
    $stmt->close();
}

$conn->close();
?>
