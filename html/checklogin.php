<head>
    <title>wE-Study: Study online with others for free</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Study online collaboratively with wE-Study">
    <link rel="icon" href="https://lh3.googleusercontent.com/Ds7Q0Br23zo_VCLVkmkx4LOK692sTRZaGP6hPL1e2g85EiWRn0XlEHMpZtE5mCWk9zVMCL-Y1dZN118HLn6QbQ9_TkV_mbWJSDUf2DRoixvj3rCI_lVxCDDcqHznZoNyRERVtyLTPw=w2400">
</head>
<?php
	require __DIR__ . '/db.php';
	if (isset($_POST['submit'])) {
		$email    = $_POST['useremail'];
		$password = $_POST['userloginpassword'];
		if (verify_login($conn, $email, $password)) {
			echo "Yay!";
		} else {
			echo "This is the incorrect password.";
		}
	} else {
		echo "Nothing was submitted.";
	}
	$conn->close();
?>
