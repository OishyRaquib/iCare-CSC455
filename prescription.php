<?php
    session_start();
    if (isset($_GET['pat_phone']) && isset($_GET['d_phone'])) {

    
    $p_phone= $_GET['pat_phone'];
    $doc_phone = $_GET['d_phone'];
    
    }

    else
    { 
        // $phone = $_GET['phone'];
    }
    $link=mysqli_connect("localhost","root","","hospital");
    if(!$link){  
        die("Unable to connect to the database".mysqli_connect_error());
    }
    $query1="SELECT* FROM `doctor_details` WHERE `doc_phone`='$doc_phone'";
    $res1=mysqli_query($link,$query1);
    $row1=mysqli_fetch_assoc($res1);

    $query2="SELECT* FROM `patient_details` WHERE `pat_phone`= trim('$p_phone')";
    $res2=mysqli_query($link,$query2);
    $row2 = mysqli_fetch_assoc($res2);
    $name = $row2['pat_name'];

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
          <li><a class="nav-link scrollto active" href="login.html">Logout</a></li>
          
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
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label mt-2">Name</label>
            <fieldset disabled>
            <input type="text" id="disabledTextInput" class="form-control" style="text-transform:capitalize;"  placeholder="<?php echo $name; ?>">
        </fieldset>
          </div>
          
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label mt-2">Date</label>
            <input type="date" class="form-control" id="exampleFormControlInput2" placeholder="Appointment Date">
          </div>
          <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label mb-3 mt-3">Treatment Details</label>
            <textarea class="form-control"  placeholder="Type your message here..."></textarea>
          </div >
          <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label mb-3 mt-3">Medication</label>
            <textarea class="form-control"  placeholder="Type your message here..."></textarea>
          </div >
          <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label mb-3 mt-3">Special Instructions</label>
            <textarea class="form-control"  placeholder="Type your message here..."></textarea>
          </div >
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label mt-2">Signature</label>
            <fieldset disabled>
            <input type="text" id="disabledTextInput" class="form-control"  placeholder="Dr. <?php echo $row1['doc_name']?>">
        </fieldset>
          </div>
          <button type="button"  class="btn mb-4" id="btn"><a href="doctor_dashboard.html" id="aa">Prescribe</a></button>
         </div>
         
       </div>
          
    </div>
  </section>

  <!---->

  
            
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>