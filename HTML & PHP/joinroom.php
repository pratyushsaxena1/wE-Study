<!DOCTYPE html>
<head>
    <title>w3-Study: Study online with others for free</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <meta name="description" content="Study online collaboratively with w3-Study">
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
            $sql = "SELECT * FROM user_form_data";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                echo "<table id=\"informationtable\"><tr><th>Subject</th><th>Unit</th><th>Date</th><th>Time</th><th>Creator</th><th>Meeting Link</th></tr>";
            while($row = $result->fetch_assoc()) {
            	$time = $row["Time"];
            	$updatedtime = date('g:i a', strtotime($time));
            	$date = $row["Date"];
            	$updateddate = date('m-d-Y', strtotime($date));
            	$today = date('Y-m-d');
            	$removeoldrooms = "DELETE FROM `user_form_data` WHERE Date < '$today'";
            	if (mysqli_query($conn, $removeoldrooms)) {
                    ;
                }
                    echo "<tr><td>" .$row["Subject"]. "</td><td>" .$row["Unit"]. "</td><td>" .$updateddate. "</td><td>" .$updatedtime. "</td><td>" .$row["Name"]. "</td><td class = 'linkclass'> <a href = '".$row["Meetinglink"]."' target = '_blank'>" .$row["Meetinglink"]. "</a></td></tr>";
                }
                echo "</table>";
            } else {
                echo "<p>There are currently no rooms open.</p>";
            }
            	
            $conn->close();
		}
		else {
		    $conn->close();
			echo "<p>The email or password entered is incorrect.</p>";
		}
    }
	else {
		$conn->close();
		echo "<p>There was an error with your form submission.</p>";
	}
?>
    <script src = "/js/websitejs.js"></script>
</body>
</html>
