<?php

try{
	include 'dbConnect.php';
	
	$sql = "SELECT service_name, service_description, service_image FROM services ORDER BY service_name DESC";
	$stmt = $conn->prepare($sql); //prepare statment
	$stmt->execute(); 
	//$result = $stmt->fetch(PDO::FETCH_ASSOC); //$result is an ARRAY
	//echo "<h1>" . $result['service_name'] . "</h1>";
	
	
}catch(PDOException $e){
  error_log($e->getMessage());	
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
<!--<link href="css/adStyle.css" rel="stylesheet" type="text/css">-->

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

    
    <header>
    <h1 class="border-bottom py-3 ps-3">Services</h1>
    <div class="background1">
    </div>
            
    </header>
    
<main>
<div class="row">
	
<!--<div class="card mx-auto mt-4" style="width: 18rem;">
  <img class="card-img-top" src="../Bootstrap Portolio/images/tools.jpg" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>-->


  <?php
		foreach($stmt->fetchAll(PDO::FETCH_ASSOC) as $result){ //top of foreach 	
	?>

<div class="card mx-auto mt-4" style="width: 18rem;">
  <img class="card-img-top mt-2" src="../Bootstrap Portolio/images/<?php echo $result['service_image'] ?>" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title"><?php echo $result['service_name']; ?></h5>
    <p class="card-text"><?php echo $result['service_description']; ?></p>
  </div>
</div>

    <?php
			} //end of foreach() --loop creates as many product blocks as there are rows in table 
	 ?>
    

<!-- BEGIN READY TO START PROJECT BLOCK -->    

<div class="p-5">
<h1 class="text-center pb-4">Ready to Start Your Next Project?</h1> 
<div class="d-grid gap-2 col-6 mx-auto">
  <button class="btn btn-primary" type="button" onClick="document.location='contact.php'">REQUEST A QUOTE</button>
</div>
</div> 
<!-- END READY TO START PROJECT BLOCK-->        
</div> <!--END ROW DIV-->
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

</body>
</html>
