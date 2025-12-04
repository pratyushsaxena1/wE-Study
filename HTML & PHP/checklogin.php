<head>
    <title>w3-Study: Study online with others for free</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Study online collaboratively with w3-Study">
    <link rel="icon" href="https://lh3.googleusercontent.com/Ds7Q0Br23zo_VCLVkmkx4LOK692sTRZaGP6hPL1e2g85EiWRn0XlEHMpZtE5mCWk9zVMCL-Y1dZN118HLn6QbQ9_TkV_mbWJSDUf2DRoixvj3rCI_lVxCDDcqHznZoNyRERVtyLTPw=w2400">
</head>
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
		$realpassword = "SELECT password FROM user_login_data WHERE email = $enteredemail";
		if ($enteredpassword == $realpassword) {
			echo "Yay!";
		}
		else {
			echo "This is the incorrect password.";
		}
	}
	else {
		echo "Nothing was submitted.";
	}
?>
