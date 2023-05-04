<?php
session_start();
require("dbconnection.php");
$query= " select * from patient_details ";
$result =mysqli_query($con,$query);
$query1= " select * from doctor_details ";
$result1 =mysqli_query($con,$query1);

?>
<!DOCTYPE html>
<html lang="en">
<head>
<style>#addPatientBtn a {color: white; }</style>
<style>#addDoctorBtn a {color: white; }</style>
<style>#editBtn a {color: white; }</style>
<style>#deleteBtn a {color: white; }</style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital Admin Dashboard</title>
    <link rel="stylesheet" href="assets/css/adminstyle.css">
    <!-- Add JavaScript links here -->
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
            <div>Number of Patients: <span id="numPatients">2</span></div>
            <div>Number of Doctors: <span id="numDoctors">3</span></div>
            <div>Number of Appointments: <span id="numAppointments">4</span></div>
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
                    <button id="editBtn"><a href="edit.php?pat_phone=<?php echo $row['pat_phone']; ?>" >Edit</a></button>
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
                        <button id="editBtn"><a href=" ">Edit</a></button>
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
                    <th>Patient Name</th>
                    <th>Doctor Name</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <!-- Table Body -->
            <tbody>
                <!-- Appointment Row 1 -->
                <tr>
                    <td>John Doe</td>
                    <td>Dr. Alice Johnson</td>
                    <td>2023-04-01</td>
                    <td>10:00 AM</td>
                    <td>
                        <button>Edit</button>
                        <button>Delete</button>
                    </td>
                </tr>
                <!-- Appointment Row 2 -->
                <tr>
                    <td>Jane Smith</td>
                    <td>Dr. Bob Brown</td>
                    <td>2023-04-01</td>
                    <td>11:00 AM</td>
                    <td>
                        <button>Edit</button>
                        <button>Delete</button>
                    </td>
                </tr>
                <!-- Appointment Row 3 -->
                <tr>
                    <td>John Doe</td>
                    <td>Dr. Carol Williams</td>
                    <td>2023-04-02</td>
                    <td>9:00 AM</td>
                    <td>
                        <button>Edit</button>
                        <button>Delete</button>
                    </td>
                </tr>
                <!-- Appointment Row 4 -->
                <tr>
                    <td>Jane Smith</td>
                    <td>Dr. Alice Johnson</td>
                    <td>2023-04-02</td>
                    <td>2:00 PM</td>
                    <td>
                        <button>Edit</button>
                        <button>Delete</button>
                    </td>
                </tr>
            </tbody>
        </table>

        <!-- Add Appointment Button -->
        <button id="addAppointmentBtn">Add Appointment</button>
    </section>

    <!-- Logout Button -->
    <button id="logout">Logout</button>
</body>
</html>