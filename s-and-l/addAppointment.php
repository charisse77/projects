<?php
session_start();

$goodInsert = false; 
$error = "";

if(isset($_SESSION['validUser']) && $_SESSION['validUser']){
	//allow access
}
else{
	//deny access and return to login page 
	header("Location: login.php");
}

  if(isset($_POST['submit'])){


      //HONEY POT//
         if(!empty( $honeyPot ) ){

         }else{
      //HONEY POT//    

  try{
    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];
    $middleName = $_POST['middle_name'];
    $emailAddress = $_POST['email'];
    $phoneNum = $_POST['phone'];
    $honeyPot = $_POST['estimate_file'];
    $apptType = $_POST['appointment_type'];
    $apptNotes = $_POST['appointment_notes'];
  

  
    require "dbConnect.php";
    $sql = "INSERT INTO add_appointment (first_name, last_name, middle_name, email, phone_number, appointment_type, appointment_notes) VALUES (:firstName, :lastName, :middleName, :email, :phoneNumber, :appointmentType, :appointmentNotes)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':firstName', $firstName);
    $stmt->bindParam(':lastName', $lastName);
    $stmt->bindParam(':middleName', $middleName);
    $stmt->bindParam(':email', $emailAddress);
    $stmt->bindParam(':phoneNumber', $phoneNum);
    $stmt->bindParam(':appointmentType', $apptType);
    $stmt->bindParam(':appointmentNotes', $apptNotes);
    $stmt->execute();

    $count = $stmt->rowCount();
    
    if($count == ""){  
			$error = "There has been a problem. The system administrator has been contacted. Please try again later";
		}else{
      $goodInsert = true; 
		
		}


    // Check rows submitted into database 
		  // 	if the INSERT returns at least one record assume valid submit
		  // 	if SELECT returns 0 records assume invalid submit 
		  // 	if you have a valid submit display confirmation message 
	  	// 	else display error message 

  
   
  }catch(PDOException $e){

				error_log($e->getMessage());	

  }//END TRY-CATCH
}//END HONEY POT
}//END ISSET


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
div:nth-child(6){
  display: none;
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

<main>
  <?php
  if($goodInsert){

 

  ?>
 <!-- BLOCK 1 -->

 <div class="row justify-content.center px-5">
   <h1 class="text-center pt-3">
      Appointment Confirmation
   </h1>
    <h3 class="py-5">The appointment has been submitted! </h3>
      <p>Client Name: <?php echo $firstName . " " . $lastName ?> </p>
      <p>Client Phone Number: <?php echo $phoneNum ?> </p>
      <p>Email: <?php echo $emailAddress ?> </p>
      <p>Appointment Type: <?php echo $apptType ?> </p>
      <p>Appointment Notes: <?php echo $apptNotes ?> </p>

    <ul>
			<li> <a href="addAppointment.php">Add a new appointments</a> </li>
			<li> <a href="viewAll.php">View all appointments</a>  </li>
			<li> <a href="logout.php">Log off</a> </li>
		</ul>

 </div>

 <?php 
  
}else{
   echo "<h3>$error</h3>";

  
 ?>

<div class="row justify-content-center"> <!-- BLOCK 2 -->
    <h2 class="text-center pt-3">Add an Appointment</h2>
    <div class="col-md-7 p-5">
        
    <form id="form-container" method="post" action="addAppointment.php">
    <div class="mb-3"> <!--first name-->
    <label for="first_name" class="form-label">Customer First Name</label>    
    <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Jane">
    </div>
        
    <div class="mb-3"> <!--last name-->
    <label for="last_name" class="form-label">Customer Last Name</label>    
    <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Doe">
    </div>
		
		
	<div class="mb-3"> <!--middle name-->
    <label for="middle_name" class="form-label">Customer Middle Name</label>    
    <input type="text" class="form-control" id="middle_name" name="middle_name" placeholder="M">
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
  <label for="estimate_file" class="form-label">Estimate on File?</label>
  <input type="text" class="form-control" id="estimate_file" name="estimate_file" placeholder="Yes">
    </div>
        
        
    <div class="mb-3"> <!--subject drop down -->
  <label for="appointment_type" class="form-label">Appointment Type</label>
  <select id="appointment_type" class="form-select"  name="appointment_type" size="1">
    <option value="estimate">Estimate</option>
    <option value="window">Window Repair </option>
    <option value="kitchen">Kitchen Remodel</option>
    <option value="basement">Basement Finishing</option>
    <option value="bathroom">Bathroom Remodel</option>
    <option value="whole_home">Whole Home Remodel</option>
    <option value="handyman">Handyman Service</option>
  </select>
    </div>
        
    <div class="mb-3"> <!--message -->
    <label for="appointment_notes" class="form-label">Appointment Notes</label>
     <textarea name="appointment_notes" id="appointment_notes" class="form-control" rows="3"></textarea> 
    </div>

    <input type="submit" class="btn btn-primary" name="submit" value="Submit">
    <input type="reset" class="btn btn-primary" name="reset" value="Reset">
        
    </form>
        

    </div>

    
</div> <!--close row div-->
<?php
}//END IF 
?>
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
