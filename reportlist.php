<?php


session_start();
if (isset($_GET['user_phone'])) {
    $user_phone = $_GET['user_phone'];
} else {
    // Handle the case where the user id is not provided
}
           $link = mysqli_connect("localhost", "root", "", "hospital");

           if (!$link) {
               die("Could not connect: " . mysqli_connect_error());
           }

           $res=mysqli_query($link,"SELECT* FROM department");
                 
                
           
         

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="assets/css/schedule.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   
    <link rel="stylesheet" href="assets/css/style.css" />
    <title>Document</title>
</head>
<body>
    <header id="header" class="fixed-top">
        <div class="container">
    
          
            <h1 class="logo me-auto"><a href="index.html">iCare</a></h1>
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
    
    <br> <br> <br><br> <br>
    







        <!--Tabel section starts-->
        <h1 class="t">Report</h1>
        <table class="contents">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Doctor name</th>
                    <th>Patient name</th>
                    <th>Phone</th>
                    <th>Date</th>
                    
                   
                  
                    <th>Details</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $res = mysqli_query($link, "SELECT * FROM prescription WHERE p_patphone=$user_phone");
                $count=0;
                while ($row = mysqli_fetch_assoc($res)) {
                 $count=$count+1;
                echo"<tr>
                <td>".$count."</td>
                      
                <td>".$row['d_name'] ."</td>
                <td>".$row['p_name'] ."</td>
                <td>".$row['p_docphone'] ."</td>
                <td>".$row['p_date'] ."</td>";
                $d_phone=$row['p_docphone'];
                echo '<th><a href="viewReport2.php?pat_phone=++'.urlencode($user_phone).'++&doc_phone=++'.urlencode($d_phone).'++" class="but">View Report</a></th>';


                echo'</tr>';
                }
              ?>
               
            </tbody>
        </table>
       
</body>
</html>