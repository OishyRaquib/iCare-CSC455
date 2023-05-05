
<?php
    session_start();
    if (isset($_GET['pat_phone']) && isset($_GET['doc_phone'])) {

    
    $p_phone= $_GET['pat_phone'];
    $doc_phone = $_GET['doc_phone'];
    
    }

    else
    { 
    //   die("Unable to connect to the database".mysqli_error());
    }
    $link=mysqli_connect("localhost","root","","hospital");
    if(!$link){  
        die("Unable to connect to the database".mysqli_connect_error());
    }
    // $query1="SELECT* FROM `doctor_details` WHERE `doc_phone`='$doc_phone'";
    // $res1=mysqli_query($link,$query1);
    // if (!$res1 || mysqli_num_rows($res1) === 0) {
    //   die("Doctor not found.");
    // }
    // $row1=mysqli_fetch_assoc($res1);
    // $doctor_name=$row1['doc_name'];

    $query2="SELECT*FROM prescription WHERE p_patphone= $p_phone AND p_docphone= $doc_phone ";
    $res2=mysqli_query($link,$query2);
    if (!$res2 || mysqli_num_rows($res2) === 0) {
      die("Prescription not found.");
    }
    // $row2 = mysqli_fetch_assoc($res2);
    // $name = $row2['pat_name'];
    // $pat_phone=$p_phone;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    <link rel="stylesheet" href="assets/css/report.css" />
  
   
    <title>Report</title>
</head>
<body> 
    
<header id="header" class="fixed-top">
    <div class="container">

      
      <h1 class="logo me-auto"><a href="doc_dashboard.php?user_phone=<?php echo urlencode($doc_phone); ?>">iCare</a></h1>
       <!-- navbar-->
      <nav id="navbar" class="navbar navbar-light">
      <ul>
      <li><a class="nav-link scrollto" href="index.php?user_phone=<?php echo trim($_SESSION['user_phone']); ?>">Dashboard</a></li>
            <li><a class="nav-link scrollto" href="department.php?user_phone=<?php echo trim($_SESSION['user_phone']); ?>">Departments</a></li>
            <li><a class="nav-link scrollto" href="reportlist.php?user_phone=<?php echo trim($_SESSION['user_phone']); ?>">Report</a></li>
              <li><a class="nav-link scrollto" href="login.html">Sign Out</a></li>
              <li><a href="department.php?user_phone=<?php echo $_SESSION['user_phone']; ?>" class="appointment-btn scrollto"><span class="d-none d-md-inline">Book </span> Appointment</a></li>
        </ul>
      </nav><!-- .navbar -->
    </div>
  </header>
<br><br><br>

    


<?php while($row=mysqli_fetch_assoc($res2)){ ?>

<div class="container">
<div class="card mt-5 ms-5 mb-5 me-5" id="card_" style="width:90%; height:auto;" >
  <div class="card-body">
    <h5 class="card-title" id="patname" style="text-transform: capitalize;"><?php echo $row['p_name']; ?></h5>
    <hr></hr>
    <h6 class="card-subtitle mb-2" style="color: #12ddbe;">Treatment Details</h6>
    <p class="card-text"><?php echo $row['p_treat_details']; ?></p>
    <h6 class="card-subtitle mb-2 " style="color: #12ddbe;">Medication</h6>
    <p class="card-text"><?php echo $row['p_meds']; ?></p>
    <h6 class="card-subtitle mb-2 " style="color: #12ddbe;">Recommendation</h6>
    <p class="card-text"><?php echo $row['p_inst'];?></p>
    <h6 class="card-subtitle mb-2 " style="color: #12ddbe;">Doctor Name</h6>
    <p class="card-text">Dr.<?php echo $row['d_name'];?></p>
    <h6 class="card-subtitle mb-2 " style="color: #12ddbe;">Appointmnet Date</h6>
    <p class="card-text"><?php echo $row['p_date'];?></p>
    <?php if($row['p_docphone']===$doc_phone){ ?>
    <?php $id=$row['p_patphone']; ?>
      <!-- <a href="#"  class="card-link" style="color:#e9cb37;" name="edit" type="submit">Edit</a> -->
    <a href="deleteReport.php?del_id=<?php echo urlencode($id); ?>&user_phone=<?php echo urlencode($doc_phone); ?>" class="card-link" style="color:#e9cb37;" type="submit" name="del">Delete</a>
    <?php } ?>
  </div>
</div>
</div>
<?php } ?>





<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>