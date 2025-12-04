<?php
    session_start();
    $server = "*";
    $username = "*";
    $password = "*";
    $dbname = "*";
    
    $conn = mysqli_connect($server, $username, $password, $dbname);
    if(!$conn)
    {
        die("Connection failed: " . mysqli_connect_error());
    }

	$email = $_SESSION['useremail'];
	$userpassword = $_SESSION['userpassword'];

	$query = "insert into `user_login_data` values('$email', '$userpassword')";
	$run = mysqli_query($conn, $query);
	if($run) {
		header("Location: http://w3-study.com/html/success.php");
	}
	else {
		echo "Form not submitted successfully.";
	}
    $conn->close();
?>
