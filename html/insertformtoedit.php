<?php
// Update or delete a room. The account email is taken from the session set at
// login (loggedinuser.php), NOT from the form, so a user can only change their
// own rooms even if they tamper with the request.
session_start();
require __DIR__ . '/db.php';

if (!isset($_SESSION['auth_email'])) {
    echo 'You must log in before editing a room.';
    $conn->close();
    exit();
}

if (isset($_POST['submit'])) {
    $email      = $_SESSION['auth_email'];
    $roomID     = (int) $_POST['roomID'];
    $deleteroom = strtoupper(trim($_POST['deleteroom']));

    if ($deleteroom === 'YES') {
        $stmt = $conn->prepare('DELETE FROM user_form_data WHERE ID = ? AND Email = ?');
        $stmt->bind_param('is', $roomID, $email);
    } else {
        $subject  = $_POST['subject'];
        $unit     = $_POST['unit'];
        $date     = $_POST['date'];
        $time     = $_POST['time'];
        $creator  = $_POST['creator'];
        $meetlink = $_POST['meetlink'];
        $stmt = $conn->prepare('UPDATE user_form_data SET Subject = ?, Unit = ?, `Date` = ?, `Time` = ?, Name = ?, Meetinglink = ? WHERE ID = ? AND Email = ?');
        $stmt->bind_param('ssssssis', $subject, $unit, $date, $time, $creator, $meetlink, $roomID, $email);
    }

    if ($stmt->execute()) {
        header('Location: /html/success.php');
        exit();
    } else {
        echo 'Form not submitted successfully.';
    }
    $stmt->close();
}

$conn->close();
?>
