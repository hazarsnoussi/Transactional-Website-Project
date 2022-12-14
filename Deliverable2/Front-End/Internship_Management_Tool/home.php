<?php error_reporting(0);
include_once 'connection.php';?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="Style/styleStudent.css" />
    <title>Student Home Page</title>
  </head>

  <body>
    <main>
      <div class="upNav">
        <div class="login-container">
          <form action="">
            <button type="button" onclick="location.href='logOut.php';">Logout</button>
            <span
              >Welcome
              <label id="student_username" name="student_username"><?php echo "<b>".$fullName."</b>";?>
</label
              ></span
            >
          </form>
        </div>
      </div>

      <nav
        class="navbar navbar-expand-sm navbar-dark"
        style="background-color: #db1123; height: 90px">
        <div class="container-fluid">
          <a class="navbar-brand" href="#"><span
              style="padding-left: 40px; padding-right: 50px; font-size: 30px"
              >Vanier College</span
            ></a>
          <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
              <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>
              <li class="nav-item">
                <a class="nav-link" href="#">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="profile.php">Profile</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="internships.php">Internship</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="myApplications.php">My Applications</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="updateProfile.php">Settings</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <div class="underNav">
        <p style="padding: 18px">
          <label id="percent" name="percent">60%</label>&nbsp; Complete your
          profile to have a higher chance of securing an internship!
        </p>
      </div>
      <div class="container mt-3">
        <h2>Recent Posts</h2>
        <p>
  <?php 
  $sqli = "SELECT department FROM student WHERE studentID = '$uid'";
  $rowi = mysqli_fetch_assoc(mysqli_query($connection,$sqli));?>
  Here are the most recent internship offers added to the  department of <?php echo $rowi['department'];?>
  </p>  
  <?php $sql ="SELECT programTitle from cohort INNER join student WHERE cohort.cohortID=student.cohortID AND student.studentID = $uid";
  $row = mysqli_fetch_assoc(mysqli_query($connection,$sql));
  $field = $row['programTitle'];echo "<b>".$field."</b>";
  $sqll = "SELECT * FROM internshipoffer WHERE field = '$field' AND isActive = 1 ORDER BY lastUpdate DESC LIMIT 3 ";
  $res = mysqli_query($connection,$sqll);
 ?>   
        <table class="table table-striped">
          <tbody>
          <?php while ($roww = mysqli_fetch_assoc($res)){?>
            <?php  $internshipID = $row['internshipID'];?>
            <tr>
              <td><?php echo $roww['internshipTitle'];?></></td>
              <td></td>
              <td></td>
            </tr>
            <tr>
              <td></td>
              <td>
                Short Description: 
              </td>
              <td><?php echo $roww['shortDescription'];?> </td>
            </tr>
           
            <tr>
              <td></td>
              <td></td>
              <td>
                <form method="GET" action= "viewDetail.php">
                <button class ="btn btn-danger"><a  style ="color:white;"href ="viewDetail.php?detailId='$internshipID'">View Details</button>
                </form>
                
              </td>
            </tr>
            <?php } ?> 
          </tbody>
        </table>
      </div>

    <br><br><br><br><br>
    <footer class="foot">
      <p style="padding: 10px">
        @ IMS. Montreal, QC, CA <br />
        Privacy | Terms
      </p>
    </footer>
    </main>

    
  </body>
</html>
