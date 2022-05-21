<?php

//check if the honeypot field is filled out, if not send mail

$name = $_POST['contact_name'];
$vistor_email = $_POST['email_address'];
$message = $_POST['message'];
$subject = $_POST['subject'];
$date = date('m/d/Y');
$honeyPot = $_POST['contact_reason'];


$to_admin = 'support@hellocharisse.com';
$subject_admin = 'New Form submission';
$headers_admin = "From: $vistor_email  \r\n";
$headers_admin .= "MIME-Version: 1.0 \r\n";
$headers_admin .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
$message_admin = '<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>admin email</title>
	
<style type="text/css">
	
	@media only screen and (max-width:480px){
		#table-container {
			width: 90vw !important;
			//height: 100vh !important; 
			font-size: 2.5vh !important; 
		}
		
		#email-greeting {
			width: 300px !important; 
		}
		
		#email-content {
			width: 300px !important; 
		}
	}
	
	
</style>
</head>

<body> 
	
<table cellspacing="0" cellpadding="0" width="600"  align="center" border="1" style="background-color: #FFFAFF; font-family: Roboto, sans-serif;" id="table-container">
	<tr>
		<td align="center" valign="top">
			<table cellspacing="0" cellpadding="15" width="300" align="center" border="0">
				<tr>
					<td align="center" valign="top"><h2>Administrative Email</h2></td>
				</tr>
			</table>
			<table cellspacing="0" cellpadding="0" width="300" align="center" border="0">
				<tr>
					<td align="center"><h3>Date of Contact: '.$date.'</h3></td>
				</tr>
			</table>
			<table cellpadding="15" cellspacing="0" width="600" align="center" border="0" id="email-greeting">         <tr>                     
			<td>contact name:  '.$name.'</td>                          
			</tr>
			<tr>                     
			<td>contact email:  '.$vistor_email.'</td>                          
			</tr>
			<tr>                     
			<td>reason for contact:  '.$subject.'</td>                       
			</tr>
			<tr>
				<td><ul><li> '.$message.' </li></ul> </td>  
			</tr>
			</table>
		</td>
	</tr>
</table>
</body>
</html>';
$message_admin = wordwrap($message_admin, 70);
//honey pot
if(!empty( $honeyPot ) ){
	echo "BOT";
		return;
	}else{
		mail($to_admin, $subject_admin, $message_admin, $headers_admin);
	}


$to_client = "$vistor_email";
$subject_client = "Thank you for contacting cats&amp;co!";
$client_headers = "From: $to_admin \r\n";
$client_headers .= "MIME-Version: 1.0 \r\n";
$client_headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
$client_message = '<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>customer_email</title>
	
<style type="text/css">
	
	@media only screen and (max-width:480px){
		#table-container {
			width: 90vw !important;
			//height: 100vh !important; 
			font-size: 2.5vh !important; 
		}
		
		#email-greeting {
			width: 300px !important; 
		}
		
		#email-content {
			width: 300px !important; 
		}
	}
	
	
</style>
</head>

<body> 
	
<table cellspacing="0" cellpadding="0" width="600"  align="center" border="1" style="background-color: #FFFAFF; font-family: Roboto, sans-serif;" id="table-container">
	<tr>
		<td align="center" valign="top">
			<table cellspacing="0" cellpadding="15" width="300" align="left" border="0">
				<tr>
					<td align="left" valign="top" style="font-weight: bold;">Cats&amp;Co | online cat store</td>
				</tr>
			</table>
			<table cellspacing="0" cellpadding="0" width="300" align="center" border="0">
			</table>
			<table cellpadding="15" cellspacing="0" width="600" align="center" border="0" id="email-greeting">                 
			<tr>                     
			<td>Hello! '.$name.' Thank you for contacting Cats&amp;Co! We have received your message which is as follows: </td>                       
			</tr>
			<tr>
				<td>'.$message.' </td>  
			</tr>
			</table>
			<table cellpadding="15" cellspacing="0" width="600" align="center" border="0" id="email-content">                 
			<tr>                     
			<td>A member of our customer service team will contact you at '.$vistor_email.' within 24 to 48 hours.</td>                          
			</tr>
			<tr>                     
			<td>Thank you!</td>                         
			</tr> 
			<tr>                     
			<td>Cats&amp;Co Customer Service</td>                         
			</tr>             
			</table>
		</td>
	</tr>
</table>
</body>
</html>';
    // The content-type header must be set when sending HTML email
$client_message = wordwrap($client_message, 70);
//honey pot
if(!empty( $honeyPot ) ){
		return;
	}else{
		mail($to_client, $subject_client, $client_message, $client_headers);
	}



?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>cats&amp;co | online cat store</title>
<!-- EXTERNAL SHEETS -->
<link href="css/wdv351-style.css" rel="stylesheet" type="text/css">
<!-- END EXTERNAL SHEETS -->
	
<!-- FONT -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lora&family=Roboto&display=swap" rel="stylesheet"> 
<!-- END FONT -->	
</head>

<body>
<div id="container">
<nav>
	<ul>
  <strong><li><a href ="index.html">Cats&amp;Co</a></li></strong>
  	 <li><a href ="about.html">about</a></li>
      <li><a href ="shop.html"> shop </a></li>
      <li><a href="contact.html">connect</a></li>
	</ul>
</nav>

 <div id="container">
<div id="confirmation_page">
  <h1>Email Confirmation</h1>
  
  <p>Thank you for contacting Cats&amp;Co</p> 
  
  <p>We have successfully received your message.</p>
  
  <p>Below is a summary of the information you provided. A member of our customer service team will contact you within 24-48 hours.</p><br>  
	<p> <?php
echo 'Name: ' . $_POST['contact_name'] . '<br>';
echo 'Email: ' . $_POST['email_address']. '<br>';
echo 'Message: ' . $_POST['message'] . '<br>';
?>	 
	</p>
 
</div>	 

</div> 

<footer>
	<div class="flex-logos">
	 <div class="social">
   	<a href="https://www.facebook.com/meowingtonsInc"><img src="images/fb-logo1.png" alt="white facebook logo"/> </a>
	</div>
	<div class="social">
   	<a href="https://www.instagram.com/meowingtonsco/"><img src="images/insta-logo1.png" alt="white facebook logo"/> </a>
	</div>
	<div class="social">
   	<a href="https://twitter.com/meowingtons__"><img src="images/twitter-logo.png" alt="white twitter logo"/> </a>
	</div>
	</div>
<!-- END FLEX-LOGOS --> 
	<p>Copyright &copy; <script>document.write(new Date().getFullYear())</script> Cats&amp;Co</p>
	<p><a href="#">Contact</a> | <a href="#">Shipping</a> | <a href="#">Returns</a> | <a href="#">Privacy Policy</a> | <a href="#">Terms</a></p>
	  
</footer>
	
	
</div>	<!-- END CONTAINER DIV -->

</body>
</html>
