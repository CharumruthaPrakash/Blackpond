<?php
   // if(isset($_POST['submit']) 

    $sender		=	"web@blackpond.co.in"; //from mail, sender email addrress 
    $recipient	=	"charumrutha.p@gmail.com"; //recipient email addrress 
    $subject	=	"Job Requirement - From Website"; // subject for the email
	$message	=	"Seeking a job requirement in the prestigious company. Have attached my resume herewith ";
	//Load POST data from HTML form 
    //$sender_name    =	$_POST["sender_name"] //sender name 
	$name			=	$_POST["name"];
	$email			=	$_POST["email"];
	$phone			=	$_POST["phone"];
    $resume        	= 	$_FILES["resume"]; //resume to attach in the email 
         
  
    //Get uploaded file data using $_FILES array 
    $tmp_name    = $_FILES['resume']['tmp_name']; // get the temporary file name of the file on the server 
    $file_name   = $_FILES['resume']['file_name'];  // get the name of the file 
    $size        = $_FILES['resume']['size'];  // get size of the file for size validation 
    $type        = $_FILES['resume']['type'];  // get type of the file 
    $error       = $_FILES['resume']['error']; // get the error (if any) 
  
    //validate form field for attaching the file 
    if($file_error > 0) 
    { 
        die('Upload error or No files uploaded'); 
    } 
  
    //read from the uploaded file & base64_encode content 
/*    $handle = fopen($tmp_name, "r");  // set the file handle only for reading the file 
    $content = fread($handle, $size); // reading the file 
    fclose($handle);                  // close upon completion 
  
    $encoded_content = chunk_split(base64_encode($content)); 
  
    $boundary = md5("random"); */// define boundary with a md5 hashed value 
  
    //header 
    $headers = "MIME-Version: 1.0\r\n"; // Defining the MIME version 
    $headers = "From: ".$sender." \r\n"; // Sender Email 
    $headers .= "Reply-To: ".$email."\r\n"; // Email address to reach back 
    $headers .= "Content-Type: multipart/mixed;\r\n"; // Defining Content-Type 
    $headers .= "boundary = $boundary\r\n"; //Defining the Boundary 
          
         
    //attachment 
    $body .= "--$boundary\r\n"; 
    $body .="Content-Type: $file_type; name=".$file_name."\r\n"; 
    $body .="Content-Disposition: attachment; filename=".$file_name."\r\n"; 
    $body .="Content-Transfer-Encoding: base64\r\n"; 
    $body .="X-Attachment-Id: ".rand(1000, 99999)."\r\n\r\n";  
    $body .= $encoded_content; // Attaching the encoded file with email 
	
	//mail body
	$mailBody	=		"<b>Hi Blackpond,</b><br>
						&nbsp&nbsp&nbsp&nbsp<i> ".$message."</i><br>
						Thank You.<br><br>";
      //echo $mailBody;
    //$sentMailResult = mail($recipient, $subject, $body, $mailBody, $headers); 
 
    if(mail($recipient, $subject, $body, $mailBody, $headers))  
    { 
       echo "OK"; exit();
	    // unlink($name); // delete the file after attachment sent. 
    } 
    else
    { 
       exit();
    } 

?>