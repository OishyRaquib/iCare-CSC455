<?php
  require("dbconnection.php");
  if(isset($_POST['submit']))
{
    $day = $_POST['day'];
    $time = $_POST['time'];
    $date = $_POST['date'];
    $doctor = $_POST['doctor'];
    $doctor_contact = $_POST['doctor_contact'];
    $department = $_POST['department'];
    $patient = $_POST['patient'];
    $patient_contact = $_POST['patientcontact'];
    $problem = $_POST['problem'];

     $query = "INSERT INTO appointment_details (app_day, app_time, app_date, app_doc_name, app_doc_phone, app_doc_dept, app_pat_name,app_pat_phone,app_problem)
     VALUES ('{$day}', '{$time}', '{$date}', '{$doctor}','{$doctor_contact}','{$department}','{$patient}','{$patient_contact}','{$problem}')";

    mysqli_query($con, $query) or die("Error inserting");
    
    header("location: http://localhost/iCare-CSC455/admin_panel.php");
}

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" 
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Create Doctor</title>
  </head>
  <body>
  <div class="container my-5">
    <form method="post">
        
<div class="mb-3">
    <label for="name">Day</label>
	<input type="text" name="day" autocomplete="off" placeholder=" Appointment Day.."class="form-control">
</div>
<div class="mb-3">
    <label for="name">Time</label>
	<input type="text" name="time" autocomplete="off" placeholder="Appointment Time.."class="form-control">
</div>
<div class="mb-3">
    <label for="name">Date</label>
	<input type="text" name="date" autocomplete="off" placeholder="Appointment Date.."class="form-control">
</div>
<div class="mb-3">
    <label for="name">Doctor Name</label>
	<input type="text" name="doctor" autocomplete="off" placeholder="Appointed Doctor .."class="form-control">
</div>
<div class="mb-3">
    <label for="name">Doctor Contact</label>
	<input type="text" name="doctor_contact" autocomplete="off" placeholder="Doctor's contact.."class="form-control">
</div>
<div class="mb-3">
    <label for="name">Department</label>
	<input type="text" name="department" autocomplete="off" placeholder="Doctor's department.."class="form-control">
</div>
<div class="mb-3">
    <label for="name">Patient Name </label>
	<input type="text" name="patient" autocomplete="off" placeholder="patient name.."class="form-control">
</div>
<div class="mb-3">
    <label for="name">Patient Contact</label>
	<input type="text" name="patientcontact" autocomplete="off" placeholder="Patient's contact.."class="form-control">
</div>
<div class="mb-3">
    <label for="name">Problem</label>
	<input type="text" name="problem" autocomplete="off" placeholder="patient problem.."class="form-control">
</div>
  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
</form>
    </div>
    
  </body>
</html>