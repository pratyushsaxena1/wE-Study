<?php
// Central database connection + auth helpers for wE-Study.
//
// The actual credentials live in config.php (see config.sample.php).
// config.php is gitignored so your database password is never committed
// to GitHub.

$configPath = __DIR__ . '/config.php';
if (!file_exists($configPath)) {
    die('Database is not configured. Copy config.sample.php to config.php and fill in your InfinityFree MySQL details.');
}
require $configPath;

$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
if (!$conn) {
    die('Connection failed: ' . mysqli_connect_error());
}

/**
 * Verify an email + password against user_login_data.
 * Passwords are stored as bcrypt hashes, so we look the account up by
 * email and then compare the hash. Returns true only when the account
 * exists and the password matches.
 */
function verify_login(mysqli $conn, string $email, string $password): bool {
    $stmt = $conn->prepare('SELECT Password FROM user_login_data WHERE Email = ?');
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $row = $stmt->get_result()->fetch_assoc();
    $stmt->close();
    if ($row === null) {
        return false;
    }
    return password_verify($password, $row['Password']);
}
