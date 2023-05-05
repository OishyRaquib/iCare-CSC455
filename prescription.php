<?php
    session_start();
    if (isset($_GET['pat_phone']) && isset($_GET['d_phone'])) {

    
    $p_phone= $_GET['pat_phone'];
    $doc_phone = $_GET['d_phone'];
    
    }

    else
    { 
      die("Unable to connect to the database".mysqli_error());
    }
    $link=mysqli_connect("localhost","root","","hospital");
    if(!$link){  
        die("Unable to connect to the database".mysqli_connect_error());
    }
    $query1="SELECT* FROM `doctor_details` WHERE `doc_phone`='$doc_phone'";
    $res1=mysqli_query($link,$query1);
    if (!$res1 || mysqli_num_rows($res1) === 0) {
      die("Doctor not found.");
    }
    $row1=mysqli_fetch_assoc($res1);
    $doctor_name=$row1['doc_name'];
    // $doctor_phone=$doc_phone;

    $query2="SELECT* FROM `patient_details` WHERE `pat_phone`= trim('$p_phone')";
    $res2=mysqli_query($link,$query2);
    if (!$res2 || mysqli_num_rows($res2) === 0) {
      die("Patient not found.");
    }
    $row2 = mysqli_fetch_assoc($res2);
    $name = $row2['pat_name'];
    // $pat_phone=$p_phone;

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Prescription</title>


 <link href="assets/css/prescription.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

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
  <br></br>
  <br></br>
  <!--Form-->
  
  <section id="appointment" class="mt-5 mb-5">
    <div class="container" id="apt">
      <h5  class="mt-5">Prescription Form</h5>
      <form method="POST" action="prescription.php?pat_phone=<?php echo urlencode($p_phone); ?>&d_phone=<?php echo urlencode($doc_phone); ?>">
          <div class="mb-3">
            <label class="form-label mt-2">Patient Name</label>
            <fieldset disabled>
            <input type="text" id="disabledTextInput" class="form-control" style="text-transform:capitalize;"  placeholder="<?php echo $name; ?>"/>
            </fieldset>
          </div>
          
          <div class="mb-3">
            <label class="form-label mt-2" for="pres_date">Date</label>
            <input type="date" class="date form-control" name="pres_date" id="pres_date" placeholder="Prescription Date" required/>
          </div>
          <div class="mb-3">
            <label class="form-label mb-3 mt-3">Treatment Details</label>
            <textarea type="text" class="form-control" name="treat" id="treat" placeholder="Type your message here..." required></textarea>
          </div >
          <div class="mb-3">
            <label class="form-label mb-3 mt-3">Medication</label>
            <textarea class="form-control" type="text" name="meds" id="meds" placeholder="Type your message here..." required></textarea>
          </div >
          <div class="mb-3">
            <label class="form-label mb-3 mt-3">Special Instructions</label>
            <textarea class="form-control" type="text" name="inst" id="inst" placeholder="Type your message here..." required></textarea>
          </div >
          <div class="mb-3">
            <label class="form-label mt-2">Signature</label>
            <fieldset disabled>
            <input type="text" id="disabledTextInput" class="form-control"  placeholder="Dr. <?php echo $row1['doc_name']?>">
            </fieldset>
          </div>
          <input type="submit" name="prescribe" value="Prescribe" class="btn mb-4" id="btn" />
         </div>
         
       </div>
       </form>
    </div>
  </section>
 

<?php 
  if(!empty($_POST)){
    // $d_phone=$row1['app_doc_phone'];
    // $pat_phone=$row2['app_pat_phone'];
    $picked_date=$_POST['pres_date'];
    $date_pr=date('Y-m-d',strtotime($picked_date));
    $treatment=$_POST['treat'];
    $medi=$_POST['meds'];
    $instruction=$_POST['inst'];
    $sql="INSERT INTO `prescription`(`p_name`, `p_date`, `p_treat_details`, `p_meds`, `p_inst`, `p_docphone`, `p_patphone`, `d_name`) VALUES ('{$name}','{$date_pr}','{$treatment}','{$medi}','{$instruction}','{$doc_phone}','{$p_phone}','{$doctor_name}')";
    $store=mysqli_query($link,$sql) or die("Unable to store data!");

    
  }
  else{
    // die("Unable to save prescription!");
  }
  mysqli_close($link);
?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>