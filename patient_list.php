<?php
// require ('doc_dashboard.php');
session_start();
if(isset($_GET['user_phone'])){
    $phone = $_GET['user_phone'];
}
else{
    
    // die("Unable to connect");
}
$link=mysqli_connect("localhost","root","","hospital");
        if(!$link){      
            die("Unable to connect".mysqli_connect_error());
        }
    
    
    $query="SELECT* FROM appointment_details WHERE app_doc_phone=trim('$phone')";
    $res=mysqli_query($link,$query);
    $counter=0;

    
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Patients</title>


 <link href="assets/css/patient_list.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body>

	<header id="header" class="fixed-top">
    <div class="container">

      
      <h1 class="logo me-auto"><a href="doc_dashboard.php?user_phone=<?php echo urlencode($phone); ?>">iCare</a></h1>
       <!-- navbar-->
      <nav id="navbar" class="navbar navbar-light">
      <ul>
          <li><a class="nav-link scrollto" href="doc_dashboard.php?user_phone=<?php echo urlencode($phone); ?>">Appointments</a></li>
        <li><a class="nav-link scrollto" href="patient_list.php?user_phone=<?php echo urlencode($phone); ?>">Patients</a></li>
          <li><a class="nav-link scrollto" href="doc_profile.php?user_phone=<?php echo urlencode($phone); ?>">Profile</a></li>
          <li><a class="nav-link scrollto active" href="register.php">Logout</a></li>
          
        </ul>
      </nav><!-- .navbar -->
        </div>
    </header>

<br></br>
<!--Table section-->
<section class="mt-5 pt-5">
    <table class="contents">

        <thead>
            <tr>
                <th>Serial No.</th>
                <th>Patient Name</th>
                <th>Phone No.</th>
                <th>Date</th>
                <th>Problem</th>
                <th>Details</th>
            </tr>
        </thead>

        <tbody>
        <?php
        
        while($row=mysqli_fetch_assoc($res)){ ?>
            <tr>
                <td><?php echo $counter=$counter+1; ?></td>
                <td style="text-transform:capitalize;"><?php echo $row['app_pat_name']; ?></td>
                <td><?php echo $row['app_pat_phone']; ?></td>
                <td><?php echo $row['app_date']; ?></td>
                <td style="text-transform:capitalize;"><?php echo $row['app_problem']; ?></td>
                <th><a href="viewReport.php?pat_phone=<?php echo urlencode($row['app_pat_phone']);?>&doc_phone=<?php echo urlencode($row['app_doc_phone']);?>" style="text-decoration:none;">View Report</a></th>
            </tr>
        <?php }?>
            
           
           
        </tbody>
    </table>
</section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>