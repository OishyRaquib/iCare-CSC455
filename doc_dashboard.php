<?php
session_start();
if (isset($_GET['user_phone'])===true) {

  $phone = $_GET['user_phone'];
}

else
 { 
    $phone = $_GET['phone'];
}
$link=mysqli_connect("localhost","root","","hospital");
if($link===false){  
    die("Unable to connect".mysqli_connect_error());
}
  
  
$res=mysqli_query($link,"SELECT* FROM doctor_details where doc_phone='$phone'");
$row = mysqli_fetch_assoc($res);
$name = $row['doc_name'];
    //   $dept = $row['doc_dept'];
    //   $exp = $row['doc_exp'];
    //   $des = $row['doc_desc'];
$res=mysqli_query($link,"SELECT* FROM appointment_details where app_doc_phone='$phone'");
// $arr = mysqli_fetch_array($res);
// $name = $row['doc_name'];

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard</title>


 <link href="assets/css/doctor_dashboard.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body>

	<header id="header" class="fixed-top">
    <div class="container">

      
      <h1 class="logo me-auto"><a href="doctor_dashboard.html">iCare</a></h1>
       <!-- navbar-->
      <nav id="navbar" class="navbar navbar-light">
        <ul>
          <li><a class="nav-link scrollto" href="doctor_dashboard.php?user_phone=<?php echo $phone?>">Appointments</a></li>
        <li><a class="nav-link scrollto" href="patient_list.html">Patients</a></li>
          <li><a class="nav-link scrollto" href="doc_profile.php?user_phone=<?php echo $phone?>">Profile</a></li>
          <li><a class="nav-link scrollto active" href="login.html">Logout</a></li>
          
        </ul>
      </nav><!-- .navbar -->
    </div>
  </header>

    <!--Contents-->
    
    <h5 class="mt-5" id="apt_text">Appointments Today</h5>
    <section class=" container" id="apt_con">
    <div class="row">
    <?php while($row=mysqli_fetch_assoc($res)){ ?>
      <div class="col-sm-12 col-md-6 col-lg-4 mb-4">
      
        <div class="card" >
          <div class="card-body">
            <h5 class="card-title" style="text-transform:capitalize;"><?php echo $row['app_pat_name'];?></h5>
            <p class="card-text"><?php echo $row['app_problem'];?></p>
          </div>
          <ul class="list-group list-group-flush">
            <li class="list-group-item">Time: <?php echo $row['app_time'];?></li>
            <li class="list-group-item">Date: <?php echo $row['app_date'];?></li>
            <!-- <li class="list-group-item">A third item</li> -->
          </ul>
          <div class="card-body">
            <a href="report.html" class="card-link card-body" >View Report</a>
            <a href="prescription.html" class="card-link card-body" >Prescription</a>
          </div>
          
        </div>
        
        
      </div>
      <?php }?>
      
      <!-- <div class="col-sm-12 col-md-6 col-lg-4 mb-4">
        <div class="card" >
          <div class="card-body">
            <h5 class="card-title">Charlotte Alves</h5>
            <p class="card-text">Chest pain and abdominal pain may start within a week, but rarely together at the same time.</p>
          </div>
          <ul class="list-group list-group-flush">
            <li class="list-group-item">Time: 10:00-11:00am</li>
            <li class="list-group-item">Last Visited: 8th March 2023</li>
    
          </ul>
          <div class="card-body">
            <a href="report.html" class="card-link card-body" >View Report</a>
            <a href="#" class="card-link card-body" >Prescription</a>
          </div>
        </div>
      </div>
      <div class="col-sm-12 col-md-6 col-lg-4 mb-4">
        <div class="card" >
          <div class="card-body">
            <h5 class="card-title">Pascal Socrates</h5>
            <p class="card-text">Feeling weak and toe numbness slowly increase in severity over a few days</p>
          </div>
          <ul class="list-group list-group-flush">
            <li class="list-group-item">Time: 11:00-12:00pm</li>
            <li class="list-group-item">Last Visited: 18th March 2023</li>
            
          </ul>
          <div class="card-body">
            <a href="#" class="card-link card-body" >View Report</a>
            <a href="#" class="card-link card-body" >Prescription</a>
          </div>
        </div>  
      </div>
      <div class="col-sm-12 col-md-6 col-lg-4 mb-4">
        <div class="card" >
          <div class="card-body">
            <h5 class="card-title">Heli Olev Simonsen</h5>
            <p class="card-text">Suffers from hyperactivity and feeling light-headed,sleeping difficulty, chest pain.</p>
          </div>
          <ul class="list-group list-group-flush">
            <li class="list-group-item">Time: 2:00-3:00pm</li>
            <li class="list-group-item">Last Visited: 29th March 2023</li>
          
          </ul>
          <div class="card-body">
            <a href="#" class="card-link card-body" >View Report</a>
            <a href="#" class="card-link card-body" >Prescription</a>
          </div>
        </div>  
      </div> -->
      

    </div>
  </section>
    <!--End of Contents-->


    

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>