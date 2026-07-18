<?php
// All logic runs first so session_start() happens before any output, and so
// the edit form only renders for an authenticated user.
session_start();
require __DIR__ . '/db.php';

$enteredemail = '';
$roomsHtml    = '';
$authed       = false;

if (isset($_POST['submit'])) {
    $enteredemail = $_POST['useremail'];
    $password     = $_POST['userloginpassword'];

    if (verify_login($conn, $enteredemail, $password)) {
        $authed = true;
        $_SESSION['auth_email'] = $enteredemail; // used by insertformtoedit.php

        $stmt = $conn->prepare('SELECT * FROM user_form_data WHERE Email = ?');
        $stmt->bind_param('s', $enteredemail);
        $stmt->execute();
        $result2 = $stmt->get_result();
        if ($result2->num_rows > 0) {
            $roomsHtml = "<table id=\"informationtable\"><tr><th>ID</th><th>Subject</th><th>Unit</th><th>Date</th><th>Time</th><th>Creator</th><th>Meeting Link</th></tr>";
            while ($row = $result2->fetch_assoc()) {
                $updatedtime = date('g:i a', strtotime($row["Time"]));
                $updateddate = date('m-d-Y', strtotime($row["Date"]));
                $link = htmlspecialchars($row["Meetinglink"], ENT_QUOTES);
                $roomsHtml .= "<tr><td>" . htmlspecialchars($row["ID"]) . "</td><td>" . htmlspecialchars($row["Subject"]) . "</td><td>" . htmlspecialchars($row["Unit"]) . "</td><td>" . $updateddate . "</td><td>" . $updatedtime . "</td><td>" . htmlspecialchars($row["Name"]) . "</td><td class = 'linkclass'> <a href = '" . $link . "' target = '_blank'>" . $link . "</a></td></tr>";
            }
            $roomsHtml .= "</table>";
        } else {
            $roomsHtml = "<p>You have not created any rooms to edit yet.</p>";
        }
        $stmt->close();
    } else {
        $roomsHtml = "<p>The email or password entered is incorrect.</p>";
    }
} else {
    $roomsHtml = "<p>There was an error with your form submission.</p>";
}
$conn->close();
?>
<!DOCTYPE html>
<head>
    <title>w3-Study: Study online with others for free</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Study online collaboratively with w3-Study">
    <link rel="icon" href="https://lh3.googleusercontent.com/Ds7Q0Br23zo_VCLVkmkx4LOK692sTRZaGP6hPL1e2g85EiWRn0XlEHMpZtE5mCWk9zVMCL-Y1dZN118HLn6QbQ9_TkV_mbWJSDUf2DRoixvj3rCI_lVxCDDcqHznZoNyRERVtyLTPw=w2400">
</head>
<body>
    <link href="/css/websitecss.css" rel="stylesheet" type = "text/css">
    <header class = "header"> Edit Room </header>
    <hr>
    <button id = "back" onclick = "history.back();"> Back </button>
    <script src = "/js/websitejs.js"></script>
    <?php echo $roomsHtml; ?>
<?php if ($authed): ?>
    <br>
    <br>
    <br>
    <hr>
    <br>
    <form action = "insertformtoedit.php" method="POST" id="idform">
        <label for="roomID">Room ID:</label><br>
        <input type="text" id="roomID" name="roomID" placeholder="Example: 2" required><br>
        <label for="deleteroom">Delete Room:</label><br>
        <input type="text" id="deleteroom" name="deleteroom" placeholder="Type YES or NO" required><br>
        <label for="subject">Course Name:</label><br>
        <input type="text" id="subject" name="subject" placeholder="Example: Biology 9" required><br>
        <label for="unit">Unit:</label><br>
        <input type="text" id="unit" name="unit" placeholder="Example: Cells" required><br>
        <label for="date">Date:</label><br>
        <input type="date" id="date" name="date" required><br>
        <label for="time">Time:</label><br>
        <input type="time" id="time" name="time" required><br>
        <label for="name">Creator Name:</label><br>
        <input type="text" id="creator" name="creator" placeholder="Example: John Doe" required><br>
        <label for="meetlink">Meeting Link:</label><br>
        <input type="text" id="meetlink" name="meetlink" placeholder="Example: meet.google.com/abc-def-ghi" required><br>
		<label for="email">Email:</label><br>
		<input type="text" id="email" name="email" value="<?php echo htmlspecialchars($enteredemail); ?>" readonly><br>
		<button type = "submit" name = "submit" id = "submitformbutton">Submit</button>
    </form>
<?php endif; ?>
    <script src = "/js/websitejs.js"></script>
</body>
</html>
