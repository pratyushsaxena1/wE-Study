<!DOCTYPE html>
<head>
    <title>wE-Study: Study online with others for free</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <meta name="description" content="Study online collaboratively with wE-Study">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="https://lh3.googleusercontent.com/Ds7Q0Br23zo_VCLVkmkx4LOK692sTRZaGP6hPL1e2g85EiWRn0XlEHMpZtE5mCWk9zVMCL-Y1dZN118HLn6QbQ9_TkV_mbWJSDUf2DRoixvj3rCI_lVxCDDcqHznZoNyRERVtyLTPw=w2400">
</head>
<body>
    <link href="/css/websitecss.css" rel="stylesheet" type = "text/css">
    <header class = "header"> Join Room </header>
    <hr>
    <input type="text" id="searchbar" onkeyup="search()" placeholder="Search for courses, units, dates, times, or creators...">
    <button id = "back" onclick = "back()"> Back </button>

<?php
require __DIR__ . '/db.php';

if (isset($_POST['submit'])) {
    $email    = $_POST['useremail'];
    $password = $_POST['userloginpassword'];

    if (verify_login($conn, $email, $password)) {
        // Remove rooms whose date has already passed (done once, not per row).
        $today = date('Y-m-d');
        $del = $conn->prepare('DELETE FROM user_form_data WHERE `Date` < ?');
        $del->bind_param('s', $today);
        $del->execute();
        $del->close();

        $result = $conn->query('SELECT * FROM user_form_data');
        if ($result && $result->num_rows > 0) {
            echo "<table id=\"informationtable\"><tr><th>Subject</th><th>Unit</th><th>Date</th><th>Time</th><th>Creator</th><th>Meeting Link</th></tr>";
            while ($row = $result->fetch_assoc()) {
                $updatedtime = date('g:i a', strtotime($row["Time"]));
                $updateddate = date('m-d-Y', strtotime($row["Date"]));
                $link = htmlspecialchars($row["Meetinglink"], ENT_QUOTES);
                echo "<tr><td>" . htmlspecialchars($row["Subject"]) . "</td><td>" . htmlspecialchars($row["Unit"]) . "</td><td>" . $updateddate . "</td><td>" . $updatedtime . "</td><td>" . htmlspecialchars($row["Name"]) . "</td><td class = 'linkclass'> <a href = '" . $link . "' target = '_blank'>" . $link . "</a></td></tr>";
            }
            echo "</table>";
        } else {
            echo "<p>There are currently no rooms open.</p>";
        }
    } else {
        echo "<p>The email or password entered is incorrect.</p>";
    }
} else {
    echo "<p>There was an error with your form submission.</p>";
}

$conn->close();
?>
    <script src = "/js/websitejs.js"></script>
</body>
</html>
