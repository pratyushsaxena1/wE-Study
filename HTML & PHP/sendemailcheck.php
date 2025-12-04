<?php
    if(isset($_POST['submit'])) {
        session_start();
        $_SESSION['useremail'] = $_POST['email'];
        $_SESSION['userpassword'] = $_POST['userpassword'];
        //$checkemail = $_POST['email'];
        //if (strpos($checkemail, '@tjhsst.edu')) {
            $emailFrom = 'w3study.contact@gmail.com';
            $emailSubject = 'Confirm w3-Study Sign Up';
            $emailTo = $_POST['email'];
            $headers = "From: w3-Study" . "\r\n";
            $headers .= "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $body = '<a href="http://w3-study.com/html/insertlogin.php">Click here to verify your account.</a>';
            mail($emailTo, $emailSubject, $body, $headers);
            header("Location: http://w3-study.com/html/checkyouremail.php");
        //}
        //else {
        //    header("Location: http://w3-study.com/html/accessdenied.php");
        //}
    }
?>
