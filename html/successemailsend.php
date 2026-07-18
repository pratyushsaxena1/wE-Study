<?php
    if(isset($_POST['submit'])) {
        $resourceLink = $_POST['link'];
        $emailFrom = 'w3study.contact@gmail.com';
        $emailSubject = 'New Resource Submission';
        $emailTo = 'w3study.contact@gmail.com';
        $headers = "From: $emailFrom \r\n";
        mail($emailTo, $emailSubject, $resourceLink, $headers);
    }
?>
<!DOCTYPE html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="https://lh3.googleusercontent.com/Ds7Q0Br23zo_VCLVkmkx4LOK692sTRZaGP6hPL1e2g85EiWRn0XlEHMpZtE5mCWk9zVMCL-Y1dZN118HLn6QbQ9_TkV_mbWJSDUf2DRoixvj3rCI_lVxCDDcqHznZoNyRERVtyLTPw=w2400">
</head>
<body>
    <link href="/css/websitecss.css" rel="stylesheet" type = "text/css">
	<header class = "header"> Success </header>
	<hr>
	<p class = "p"> The form was successfully submitted. After a brief verification process, your resource will be made available to others. </p>
	<button id = "back" onclick = "back()"> Home </button>
	<script src = "/js/websitejs.js"></script>
</body>
</html>