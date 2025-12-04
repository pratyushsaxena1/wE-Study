<!DOCTYPE html>
<head>
    <title>w3-Study: Study online with others for free</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Study online collaboratively with w3-Study">
    <link rel="icon" href="https://lh3.googleusercontent.com/Ds7Q0Br23zo_VCLVkmkx4LOK692sTRZaGP6hPL1e2g85EiWRn0XlEHMpZtE5mCWk9zVMCL-Y1dZN118HLn6QbQ9_TkV_mbWJSDUf2DRoixvj3rCI_lVxCDDcqHznZoNyRERVtyLTPw=w2400">
</head>
<body>
    <link href="/css/websitecss.css" rel="stylesheet" type = "text/css">
	<header class = "header"> Sign Up </header>
	<hr>
	<form action = "sendemailcheck.php" method="POST" id="my-form-3">
        <label for="email">Email:</label><br>
        <input type="text" id="email" name="email" placeholder="Email" required><br>
        <label for="password">Password:</label><br>
        <input type="password" id="userpassword" name="userpassword" placeholder="Password" required><br>
		<button type = "submit" name = "submit" id = "submitformbutton4">Submit</button>
    </form>
    <!-- <p class = "terms">By signing up, you agree to our <a href = "/html/terms.php" target = blank_>Terms and Conditions</a>.</p> -->
	<button id = "back" onclick = "back()"> Back </button>
	<script src = "/js/websitejs.js"></script>
</body>
</html>
