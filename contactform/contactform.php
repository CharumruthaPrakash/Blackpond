<?php
    $recipient="pr@blackpond.co.in";
	$name=$_POST["name"];
	$email=$_POST["email"];
	$phone=$_POST["phone"];
	$city=$_POST["city"];
    $subject="Enquiry from Web Contact";
    $message=$_POST["message"];
	$headers = "From: web@blackpond.co.in \r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
    $mailBody="<b>Hi Blackpond,</b><br>
						&nbsp&nbsp&nbsp&nbsp<i> ".$message."</i><br>
						<i><b>Please reach me at</i></b> <br>
						&nbsp&nbsp&nbsp&nbsp E-Mail: ".$email." <br>
						&nbsp&nbsp&nbsp&nbsp Phone Number: ".$phone."<br>
						&nbsp&nbsp&nbsp&nbsp Location(City): ".$city."<br>
						Thank You.<br><br>
						With Warm Regards,<br>
						".$name."";
		echo"OK" ; exit();
    if(mail($recipient, $subject, $mailBody, $headers)){
	
	} else{
	echo"ERROR" ; exit();
	}
?>