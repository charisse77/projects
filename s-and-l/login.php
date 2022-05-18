<?php
session_start();

$validUser = false; 
$errMsg = "";
if(isset($_POST['submit'])){


$loginName = $_POST['username'];
$loginPW = $_POST['password'];


try{
  require "dbConnect.php";
  $sql = "SELECT event_user_name, event_user_password FROM event_user WHERE event_user_name=:userName AND event_user_password=:userPW";
  $stmt = $conn->prepare($sql); //prepare statment
	$stmt->bindParam(':userName', $loginName);
	$stmt->bindParam(':userPW', $loginPW);
  $stmt->execute(); 

  $resultArray = $stmt->fetchAll(PDO::FETCH_ASSOC); 
  $numRows = count($resultArray);


  if($numRows == 1){
    //set session variable
    $_SESSION['validUser'] = true;
    $validUser = true;
    //display admin options
  }else{
    //invalid user
    $errMsg = "Username/Password invalid. Please try again!";
    //display form
  }

}catch(PDOException $e){
  error_log($e->getMessage());
}

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

<style>
 div:nth-child(3){
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
  if($validUser){ 
  ?>
<div id="admin-block" class="row justify-content-center"> <!-- BLOCK 1 -->
    <div class="col-md-6 p-5">
    <h3>Welcome to the Administrative Portal</h3>
    <p>You have the following options available to you as an administrator. </p>
    <ul>
			<li> <a href="addAppointment.php">Add a new appointments</a> </li>
			<li> <a href="viewAll.php">View all appointments</a>  </li>
			<li> <a href="logout.php">Log off</a> </li>
		</ul>
    
    </div>
    </div>

  <?php
  }else{
    echo "<h3>$errMsg</h3>"
  
  ?>
    
<div class="row justify-content-center"> <!-- BLOCK 2 -->
    <h2 class="text-center pt-3">Administrative Login Portal</h2>
    <div class="col-md-6 p-5">
    <p>Welcome to the Administrative Login Portal. Please enter your username and passowrd to access the portal. If you do not remember your username or password please contact support. </p>
        
    <form id="form-container" method="post" action="login.php">
    <div class="mb-3"> <!--username-->
    <label for="username" class="form-label">Username</label>    
    <input type="text" class="form-control" id="username" name="username" placeholder="Username">
    </div>
        
    <div class="mb-3"> <!--password -->
    <label for="password" class="form-label">Password</label>    
    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
    </div>
		
		
	<div class="mb-3"> <!--employee name-->
    <label for="employeeName" class="form-label">Employee Name</label>    
    <input type="text" class="form-control" id="employeeName" name="employeeName" placeholder="Jane Fox">
    </div>

    <input type="submit" class="btn btn-primary" name="submit" value="Submit">
    <input type="reset" class="btn btn-primary" name="reset" value="Reset">
        
    </form>
        

    </div>

    
    
 
</div>
</main>
    
<footer>
<div class="text-center p-5">
<p>S &amp; L Home Services</p>
<p>About | Services | Careeres | Contact Us</p>
<p>Hours: Monday - Friday 8am to 6pm</p>
    <p>515-555-5555</p>
    <p>contact@sandl.com</p>
    <a href="login.php">Administrative Portal</a>
</div>
  <div class="text-center p-4">
   <p> &copy; <?php echo date("Y") . " "; ?>Copyright
    S &amp; L Home Services</p>
  </div>
</footer>


</div> <!--close container div-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<?php
} //END IF 
?>
</body>
</html>
