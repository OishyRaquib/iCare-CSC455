<?php
session_start();
require("dbconnection.php");
$query= " select * from patient_details ";
$result =mysqli_query($con,$query);

$query1= " select * from doctor_details ";
$result1 =mysqli_query($con,$query1);

$query2= " select * from appointment_details ";
$result2 =mysqli_query($con,$query2);

?>
<!DOCTYPE html>
<html lang="en">
<head>
<style>#addPatientBtn a {color: white; }</style>
<style>#addDoctorBtn a {color: white; }</style>
<style>#addAppointmentBtn a {color: white; }</style>
<style>#editBtn a {color: white; }</style>
<style>#deleteBtn a {color: white; }</style>
<style>#logout a {color: white; }</style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital Admin Dashboard</title>
    <link rel="stylesheet" href="assets/css/adminstyle.css">
    <!--  JavaScript here -->
</head>
<body>
    <!-- Navigation Bar -->
    <header id="header" class="fixed-top">
        <div class="container">
    
          
          <h1 class="logo me-auto"><a href="index.html">iCare</a></h1>
           <!-- navbar-->
          <nav id="navbar" class="navbar navbar-light">
            <ul>
              <!-- <li><a class="nav-link scrollto" href="">Dashboard</a></li> -->
               <!--<li><a class="nav-link scrollto" href="">Patients</a></li> -->
               <!-- <li><a class="nav-link scrollto" href="">Doctor</a></li>  -->
               <!--<li><a class="nav-link scrollto" href="">Appointments</a></li> -->
               <!-- <li><a class="nav-link scrollto active" href="login.html">Logout</a></li> -->
              
            </ul>
          </nav>
          <!-- .navbar -->
            </div>
        </header>
    
    <!-- Main Dashboard -->
    <section id="dashboard">
        <h1>Dashboard</h1>
        <div class="dashboard-stats">
            <div>Number of Patients: <span id="numPatients">
                <?php $dash_patient_query= "SELECT * FROM patient_details";
                $dash_patient_query_run =mysqli_query($con ,$dash_patient_query);
                if($pat_total=mysqli_num_rows($dash_patient_query_run)){echo $pat_total;}
                ?>
            </span></div>

            <div>Number of Doctors: <span id="numDoctors">
                <?php $dash_doc_query= "SELECT * FROM doctor_details";
                $dash_doc_query_run =mysqli_query($con ,$dash_doc_query);
                if($doc_total=mysqli_num_rows($dash_doc_query_run)){echo $doc_total;}
                ?>
            </span></div>

            <div>Number of Appointments: <span id="numAppointments"> 
                <?php $dash_doc_query= "SELECT * FROM doctor_details";
                $dash_doc_query_run =mysqli_query($con ,$dash_doc_query);
                if($doc_total=mysqli_num_rows($dash_doc_query_run)){echo $doc_total;}
                ?>
            </span></div>
        </div>
        <div class="appointment-rate">
            <!-- Graph or pie chart of appointment rate -->
        </div>
    </section>

    <!-- Patients Section -->
    <section id="patients">
        <h1>Patients</h1>
        <!-- List of Patients -->
        <table id="patientList">
            <!-- Table Header -->
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Gender</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <!-- Table Body -->
            <tbody>
                <!-- Patient Row 1 -->
                <tr>
                    <?php
                    while($row= mysqli_fetch_assoc($result))
                    {
                   ?>
                    <td> <?php echo $row['pat_name']; ?></td>
                    <td> <?php echo $row['pat_age']; ?></td>
                    <td> <?php echo $row['pat_phone']; ?></td>
                    <td> <?php echo $row['pat_email']; ?></td>
                    <td> <?php echo $row['pat_pass']; ?></td>
                    <td> <?php echo $row['pat_gender']; ?></td>
                    <td>   
                    <button id="editBtn"><a href="edit_pat.php?pat_phone=<?php echo $row['pat_phone']; ?>" >Edit</a></button>
                    <button id="deleteBtn"><a href="delete.php?pat_phone=<?php echo $row['pat_phone']; ?>">Delete</a></button>
                    
                    </td>
                </tr>
                    <?php   
                    }
                    ?>
            </tbody>
        </table>

        <!-- Add Patient Button -->
        <button id="addPatientBtn"> <a href="admin_pat.php">Add Patient</a> </button>
    </section>

    <!-- Doctors Section -->
    <section id="doctors">
        <h1>Doctors</h1>
        <!-- List of Doctors -->
        <table id="doctorList">
            <!-- Table Header -->
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Contact</th>
                    <th>Experience</th>
                    <th>Department</th>
                    <th>Password</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <!-- Table Body -->
            <tbody>
                <!-- Doctor Row 1 -->
                <tr>
                    <?php
                    while($row= mysqli_fetch_assoc($result1))
                    {
                   ?>
                    <td> <?php echo $row['doc_name']; ?></td>
                    <td> <?php echo $row['doc_phone']; ?></td>
                    <td> <?php echo $row['doc_exp']; ?></td>
                    <td> <?php echo $row['doc_dept']; ?></td>
                    <td> <?php echo $row['doc_pass']; ?></td>
                    <td> <?php echo $row['doc_desc']; ?></td>
                    <td>
                        <button id="editBtn"><a href="edit_doc.php?doc_phone=<?php echo $row['doc_phone']; ?> ">Edit</a></button>
                        <button id="deleteBtn"><a href="delete.php?doc_phone=<?php echo $row['doc_phone']; ?>">Delete</a></button>
                    </td>
                </tr>
                    <?php   
                    }
                    ?>
            </tbody>
        </table>


        <!-- Add Doctor Button -->
        <button id="addDoctorBtn"><a href="admin_doc.php">Add Doctor</a> </button>
    </section>

    <!-- Appointments Section -->
    <section id="appointments">
        <h1>Appointments</h1>
        <!-- List of Appointments -->
        <table id="appointmentList">
            <!-- Table Header -->
            <thead>
                <tr>
                    <th>Day</th>
                    <th>Time</th>
                    <th>Date</th>
                    <th>Doctor </th>
                    <th>Doctor Contact</th>
                    <th>Department</th>
                    <th>Patient</th> 
                    <th>Patient Contact</th>
                    <th>Problem</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <!-- Table Body -->
            <tbody>
                <!-- Appointment Row 1 -->
                <tr>
                <?php
                    while($row= mysqli_fetch_assoc($result2))
                    {
                   ?>
                    <td> <?php echo $row['app_day']; ?></td>
                    <td> <?php echo $row['app_time']; ?></td>
                    <td> <?php echo $row['app_date']; ?></td>
                    <td> <?php echo $row['app_doc_name']; ?></td>
                    <td> <?php echo $row['app_doc_phone']; ?></td>
                    <td> <?php echo $row['app_doc_dept']; ?></td>
                    <td> <?php echo $row['app_pat_name']; ?></td>
                    <td> <?php echo $row['app_pat_phone']; ?></td>
                    <td> <?php echo $row['app_problem']; ?></td>
                    <td>
                        <button id="editBtn"><a href="edit_app.php?app_pat_phone=<?php echo $row['app_pat_phone']; ?>">Edit</a></button>
                        <button id="deleteBtn"><a href="delete.php?app_pat_phone=<?php echo $row['app_pat_phone']; ?>">Delete</a></button>
                    </td>
                </tr>
                    <?php   
                    }
                    ?>
             
            </tbody>
        </table>

        <!-- Add Appointment Button -->
        <button id="addAppointmentBtn"><a href="admin_app.php">Add Appointment</a> </button>
    </section>

    <!-- Logout Button -->
    <button id="logout"><a href="register.php">Logout</a> </button>
</body>
</html>