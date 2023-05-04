<?php
$contact=$_POST['user_phone'];
$dept_name=$_POST['department'];

session_start();
$_SESSION['user_phone'] = $contact;


$link = mysqli_connect("localhost", "root", "", "hospital");

if (!$link) {
    die("Could not connect: " . mysqli_connect_error());
}

$res = mysqli_query($link, "SELECT * FROM doctor_details WHERE doc_dept='{$dept_name}'");


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/doctor.css">
</head>




<body>


    <header id="header" class="fixed-top">
        <div class="container">
    
          
            <h1 class="logo me-auto"><a href="index.html">iCare</a></h1>
           <!-- navbar-->
          <nav id="navbar" class="navbar navbar-light">
            <ul>
            <li><a class="nav-link scrollto" href="index.php?user_phone=<?php echo trim($_SESSION['user_phone']); ?>">Dashboard</a></li>
            <li><a class="nav-link scrollto" href="department.php?user_phone=<?php echo trim( $_SESSION['user_phone']); ?>">Departments</a></li>
            
              <li><a class="nav-link scrollto" href="reportlist.html">Report</a></li>
            
             
              <li><a class="nav-link scrollto" href="#doctors">Doctors</a></li>
              <li><a class="nav-link scrollto" href="login.html">Sign Out</a></li>
              <li><a href="department.html" class="appointment-btn scrollto"><span class="d-none d-md-inline">Book </span> Appointment</a></li>
            </ul>
          </nav><!-- .navbar -->
        </div>
      </header>
    




     


    <section class="card-container">
    <?php
     while ($row = mysqli_fetch_assoc($res))
{
    $doc_phone=$row['doc_phone'];
       echo "<div class=card>
            <div class=image-contents>
                <span class=overlay></span>
                <div class=card-image>
                    <img src=assets/images/doctor-1.jpg alt=doctor-1 class=image>
                </div>
            </div>

            <div class=card-contents>
                <h2 class=doctor-name>" .$row['doc_name']."</h2>
                <p class=info>".$row['doc_desc']."</p>
                <form action=schedule.php method=post>
                <input type=hidden name=department value='$dept_name'>
                <input type=hidden name=doc_phone value='$doc_phone'>
                <input type=hidden name=user_phone value=' $contact '>
                <button type=submit class=main-btn >See doctor</button>
              </form>
                      
                
            </div>
        </div>";

}
    ?>

    </section>
</body>

</html>