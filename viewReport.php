
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
 

    $query2="SELECT* FROM `prescription` WHERE `p_patphone`= '$p_phone'";
    $res2=mysqli_query($link,$query2);
    if (!$res2 || mysqli_num_rows($res2) === 0) {
      die("Prescription not found.");
    }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report</title>
    <link href="assets/css/doctor_dashboard.css" rel="stylesheet">

    <link href="assets/css/viewReport.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  
   
    
</head>
<body> 
    
<header id="header" >
    <div class="container">

      
      <h1 class="logo me-auto"><a href="doc_dashboard.php?user_phone=<?php echo urlencode($doc_phone); ?>">iCare</a></h1>
       <!-- navbar-->
      <nav id="navbar" class="navbar navbar-light">
      <ul>
          <li><a class="nav-link scrollto" href="doc_dashboard.php?user_phone=<?php echo urlencode($doc_phone); ?>">Appointments</a></li>
          <li><a class="nav-link scrollto" href="patient_list.php?user_phone=<?php echo urlencode($doc_phone); ?>">Patients</a></li>
          <li><a class="nav-link scrollto" href="doc_profile.php?user_phone=<?php echo urlencode($doc_phone); ?>">Profile</a></li>
          <li><a class="nav-link scrollto active" href="login.html">Logout</a></li>
          
        </ul>
      </nav><!-- .navbar -->
    </div>
</header>
  <!-- <br></br>
  <br></br> -->

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