<?php


if(isset($_POST['submit'])){

$fName = $_POST['fName'];
$lName = $_POST['lName'];
$vistor_email = $_POST['email'];
$vistor_phone = $_POST['phone'];
$message = $_POST['message'];
$subject = $_POST['subject'];
$date = date('m/d/Y');
$honeyPot = $_POST['mName'];
  //check for honey pot
	if(!empty( $honeyPot ) ){
		echo "BOT";
		return;
		
	}else{
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
                <td>contact name:  '.$fName.'</td>                          
                </tr>
                <tr>                     
                <td>contact email:  '.$vistor_email.'</td>                          
                </tr> 
                <tr>                     
                    <td>contact phone:  '.$vistor_phone.'</td>                          
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
		return;
	}else{
		mail($to_admin, $subject_admin, $message_admin, $headers_admin);
	}


$to_client = "$vistor_email";
$subject_client = "Thank you for contacting S and L!";
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
                        <td align="left" valign="top" style="font-weight: bold;">S&amp;L Home Services </td>
                    </tr>
                    <tr>
                        <td align="left" valign="top" style="font-weight: bold;">Central Iowa Home Improvement </td>
                    </tr> 
                </table>
                <table cellspacing="0" cellpadding="0" width="300" align="center" border="0">
                </table>
                <table cellpadding="15" cellspacing="0" width="600" align="center" border="0" id="email-greeting">                 
                <tr>                     
                <td>Hello! '.$fName.' Thank you for contacting S&amp;L Home Services! We have received your message which is as follows: </td>                       
                </tr>
                <tr>
                    <td>'.$message.' </td>  
                </tr>
                </table>
                <table cellpadding="15" cellspacing="0" width="600" align="center" border="0" id="email-content">                 
                <tr>                     
                <td>A member of our customer service team will contact you at '.$vistor_email.' or '.$vistor_phone.' within 24 to 48 hours.</td>                          
                </tr>
                <tr>                     
                <td>Thank you!</td>                         
                </tr> 
                <tr>                     
                <td>S&amp;L Customer Service</td>                         
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

  header('Location: response.php');  
  }//HONEYPOT
	
}else{//ISSET


?>




<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<title>S and L Home Services </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
<link href="css/mystyle.css" rel="stylesheet" type="text/css">    
<link href="css/stylesheet.css" rel="stylesheet" type="text/css">

<link href="css/stylesheet.scss">
<style>
	#form-container div:nth-child(3){
		position: absolute;
		top:-7000px;
		}
	
</style>
	
</head>

<body>
<div class="container">

<nav class="navbar navbar-expand-md navbar-light bg-white mb-4 border-bottom">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">S &amp; L Home Services</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav me-auto mb-2 mb-md-0">
        <li class="nav-item">
          <a class="nav-link"  href="about.php">ABOUT</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="services.php">SERVICES</a>
        </li>
         <li class="nav-item">
          <a class="nav-link" href="careers.php">CAREERS</a>
        </li>
           <li class="nav-item">
          <a class="nav-link" href="contact.php">CONTACT US</a>
        </li>
      </ul>
   
    </div>
  </div>
</nav>


<!--nav code source https://getbootstrap.com/docs/5.0/examples -->

    
    <header>
    <h1 class="border-bottom py-3 ps-3">Contact</h1>
    </header>
    
    
    
<main>
<div class="row">
    <h2 class="text-center pt-3">Get in Touch.</h2>
    <div class="col-md-6 p-5">
    <p>Ready to schedule your free estimate? Have additional questions about our organization or services? Please call or stop by our office. You may also email us or submit an online question. We look forward to serving you!</p>
        
    <form id="form-container" method="post" action="response.php">
    <div class="mb-3"> <!--first name-->
    <label for="fName" class="form-label">First Name</label>    
    <input type="text" class="form-control" id="fName" name="fName" placeholder="Jane">
    </div>
        
    <div class="mb-3"> <!--last name-->
    <label for="lName" class="form-label">Last Name</label>    
    <input type="text" class="form-control" id="lName" name="lName" placeholder="Doe">
    </div>
		
		
	<div class="mb-3"> <!--middle name-->
    <label for="mName" class="form-label">Middle Name</label>    
    <input type="text" class="form-control" id="mName" name="mName" placeholder="M">
    </div>

        
    <div class="mb-3"> <!--email -->
    <label for="email" class="form-label">Email</label>
    <input type="email" class="form-control" id="email" name="email" placeholder="email@email.com">
    
    </div>
       
     <div class="mb-3"> <!--phone -->
    <label for="phone" class="form-label">Phone Number</label>
    <input type="tel" class="form-control" id="phone" name="phone" placeholder="515-555-5555" pattern="/^(?:(?:\(?(?:00|\+)([1-4]\d\d|[1-9]\d?)\)?)?[\-\.\ \\\/]?)?((?:\(?\d{1,}\)?[\-\.\ \\\/]?){0,})(?:[\-\.\ \\\/]?(?:#|ext\.?|extension|x)[\-\.\ \\\/]?(\d+))?$/i">
    
    </div>
        
    <div class="mb-3"> <!--subject drop down -->
  <label for="subject" class="form-label">Subject</label>
  <select id="subject" class="form-select"  name="subject" size="1">
    <option value="estimate">Request an Estimate</option>
    <option value="careers">Careers</option>
    <option value="inquiry">General Inquiry</option>
    <option value="billing">Billing</option>
  </select>
    </div>
        
    <div class="mb-3"> <!--message -->
    <label for="message" class="form-label">Message</label>
     <textarea name="message" class="form-control" rows="3"></textarea> 
    </div>

    <input type="submit" class="btn btn-primary" name="submit" value="Submit">
    <input type="reset" class="btn btn-primary" name="reset" value="Reset">
        
    </form>
        

    </div>

    
    <div class="col-md-6 p-5">
    <h6>Phone: 515-555-5555 | Email: contact@sandl.com</h6>
    <h6>1234 Des Moines Ave, Des Moines, IA, 50310</h6>
    <h6>Monday - Friday 8am to 6pm</h6>
    </div>


    
</div> <!--close row div-->
</main>
    
<footer>
<div class="p-3 text-center" style="font-weight:lighter;" >
<p class="m-0">S &amp; L Home Services</p>
<p class="m-0">About | Services | Careeres | Contact Us </p>
<p class="m-0">Hours: Monday - Friday 8am to 6pm</p>
<p class="m-0">515-555-5555</p>
<p class="m-0">contact@sandl.com</p>
</div>
  <div class="text-center p-4">
   <p> &copy; <?php echo date("Y") . " "; ?>Copyright
    S &amp; L Home Services</p>
    <a href="login.php" style="color:black; text-decoration:none; font-weight:lighter " class="admin">Administrative Portal</a>
  </div>
</footer>



</div> <!--close container div-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>
<?php
}//ISSET 
?>