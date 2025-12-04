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

        $roomID = $_POST['roomID'];
        $deleteroom = $_POST['deleteroom'];
		$subject = $_POST['subject'];
		$unit = $_POST['unit'];
		$date = $_POST['date'];
		$time = $_POST['time'];
		$creator = $_POST['creator'];
		$meetlink = $_POST['meetlink'];
		$enteredemail = $_POST['email'];
        
        if($deleteroom == "YES") {
            $query = "DELETE FROM `user_form_data` WHERE ID='$roomID' and email='$enteredemail'";
        }
        else {
    		$query = 
    		"UPDATE `user_form_data`
    		SET subject='$subject', unit='$unit', date='$date', time='$time', name='$creator', meetinglink='$meetlink'
    		WHERE ID='$roomID' and email='$enteredemail'";
        }
	    $run = mysqli_query($conn, $query);
		if($run) {
			header("Location: http://w3-study.com/html/success.php");
		}
	    else {
			echo "Form not submitted successfully.";
		}
	}

$conn->close();
?>
