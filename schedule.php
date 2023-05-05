<?php

$contact=$_POST['user_phone'];
$dept_name=$_POST['department'];
$doc_phone=$_POST['doc_phone'];


$link = mysqli_connect("localhost", "root", "", "hospital");

if (!$link) {
    die("Could not connect: " . mysqli_connect_error());
}




$res = mysqli_query($link, "SELECT * FROM doctor_details WHERE doc_phone = '$doc_phone'");


$row = mysqli_fetch_assoc($res);

    $doc_name = $row['doc_name'];
    
    $link = mysqli_connect("localhost", "root", "", "hospital");

    if (!$link) {
        die("Could not connect: " . mysqli_connect_error());
    }

$res = mysqli_query($link, "SELECT * FROM patient_details WHERE pat_phone = trim('$contact')");


 
    $row = mysqli_fetch_assoc($res);
    $pat_name = $row['pat_name'];
  




session_start();
$_SESSION['user_phone'] = $contact;

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

<form action="index.php?user_phone=<?php echo trim($_SESSION['user_phone']); ?>" method="post">

    <header id="header" class="fixed-top">
        <div class="container">
    
          
            <h1 class="logo me-auto"><a href="index.html">iCare</a></h1>
           <!-- navbar-->
          <nav id="navbar" class="navbar navbar-light">
            <ul>
            <li><a class="nav-link scrollto active" href="index.php?user_phone=<?php echo trim($_SESSION['user_phone']); ?>">Dashboard</a></li>
             
             
            <li><a class="nav-link scrollto" href="department.php?user_phone=<?php echo $_SESSION['user_phone']; ?>">Departments</a></li>
             
              <li><a class="nav-link scrollto" href="reportlist.html">Report</a></li>
            
            
             
              <li><a class="nav-link scrollto" href="#login.html">Sign Out</a></li>
            
            </ul>
          </nav><!-- .navbar -->
        </div>
      </header>
    
    <br> <br> <br><br> <br>
    







        <!--Tabel section starts-->
        <h1 class="t">Schedule</h1>
        <table class="contents">
            <thead>
                <tr>
                    <th></th>
                    <th>Day</th>
                    <th>Date</th>
                    
                   
                  
                    <th>Visiting Hours</th>
                </tr>
            </thead>
            <tbody>

            <?php


$link = mysqli_connect("localhost", "root", "", "hospital");

if (!$link) {
    die("Could not connect: " . mysqli_connect_error());
}

$res = mysqli_query($link, "SELECT * FROM doctor_schedule");
while ($row = mysqli_fetch_assoc($res)) {
  
    $date= $row['date'];
    $time=$row['time'];
    $day=$row['day'];
   
    $schedule_id = $row['date'] . ',' . $row['time'].',' . $row['day'].','.$contact.','.$doc_phone.','.$dept_name.','.$doc_name.','.$pat_name;
   
    $res1 = mysqli_query($link, "SELECT * FROM appointment_details WHERE app_date='$date' AND app_time='$time' AND app_day='$day' AND app_doc_phone='$doc_phone'");
$count = mysqli_num_rows($res1);

    if($count==1){

    }
    else{
    echo "<tr>
        <td>
            <label class='ch'>
                <input type='checkbox' name='schedule[]' value='".$schedule_id."'>
                <span class='checkmark'></span>
                <input type=hidden name=phone value=' $contact '>
            </label>
        </td>
        <td>".$row['day']."</td>
        <td>".$row['date']."</td>
        <td>".$row['time']."</td>
    </tr>";
    }
}
?>

    <button type="submit" name="submit" class="app">Confirm appointment</button>
</form>





</body>
</html>