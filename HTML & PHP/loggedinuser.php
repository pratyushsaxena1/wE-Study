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
	<?php
	$server = "*";
    	$username = "*";
    	$password = "*";
    	$dbname = "*";
	$conn = mysqli_connect($server, $username, $password, $dbname);
	if(!$conn)
	{
		die("Connection failed: " . mysqli_connect_error());
	}
	if(isset($_POST['submit'])) {
		$enteredemail = $_POST['useremail'];
		$enteredpassword = $_POST['userloginpassword'];
		$query = "SELECT * FROM user_login_data WHERE Email = '$enteredemail' AND Password = '$enteredpassword'";
		$result = mysqli_query($conn, $query);
		if (mysqli_num_rows($result)) {
		$query2 = "SELECT * FROM user_form_data WHERE Email = '$enteredemail'";
		$result2 = mysqli_query($conn, $query2);
			if ($result2->num_rows > 0) {
                echo "<table id=\"informationtable\"><tr><th>ID</th><th>Subject</th><th>Unit</th><th>Date</th><th>Time</th><th>Creator</th><th>Meeting Link</th></tr>";
                    while($row = $result2->fetch_assoc()) {
                    	$time = $row["Time"];
                    	$updatedtime = date('g:i a', strtotime($time));
                    	$date = $row["Date"];
                    	$updateddate = date('m-d-Y', strtotime($date));
                            echo "<tr><td>" .$row["ID"]. "</td><td>" .$row["Subject"]. "</td><td>" .$row["Unit"]. "</td><td>" .$updateddate. "</td><td>" .$updatedtime. "</td><td>" .$row["Name"]. "</td><td class = 'linkclass'> <a href = '".$row["Meetinglink"]."' target = '_blank'>" .$row["Meetinglink"]. "</a></td></tr>";
                        }
                        echo "</table>";
            } else {
                echo "<p>You have not created any rooms to edit yet.</p>";
                exit();
            }
		}
		else {
			echo "<p>The email or password entered is incorrect.</p>";
			exit();
		}
	}
	else {
		$conn->close();
		echo "<p>There was an error with your form submission.</p>";
	}
?>
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
    <script src = "/js/websitejs.js"></script>
</body>
</html>
