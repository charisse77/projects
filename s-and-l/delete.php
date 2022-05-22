<?php

$deleteId = $_GET['id']; 

// $honeyPot = $_GET['delete_reason'];

// echo $honeyPot; 

// if(!empty($honeyPot)){
//   return; 
// }else{
//   //PROCESS DELETE//
// }


try{

require 'dbConnect.php';

$sql = "DELETE FROM add_appointment WHERE id=:apptId";
$stmt = $conn->prepare($sql); //prepare the statement
$stmt->bindParam(':apptId', $deleteId); 
$stmt->execute();

$numDeletes = $stmt->rowCount();  


}catch(PDOEXCEPTION $e){
  error_log($e->getMessage());
  $numDeletes = -1; 
}


?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<title>S and L Home Services </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    

<link href="css/stylesheet.css" rel="stylesheet" type="text/css">

<link href="css/stylesheet.scss">
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

<div class="row justify-content-center"> 


    
    <div class="col-md-6 p-5">
<?php

if($numDeletes > 0){
  //display confirmation message 


?>
<h2 class="text-center" style="color:green">Success</h2>
    <p>You have successfully deleted the appointment client ID <?php echo $deleteId;  ?>.  </p>
    <p>As an administrator you may proceed with the following:  </p>
    <ul>
			<li> <a href="addAppointment.php">Add a new appointments</a> </li>
			<li> <a href="viewAll.php">View all appointments</a>  </li>
			<li> <a href="logout.php">Log off</a> </li>
		</ul>
   


      <?php
      }else{
        //display error message
      ?>

       <h1 class="text-center pt-3" style="color:red">Issue Reported</h1>
       <div><p>There was an issue with deleting the appointment. No other appointments were affected. The issue has been reported to the system administrator. Please try again.  </p>
      </div>
      
      <p>As an administrator you may proceed with the following:  </p>
    <ul>
			<li> <a href="addAppointment.php">Add a new appointments</a> </li>
			<li> <a href="viewAll.php">View all appointments</a>  </li>
			<li> <a href="logout.php">Log off</a> </li>
		</ul>
   
    
   <?php

    }
      ?>
 
    

    </div>

    
    
 
</div>

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
