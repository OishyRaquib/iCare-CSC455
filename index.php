<?php
session_start();
if (isset($_GET['user_phone'])) {

  $phone = $_GET['user_phone'];
}

else
 { $phone = $_GET['phone'];}
  $link=mysqli_connect("localhost","root","","hospital");
  if($link===false){
      
      die("Could not connect".mysqli_connect_error());
      }
  
  
      $res=mysqli_query($link,"SELECT* FROM patient_details where pat_phone='$phone'");
      $row = mysqli_fetch_assoc($res);
      $name = $row['pat_name'];
      $age = $row['pat_age'];
      session_start();
      $_SESSION['user_phone'] = $phone;
?>
<?php
if (isset($_POST['submit'])) {
  $phone = $_POST['phone'];
        $selected_schedules = $_POST['schedule'];
        foreach ($selected_schedules as $schedule_id) {
          
            list($date, $time, $day,$contact,$doc_phone,$dept_name,$doc_name,$pat_name) = explode(',', $schedule_id);
           
            echo "Schedule on $date at $time with $pat_name has been selected <br>";
         
            $sql="INSERT INTO appointment_details (app_day, app_time,  app_doc_phone, app_doc_dept,app_pat_phone,app_doc_name,app_pat_name,app_date) VALUES ('$day','$time','$doc_phone','$dept_name','$contact','$doc_name','$pat_name','$date')";
            
           if (mysqli_query($link,$sql)){
             
           }
           else{
               echo"fail to execute" .mysqli_error($link);
           }

        }
   
}
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <link rel="stylesheet" href="assets/css/index.css" />
    

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard</title>
  </head>
  <body>
    <header id="header" class="fixed-top">
    
  
        
        <h1 class="logo me-auto"><a href="index.html">iCare</a></h1>
         <!-- navbar-->
        <nav id="navbar" class="navbar navbar-light">
          <ul>
            <li><a class="nav-link scrollto" href="index.php?user_phone=<?php echo $_SESSION['user_phone']; ?>">Dashboard</a></li>
            <li><a class="nav-link scrollto" href="department.php?user_phone=<?php echo $_SESSION['user_phone']; ?>">Departments</a></li>
            <li><a class="nav-link scrollto" href="reportlist.php?user_phone=<?php echo $_SESSION['user_phone']; ?>">Report</a></li>
         
            <li><a class="nav-link scrollto active" href="login.html">Sign Out</a></li>
            <li><a href="department.php?user_phone=<?php echo $_SESSION['user_phone']; ?>" class="appointment-btn scrollto"><span class="d-none d-md-inline">Book </span> Appointment</a></li>

            
          </ul>
        </nav><!-- .navbar -->
      
    </header>



    <div class="dash">
      <div class="imp">
       
          <div class="about">
            <h1>
              Hello,
              <?php
            
              echo"<h1 class=name>".$name."</h1>";

             
              ?>
            </h1>
            <br /><br />
            <p>
              Have a nice day and don't forget to take care <br />of your health
            </p>
          </div>
       
        <br /><br /><br /><br /><br /><br /><br /><br />

        <section class="container">
          <div class="card">
           
            <p class="lm q"><img src="assets/images/heart_rate.png" alt="" class="v">102 bpm</p>
            <div class="fac">
            <h2>Heart rate</h2>
            <p>Pulse is the most important physycological indicator</p>
          </div>
          </div>

          <div class="card">
           
            <p class="lm temp"><img src="assets/images/temperature.png" alt=""  class="v">36 C</p>
            <div class="fac">
              <h2>Temperature</h2>
              <p>Pulse is the most important physycological indicator</p>
            </div>
          </div>

          <div class="card">
            <p class="lm q"><img src="assets/images/blood_pressure.png" alt=""  class="v">36 C</p>
            <div class="fac">
              <h2>Blood pressure</h2>
              <p>Pulse is the most important physycological indicator</p>
            </div>
           
          </div>

          <div class="card">
            <p class="lm temp"><img src="assets/images/glucose.jpg" alt=""  class="v">90 mg/dl</p>
            <div class="fac">
              <h2>Glucose</h2>
              <p>Pulse is the most important physycological indicator</p>
            </div>
          
           
          </div>
        </section>


      <!--Tabel section starts-->
    <h1 class="table-title">Schedules Appointment</h1>
    <table class="contents">
        <thead>
            <tr>
                <th>Serial No.</th>
                <th>Doctor Name</th>
                <th>Phone No.</th>
                <th>Department</th>
                
                <th>Visiting Hours</th>
            </tr>
        </thead>
        <?php
        $res = mysqli_query($link, "SELECT * FROM appointment_details");




       echo "<tbody>";

       $count=0;
       while ($row = mysqli_fetch_assoc($res)) {
         $count=$count+1;
         echo  "<tr>
               <td>".$count."</td>
               <td>".$row['app_doc_name'] ."</td>
               <td>".$row['app_doc_phone'] ."</td>
               <td>".$row['app_doc_dept'] ."</td>
            
               <td>".$row['app_time'] ."</td>
           </tr>";
       }
           
         
        echo "</tbody>";
        ?>
    </table>
      
      
      </div>

      <div class="second">
        <img
          src="assets/images/drawing-g91eb3646e_1280.png"
          alt="avatar"
          class="iq"
        />
        <br />
        <?php


        echo"<h2 class='c'>".$name."</h2><p class='c1'>".$age ."</p>"
        ?>
        <br />

        <section class="con">
          <div class="car">
            <h1></h1>
            <p class="lm q"><img src="assets/images/weight.png" alt="" class="v"></p>
            <div class="us">
            <p>Weight</p>
            <h1>53 kg</h1>
           </div>
          </div>

          <div class="car">
            <p class="lm q"><img src="assets/images/height.png" alt="" class="v"></p>
            <div class="us">
              <p>Height</p>
              <h1>165 cm</h1>
             </div>
          </div>

          <div class="car">
            <p class="lm q"><img src="assets/images/blood_type.png" alt="" class="v"></p>
            <div class="us">
              <p>Blood Group</p>
              <h1>B+</h1>
             </div>
          </div>
        </section>
        <h2 class="med">Current medication</h2>
        <div class="line">

          
  
          <div class="t l">
              <span></span>
              <div class="b">
                 <P>Peniccilin 2 mg, per week 5 days</P>
              </div>
          </div>
  
          <div class="t l">
          <span></span>
          <div class="b">
            <P>Peniccilin 2 mg, per week 5 days</P>
             
          </div>
          </div>



          <div class="t l">
            <span></span>
            <div class="b">
              <P>Peniccilin 2 mg, per week 5 days</P>
               
            </div>
            </div>
      
  
  
      </div>
      </div>
      
    </div>
  </body>
</html>
