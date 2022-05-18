<?php
session_start();
if(isset($_SESSION['validUser']) && $_SESSION['validUser']){
	//allow access
}
else{
	//deny access and return to login page 
	header("Location: login.php");
}

include 'dbConnect.php';
 


try{
    $sql = "SELECT * FROM add_appointment";
    $stmt = $conn->prepare($sql); //prepare the statement
    $stmt->execute(); 
    

    
    }
    catch(PDOEXCEPTION $e){
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

<link href="css/stylesheet.scss">
<script>

function callDelete(self){
	let id = self.getAttribute('data-id');
	// document.getElementById("form_delete").id.value = id; 
	window.location.href = "delete.php?id="+id;

}
 



</script>

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

<header>
    <h1 class="border-bottom py-3 ps-3">View All Appointments</h1>
    </header>
 <div class="row justify-content.center px-5">
 <!-- <form action="delete.php" id="form_delete" method="get">
		<input type="text" name="id"> -->


 <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Middle</th>
      <th scope="col">Email</th>
      <th scope="col">Phone Number</th>
      <th scope="col">Appointment Type</th>
      <th scope="col">Appointment Notes</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  
  <tbody>
 <?php
 foreach($stmt->fetchAll(PDO::FETCH_ASSOC) as $row){
    
 
?>  
    <tr id="info">
      <th scope="row"><?php echo $row['id']; ?></th>
      <td><?php echo $row['first_name']; ?></td>
      <td><?php echo $row['last_name']; ?></td>
      <td><?php echo $row['middle_name']; ?></td>
      <td><?php echo $row['email']; ?></td>
      <td><?php echo $row['phone_number']; ?></td>
      <td><?php echo $row['appointment_type']; ?></td>
      <td><?php echo $row['appointment_notes']; ?></td>
      <td>
      <form action="#" method="get">
      <!-- <label for="delete_reason" class="form-label">Delete Reason:</label>
      <input type="text" class="form-control" id="delete_reason"  name="delete_reason">
       -->
       <button type="button" data-id="<?php echo $row['id']  ?>" onclick='callDelete(this)'>
      Delete
      </button>
      </form>
    </td>
  <?php
}
?>
    </tr>

</table>

    
</div> <!--close row div-->

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
