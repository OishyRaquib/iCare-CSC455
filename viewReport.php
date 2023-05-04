
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

    $query2="SELECT* FROM `prescription` WHERE `p_patphone`= '$p_phone'";
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
     <link href="assets/css/style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css" />
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
          <li><a class="nav-link scrollto" href="doc_dashboard.php?user_phone=<?php echo urlencode($doc_phone); ?>">Appointments</a></li>
          <li><a class="nav-link scrollto" href="patient_list.php?user_phone=<?php echo urlencode($doc_phone); ?>">Patients</a></li>
          <li><a class="nav-link scrollto" href="doc_profile.php?user_phone=<?php echo urlencode($doc_phone); ?>">Profile</a></li>
          <li><a class="nav-link scrollto active" href="register.php">Logout</a></li>
          
        </ul>
      </nav><!-- .navbar -->
    </div>
  </header>
  
 <?php while($row=mysqli_fetch_assoc($res2)){ ?>
    <div class="row mt-2">
  <div class="r">
    <h1>Treatment details</h1>
    <ul>
        <li><?php echo $row['p_treat_details']; ?></li>
        <!-- <li>High fever</li>
        <li>Stomach pain</li> -->
    </ul>
  </div>

    
  <div class="med">


      <div class="r1">
          <h1>Medication</h1>
          <ul>
              <li><?php echo $row['p_meds']; ?></li>
              <!-- <li>High fever</li>
              <li>Stomach pain</li>
              <li>Minor headache</li>
              <li>High fever</li> -->
          </ul>
        </div>
      
        <div class="r2">
          <h1>Recommendation</h1>
          <p><?php echo $row['p_inst'];?></p>
        </div>
        
  </div>


  <div class="r3">
    <div><h1>Prescribed by:</h1><P>Dr.<?php echo $row['d_name'];?></P></div> 
    <div>  <h1>Appointmnet date:</h1><P><?php echo $row['p_date'];?></P></div> 
    
    </div>
  </div>
<hr></hr>
</div>
<?php } ?>






</body>