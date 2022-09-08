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
      crossorigin="anonymous"/>
    <link rel="stylesheet" href="Style/styleStudent.css" />
    <title>Student Settings</title>
  </head>

  <body>
    <main>
      <div class="upNav">
        <div class="login-container">
          <form action="">
            <button type="button"onclick="location.href='logOut.php';" />Logout</button>
            <span
              >Welcome
              <label id="student_username" name="student_username"><?php echo $fullName?></label
              ></span
            >
          </form>
        </div>
      </div>

      <nav
        class="navbar navbar-expand-sm navbar-dark"style="background-color: #db1123; height: 90px">
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


        <table class="table table-striped">
          <tbody>
            <tr>
              <td><h3>Profile<h3></td>
              <td></td>
              <td></td>
            </tr>
            <tr>
              <td></td>
            
              <?php
$sqlImg = "SELECT * FROM filesuser WHERE userID = '$uid' AND type = 'image' ";
$query = mysqli_query($connection,$sqlImg);
$resultImg = mysqli_query($connection,$sqlImg);
$rowImg = mysqli_fetch_assoc($resultImg);
echo "<div>";
$fileImg = str_replace("'","","uploads/images/profileImg'.$uid'");
$fileImg =str_replace(".","",$fileImg);
$fileImg = $fileImg.'.jpg';
                                 //profileImg2203102jpg
//echo $fileImg;
//if ($rowImg['status']==0){echo "<img src = 'uploads/profileImg'.$uid.'jpg'>";}
if ($rowImg['status']==1){echo "<img src='$fileImg'>";}
else{ echo "<img src ='uploads/images/profiledefault.jpg'>";}
echo "<br>".$fullName;
$sqli  = "SELECT * FROM student WHERE studentID = $uid ";
$queryi = mysqli_query($connection,$sqli);
$row = mysqli_fetch_assoc($queryi);
?>
<?php echo "<form action='status.php' method='POST' enctype='multipart/form-data'><p><input type='file' name='file'></p>
		<p><input type='submit' name='upload'> Upload</button></p></form>"; ?>
		<form name = "f" action= "#" method="POST">
				<table  style="border:1; width:50%;height:90%;">
					<tr>
						<td><label >First Name:</label></td>
						<td><input type="text" size="50" name="firstName" value= <?php echo $row['firstName']; ?> ></td>
					</tr>
					<tr>
						<td><label >Last Name:</label></td>
						<td><input type="text" size="50" name="lastName" value= <?php echo $row['lastName']; ?> ></td>
					</tr>
					<tr>
						<td><label >Date of birth:</label></td>
						<td><input type="text" size="50" name="dob" value= <?php echo $row['dateOfBirth']; ?>></td>
					</tr>
					<tr>
						<td><label>E-mail:</label></td>
						<td><input type="email" size="50" name="email" value= <?php echo $row['email']; ?> ></td>
					</tr>
					<tr>
						<td><label>Password:</label></td>
						<td><input type="text" size="50" name="password" value= <?php echo $row['password']; ?> ></td>
					</tr>
					<tr>
						<td><label>Phone Number:</label></td>
						<td><input type="tel" size="50" name="phone" value= <?php echo $row['phoneNumber']; ?> ></td>
					</tr>
					<tr>
						<td><label>CollegeID:</label></td>
						<td><input type="number" size="50" name="stdID" value= <?php echo $row['studentID'];?> disabled></td>
					</tr>
					<tr>
						<td><label>R-Score:</label></td>
						<td><input type="text" size="50" name="rscore" value= <?php echo $row['RScore']; ?> ></td>
					</tr>
					<tr>
						<td><label>Cohort:</label></td>
						<td> 
							<?php
								$sql1 = "SELECT programTitle FROM cohort INNER JOIN student ON student.cohortID = cohort.cohortID ;";
								$query1 = mysqli_query($connection,$sql1);
									$row1=mysqli_fetch_assoc($query1); ?>	
							<input type="text" size="50"name="programTitle" value= <?php echo $row1['programTitle']; ?> >	
						</td>
					</tr>				
					<tr>
						<td><label>Department:</label></td>
						<td><input type="text" size="50"name="deptId" value= <?php echo $row['department']; ?> disabled></td>
					</tr>
  <script>function selectCohort(){if(!document.f.lov.selectedIndex<0) {alert("Please select a cohort.");return false;}}</script>
	<tr>					
  <td><input type="submit" size="50" name ="updateData" onclick="selectCohort();"></td>
  </tr>
				</table>
			</form>
              
              <td></td>
            </tr>
         
          </tbody>
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
