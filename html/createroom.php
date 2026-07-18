<!DOCTYPE html>
<head>
    <title>wE-Study: Study online with others for free</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Study online collaboratively with wE-Study">
    <link rel="icon" href="https://lh3.googleusercontent.com/Ds7Q0Br23zo_VCLVkmkx4LOK692sTRZaGP6hPL1e2g85EiWRn0XlEHMpZtE5mCWk9zVMCL-Y1dZN118HLn6QbQ9_TkV_mbWJSDUf2DRoixvj3rCI_lVxCDDcqHznZoNyRERVtyLTPw=w2400">
</head>
<body>
    <link href="/css/websitecss.css" rel="stylesheet" type = "text/css">
    <header class = "header"> Create Room </header>
    <hr>
	<?php
	require __DIR__ . '/db.php';
	if (isset($_POST['submit'])) {
		$email    = $_POST['useremail'];
		$password = $_POST['userloginpassword'];
		if (verify_login($conn, $email, $password)) {
	?>
	<form action = "insert.php" method="POST" id="my-form">
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
        <label for="link">Meeting Link:</label><br>
        <input type="text" id="meetlink" name="meetlink" placeholder="Example: meet.google.com/abc-def-ghi" required><br>
		<label for="email">Email:</label><br>
		<input type="text" id="email" name="email" placeholder="Example: w3study.contact@gmail.com" required><br>
		<button type = "submit" name = "submit" id = "submitformbutton">Submit</button>
    </form>
		<?php
		} else {
			echo "<p>The email or password entered is incorrect.</p>";
		}
	} else {
		echo "<p>There was an error with your form submission.</p>";
	}
	$conn->close();
?>
    <button id = "back" onclick = "history.back();"> Back </button>
    <script src = "/js/websitejs.js"></script>
</body>
</html>
