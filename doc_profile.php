
<?php
// require ('doc_dashboard.php');
session_start();
if(isset($_GET['user_phone'])===true){
    $phone = $_GET['user_phone'];

    
    

}
else{
    die("Unable to connect");
}
$link=mysqli_connect("localhost","root","","hospital");
    if($link===false){      
        die("Unable to connect".mysqli_connect_error());
    }
// $phone=$_GET['user_phone'];
$query="SELECT* FROM doctor_details WHERE doc_phone='$phone'";
$res=mysqli_query($link,$query);
$row = mysqli_fetch_assoc($res);
$name = $row['doc_name'];
$dept = $row['doc_dept'];
$exp = $row['doc_exp'];
$des = $row['doc_desc'];

// $_SESSION['user_phone']=$phone;

    
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Profile</title>


 <link href="assets/css/doc_profile.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body>

	<header id="header" class="fixed-top">
    <div class="container">

      
      <h1 class="logo me-auto"><a href="doctor_dashboard.php?user_phone=<?php echo $phone?>">iCare</a></h1>
       <!-- navbar-->
      <nav id="navbar" class="navbar navbar-light">
        <ul>
          <li><a class="nav-link scrollto" href="doctor_dashboard.html">Appointments</a></li>
        <li><a class="nav-link scrollto" href="patient_list.html">Patients</a></li>
          <li><a class="nav-link scrollto" href="doc_profile.php?user_phone=
          <?php echo $phone?>">Profile</a></li>
          <li><a class="nav-link scrollto active" href="login.html">Logout</a></li>
          
        </ul>
      </nav><!-- .navbar -->
    </div>
  </header>

  <!--Profile-->

<section class="bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 mb-4 mb-sm-5">
                <div class="card card-style1 border-0">
                    <div class="card-body p-1-9 p-sm-2-3 p-md-6 p-lg-7">
                        <div class="row align-items-center">
                            <div class="col-lg-6 mb-4 mb-lg-0">
                                <img src="assets/images/doc7.jpg" alt="..." id="img-port">
                            </div>
                            <div class="col-lg-6 px-xl-10">
                                <div >
                                    <h3 class="h2 mb-0"><?php echo $name;  ?></h3>
                                    
                                </div>
                                <ul class="list-unstyled mb-1-9 mt-4">
                                    <li class="mb-2 mb-xl-3 display-28"><span class="display-26 text-secondary me-2 font-weight-600">Department:</span><?php echo $dept;?></li>
                                    <li class="mb-2 mb-xl-3 display-28"><span class="display-26 text-secondary me-2 font-weight-600">Experience:</span><?php echo $exp;?> Years</li>
                                    <li class="display-28"><span class="display-26 text-secondary me-2 font-weight-600">Phone:</span><?php echo $phone;?></li>
                                    <li><button class="btn btn-primary mt-3" id="btn">Edit</button></li>
                                </ul>
                        
                            </div>
                            
                        </div>
                        
                    </div>
                </div>
            </div>
            </div>
        </div>
    </section>

        
    <h5>Hello, <?php echo $phone?></h5>



            
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>