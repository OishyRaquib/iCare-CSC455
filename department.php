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
     <link href="assets/css/style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css" />
    <link rel="stylesheet" href="assets/css/dept.css" />
  
   
    <title>Document</title>
</head>
<body>  <header id="header" class="fixed-top">
    <div class="container">

      
        <h1 class="logo me-auto"><a href="index.html">iCare</a></h1>
       <!-- navbar-->
      <nav id="navbar" class="navbar navbar-light">
        <ul>
         
          <li><a class="nav-link scrollto active" href="index.php?user_phone=<?php echo trim($_SESSION['user_phone']); ?>">Dashboard</a></li>
          <li><a class="nav-link scrollto" href="department.php?user_phone=<?php echo trim($_SESSION['user_phone']); ?>">Departments</a></li>
<!-- <<<<<<< Updated upstream -->

          
<li><a class="nav-link scrollto" href="reportlist.php?user_phone=<?php echo trim($_SESSION['user_phone']); ?>">Report</a></li>
<!-- ======= -->
          
         
        
          
          <li><a class="nav-link scrollto" href="login.html">Sign Out</a></li>
          <li><a href="department.php?user_phone=<?php echo $_SESSION['user_phone']; ?>" class="appointment-btn scrollto"><span class="d-none d-md-inline">Book </span> Appointment</a></li>

        </ul>
      </nav><!-- .navbar -->
    </div>
  </header>

<br>



   <p class="d">Select a Department</p> 


  <section class="list">
   
      <?php
            while ($row = mysqli_fetch_assoc($res)){
                $name = $row['dep_name'];
                $desc=$row['dep_des'];
                $rev=$row['dep_rev'];

                echo " <div class='department'>";
                if ($name == 'Cardiology') {
                  echo "<div class='cardimage p3'> ";
              } 
              else if ($name == 'Neurology') {
                echo "<div class='cardimage p2'> ";
            } 
            else if ($name == 'Hematology') {
              echo "<div class='cardimage p1'> ";
          } 
          else{
            echo "<div class='cardimage p1'> ";
          }
                
               echo "<p class='o'>".$name."</p></div>

                <div class='contant'>
     
                <P >".$desc." </P>
            </div>

            <div class='info'>
            <p>"."Number of doctors:40"."</p><hr>
            <p>"."Department review:".$rev."</p>
           
    
          </div>
          
          
          <div class='contant'>

          <form action=doctor.php  method=post>
  <input type=hidden name=department value='$name'>
  <input type=hidden name=user_phone value=' $user_phone '>
  <button type=submit class=nav-l >See doctors</button>
</form>
        
        </div> </div>";

               }

               ?>
    
       
         
       
          
        
      


     
    

     

     





      

   






  
  </section>

    
</body>
</html>