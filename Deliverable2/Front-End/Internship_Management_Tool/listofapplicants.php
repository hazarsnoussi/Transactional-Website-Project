<?php error_reporting(0);include_once 'connection.php';?>
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
    <title>Student Applications</title>
  </head>

  <body>
    <main>
      <div class="upNav">
        <div class="login-container">
          <form action="">
            <button type="button"onclick="location.href='logOut.php';" />Logout</button>
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
                <a class="nav-link" href="companyhome.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="listofapplicants.php">List Of Applicants</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="companysettings.php">Settings</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <div class="underNav">
        
      </div>
      <div class="container mt-3">


      <!-- Add additional code here -->


<?php
$sqli = "SELECT department FROM student WHERE studentID = '$uid'";
$rowi = mysqli_fetch_assoc(mysqli_query($connection,$sqli));
$field = $rowi['department'];
?>
  <h3>List of Applicants</h3>

  <br>
  <p>Select internship to see the students who applied</p>

<form action="#">
  <label for="internship">Choose a post:</label>
  <select name="internship" id="internship">
    <option value="Front-End Developer">Front-End Developer</option>
    <option value="Software Developer">Software Developer</option>
    <option value="Devops">Devops</option>
    <option value="audi">Audi</option>
  </select>
  <br><br>
  <input type="submit" value="Display Applicants">
</form>

<br><br>


  </p>  
  <?php $sql = "SELECT * FROM student_internship INNER JOIN internshipoffer ON student_internship.internshipID = internshipoffer.internshipID 
INNER JOIN student ON student.studentID = student_internship.studentID AND student_internship.studentID='$uid' ";
$queri = mysqli_query($connection,$sql);
?>
   
        <table class="table table-striped">
        <tr>
        <th>Internship Title</th>
        <th>Application Date</th>
        <th>status</th>
        <th>Deadline</th>
        </tr>

      
       <?php   while ($roww = mysqli_fetch_assoc($queri)){ ?>
        <tbody>
         
            <tr>
              <td><?php echo $roww['internshipTitle'];?></td>
              <td><?php echo $roww['date'];?></td>
              <td><?php echo $roww['status'];?></td>
              <td><?php echo $roww['endDate'];?></td>
            </tr>
        </tbody>
            <?php } ?>  
        </table>


        <!-- End of additional code here -->

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
