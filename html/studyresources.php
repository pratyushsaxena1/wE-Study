<!DOCTYPE html>
<head>
    <title>wE-Study: Study online with others for free</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Study online collaboratively with wE-Study">
    <link rel="icon" href="https://lh3.googleusercontent.com/Ds7Q0Br23zo_VCLVkmkx4LOK692sTRZaGP6hPL1e2g85EiWRn0XlEHMpZtE5mCWk9zVMCL-Y1dZN118HLn6QbQ9_TkV_mbWJSDUf2DRoixvj3rCI_lVxCDDcqHznZoNyRERVtyLTPw=w2400">
</head>
<body>
    <link href="/css/websitecss.css" rel="stylesheet" type = "text/css">
	<header class = "header"> Study Resources </header>
    <hr>
    <p> Here are resources made by students at TJ who use wE-Study. Click the button below to add your own. </p>
	<button id = "addstudyresourcebutton" onclick = "addstudyresource()"> Add Study Resource </button>
	<br>
	<?php
    require __DIR__ . '/db.php';
    if (isset($_POST['submit'])) {
    	$email    = $_POST['useremail'];
    	$password = $_POST['userloginpassword'];
    	if (verify_login($conn, $email, $password)) {
    ?>
	<input type="text" id="searchbar" onkeyup="search()" placeholder="Search for study guides by specific subjects or units...">
	<table id = "informationtable">
        <tr>
            <th>Subject</th>
            <th>Unit</th>
            <th>Link</th>
        </tr>
        <tr>
            <td>Algebra 2</td>
            <td>Factoring</td>
            <td class = 'linkclass'><a href = "https://docs.google.com/document/d/19vim5P8edZeN6-10koKx6ViS2cD9IUfLnE0e5ZBFmYo/edit" target = '_blank'> https://docs.google.com/document/d/19vim5P8edZeN6-10koKx6ViS2cD9IUfLnE0e5ZBFmYo/edit </a></td>
        </tr>
	</table>
	<?php
    	} else {
			echo "<p>The email or password entered is incorrect.</p>";
		}
	} else {
		echo "<p>There was an error with your form submission.</p>";
	}
	$conn->close();
?>
	<button id = "back" onclick = "back()"> Back </button>
	<script src = "/js/websitejs.js"></script>
</body>
</html>
