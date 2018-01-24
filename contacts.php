<?php

if (isset($_POST['submit'])){

if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		    // Validate subscriber_email...
		    if(!empty(trim(filter_input(INPUT_POST,"email",FILTER_SANITIZE_STRING))))
		    {
			    //assigning subscriber email to a variable
			    $subscriber_email = $_POST["email"];
			    $subject =$_POST['subject'];
			    $body=$_POST['message'];
			    $name=$_POST['name'];
			   	//including the autoloader file...
				include 'vendor/autoload.php';
				require_once ('phpmailer/phpmailer/PHPMailerAutoload.php');
				//instantiating the PHPMailer...
				$mail = new PHPMailer;
				//Set mailer to use SMTP....
			    $mail->isSMTP();	
			    //Specify main and backup SMTP servers...
			    $mail->Host = 'mail.shinga.co.zw';
			    //Enable SMTP authentication...
			    $mail->SMTPAuth = false;   
			    //// HOST email id and password...    
			    $mail->Username = 'geofrey@shinga.co.zw';
			    $mail->Password = 'geofrey123#'; 
			    //Securing SMTP...tls or ssl...
			    $mail->SMTPSecure = '';
			    //587 is used for Outgoing Mail (SMTP) Server(tls)...
			     //465 is used for Outgoing Mail (ssl) Server
			    $mail->Port = 25;     
			    //setFrom is where the email is coming from...
			    $mail->setFrom("$subscriber_email", $name);
			    //addReplyTo is where the email is to be replied to...
			    $mail->addReplyTo("$subscriber_email");
			    //addAddress is where the email is going(recepient)...
			    $mail->addAddress('geofrey@shinga.co.zw');
			  	
				//Set email format to HTML...
			    $mail->isHTML(true);  
			    //email subject...
				$mail->Subject = $subject;
				//email body...
				$mail->Body = $body;
				//check if mail fails to send...
				if(!$mail->send()){		//send used to send email...
					//displaying error message...
					echo 'Message could not be sent.';
			        echo 'Mailer Error: ' . $mail->ErrorInfo;
			        exit;
				}else
				{
					//email sent...
					
					
					//header("location:index.php?");

					echo "<script>alert('Message Send Successfully'); window.location = 'index.php';</script>";
				}
			}else{
				//if submitted empty...
				header("location:index.php");
			}


	}	// Processing form data when form is submitted...
	




}else{
	header("location:index.php");
}

?>

