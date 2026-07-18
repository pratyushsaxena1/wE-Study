<head>
    <title>w3-Study: Study online with others for free</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Study online collaboratively with w3-Study">
    <link rel="icon" href="https://lh3.googleusercontent.com/Ds7Q0Br23zo_VCLVkmkx4LOK692sTRZaGP6hPL1e2g85EiWRn0XlEHMpZtE5mCWk9zVMCL-Y1dZN118HLn6QbQ9_TkV_mbWJSDUf2DRoixvj3rCI_lVxCDDcqHznZoNyRERVtyLTPw=w2400">
</head>
<?php
require __DIR__ . '/db.php';

if (isset($_POST['submit'])) {
    $subject  = $_POST['subject'];
    $unit     = $_POST['unit'];
    $date     = $_POST['date'];
    $time     = $_POST['time'];
    $name     = $_POST['creator'];
    $meetlink = $_POST['meetlink'];
    $email    = $_POST['email'];

    // Next room ID for this user (starts at 1).
    $stmt = $conn->prepare('SELECT MAX(ID) FROM user_form_data WHERE Email = ?');
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $row = $stmt->get_result()->fetch_array();
    $roomID = (int) $row[0] + 1;
    $stmt->close();

    $stmt = $conn->prepare('INSERT INTO user_form_data (Subject, Unit, `Date`, `Time`, Name, Meetinglink, Email, ID) VALUES (?, ?, ?, ?, ?, ?, ?, ?)');
    $stmt->bind_param('sssssssi', $subject, $unit, $date, $time, $name, $meetlink, $email, $roomID);
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
