<?php 
//error_reporting(0);
include_once 'connection.php';
?><?php error_reporting(0);include_once 'connection.php';?>
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
    <title>Student Status</title>
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
          <a class="navbar-brand" href="#">Vanier College</a>
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
                <a class="nav-link" href="home.php">Home</a>
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
          <label id="percent" name="percent"></label>&nbsp; 
        </p>
      </div>
      <div class="container mt-3">
        <h2></h2>
        <p>

<?php
//////////////////////////////////////////////////////////////////////////////////////////upload profile image
if (isset($_POST['upload'])){
    $file = $_FILES['file'];
   // print_r($file);
    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];

    $fileExtension = explode('.',$fileName);
    $fileActualExtension = strtolower(end($fileExtension));
    $allowed = array('jpg');
    if(in_array($fileActualExtension,$allowed)){
        if($fileError==0){//no errors uploading
            if($fileSize <= 30000000){//size in bytes=> limit 30mb = 30000000 3539336bytes
              //  array_map('unlink', glob("upload/images/*Img*.jpg"));
                $fileNameNew = "profileImg".$uid.".".$fileActualExtension ;
                $fileDestination = 'uploads/images/'.$fileNameNew;
                move_uploaded_file($fileTmpName,$fileDestination );
                header("Location: profile.php?uploadsuccess");
                //inserting profile img to the student
                $sql = "UPDATE  filesuser SET status =1, type='image' WHERE userID = '$uid' ";//status 0 => the user has a profile picture
                mysqli_query($connection,$sql);
            }
       else {echo "Your file is too big!"; }
        } else {echo "there was an error uploading your file!";}
    }
    else{ echo "You cannot upload files of this type!";}
}
///////////////////////////////////////////////////////////////////////////////////////////////////////update data 
else if (isset ($_POST["updateData"])){
    $firstName = strip_tags(mysqli_real_escape_string($connection,$_POST["firstName"]));
	$lastName = strip_tags(mysqli_real_escape_string($connection,$_POST["lastName"]));
	$dob = strip_tags(mysqli_real_escape_string($connection,$_POST["dob"]));
	$email= strip_tags(mysqli_real_escape_string($connection,$_POST["email"]));
	$password = strip_tags(mysqli_real_escape_string($connection,$_POST["password"]));
	$phone = strip_tags(mysqli_real_escape_string($connection,$_POST["phone"]));
	$rscore = strip_tags(mysqli_real_escape_string($connection,$_POST["rscore"]));
	$cohortList = strip_tags(mysqli_real_escape_string($connection,$_POST["cohortList"]));
	$sql = "SELECT * FROM `cohort` WHERE `programTitle` = '$cohortList'";
	$query = mysqli_query($connection,$sql);	
	$row= mysqli_fetch_assoc($query);
	$cohortID= $row['cohortID'];
	
	$sql = "SELECT studentID FROM student WHERE studentID = '$uid';";
	$query = mysqli_query($connection,$sql);  
	
	$sql = "UPDATE `student`
				SET `firstName` = '$firstName', 
					`lastName` = '$lastName',
					`dateOfBirth`= '$dob',
					`email` = '$email', 
					`password` = '$password', 
					`RScore` = $rscore,
					`phoneNumber` = '$phone', 
				    `lastUpdate` = current_timestamp(),
					`cohortID` = '$cohortID'
				WHERE studentID ='$uid';";
		
	$result = mysqli_query($connection,$sql);
	if($result){
		echo "Your changes have been updated !";
        
	}	
	else {
		echo "Changes have been not saved!";
	}	
}
//upload files
else if (isset($_POST['uploadDoc'])){
    $filType = strip_tags(mysqli_real_escape_string($connection,$_POST["filType"]));
    $descrip = strip_tags(mysqli_real_escape_string($connection,$_POST["descrip"]));

    $file = $_FILES['file'];
    print_r($file);
    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];

    $fileExtension = explode('.',$fileName);
    $fileActualExtension = strtolower(end($fileExtension));
    $allowed = array('jpg','pdf');
    if(in_array($fileActualExtension,$allowed)){
        if($fileError==0){//no errors uploading
            if($fileSize<= 50000000){//kb
                $fileNameNew = $uid.$filType.".".$fileActualExtension;
                $fileDestination = 'uploads/documents/'.$fileNameNew;
                move_uploaded_file($fileTmpName,$fileDestination );
                
                //inserting documents to the student
                $sql = "INSERT INTO filesuser (fileId, userID, type, status, description,extension) VALUES (NULL,'$uid','$filType',0,'$descrip','$fileActualExtension')";
                mysqli_query($connection,$sql);
                if (mysqli_affected_rows($connection)==1);
                header("Location: profile.php");
         }
            else {echo "Your file is too big!"; }
        } else {echo "there was an error uploading your file!";}
    }
    else{ echo "You cannot upload files of this type!";}
}
/////////////////////////////////////////////////////////////////////////////////////////////////////Sign up
else if($_POST['submitSignUp']){
  $firstName = strip_tags(mysqli_real_escape_string($connection,$_POST["firstName"]));
  $password = strip_tags(mysqli_real_escape_string($connection,$_POST["lastName"]));
	$lastName = strip_tags(mysqli_real_escape_string($connection,$_POST["lastName"]));
	$dob = strip_tags(mysqli_real_escape_string($connection,$_POST["dob"]));
	$email= strip_tags(mysqli_real_escape_string($connection,$_POST["email"]));
	$password = strip_tags(mysqli_real_escape_string($connection,$_POST["password"]));
	$phone = strip_tags(mysqli_real_escape_string($connection,$_POST["phone"]));
	$stdID = strip_tags(mysqli_real_escape_string($connection,$_POST["stdID"]));
	$rscore = strip_tags(mysqli_real_escape_string($connection,$_POST["rscore"]));
	$cohortList = strip_tags(mysqli_real_escape_string($connection,$_POST["cohortList"]));

	$sql = "SELECT * FROM cohort WHERE programTitle = '$cohortList'";
	$query = mysqli_query($connection,$sql);	
	$row= mysqli_fetch_assoc($query);
	$cohortID= $row['cohortID'];
	$deptId = strip_tags(mysqli_real_escape_string($connection,$_POST["deptId"]));
	$sql = "SELECT studentID FROM student WHERE studentID = '$stdID';";
	$query = mysqli_query($connection,$sql);
  echo $stdID;  
	if (mysqli_num_rows($query)==1) {echo "<h1>"."You are already registered, please login with your credentials"."</h1>";}
	else { echo "Line206";
	$sqli = "INSERT INTO student(`studentID`, `firstName`, `lastName`, `dateOfBirth`, `email`,  `password`,  `RScore`,  `phoneNumber`, `phoneExtension`, `createDate`, `lastUpdate`, `cohortID`,`department`) VALUES('$stdID', '$firstName', '$lastName','$dob', '$email','$password', '$rscore', '$phone', NULL, current_timestamp(), current_timestamp(), $cohortID,'$deptId')";
	//$sqli = "INSERT INTO student (studentID, firstName, lastName, dateOfBirth, email,password,RScore,phoneNumber,phoneExtension,createDate,lastUpdate,cohortID,department) VALUES(`$stdID`, `$firstName`, `$lastName`,`$dob`, `$email`,`$password`, `$rscore`, `$phone`, NULL, current_timestamp(), current_timestamp(), $cohortID,`$deptId`)";
	
  $result = mysqli_query($connection,$sqli) or die (mysqli_errno($connection));
  // echo "Line211";
	$num = mysqli_affected_rows($connection);
  // echo "Line213";
  // echo $num;
	if($num==1){
		$sql1 = "SELECT * FROM student WHERE studentID ='$stdID'";
		$result1 = mysqli_query($connection,$sql1);
    //echo mysqli_num_rows($result1);
		if(mysqli_num_rows($result1)>0){
			$row1 = mysqli_fetch_assoc($result1);
			$userID = $row1['studentID'];
			$sql2 = "INSERT INTO filesuser(userID,status,type,extension) VALUES ('$userID',0,'image','jpg')";//status 0 => the user doesn't have a profile picture yet
			mysqli_query($connection,$sql2);
			
		}
		$num = mysqli_affected_rows($connection);
    //echo $num;
		if($num>=1){
			echo "You have been successfully registered !";
			header ('Location: index.html');
		}	
	}	
	else {
		echo "Please try again to register !";
		header ('Location: signUp.php');
	}	
	}
}
// ////////Apply
else if (isset($_POST['Apply'])){
session_start();
$idoffer = $_SESSION['idoffer'];
//prevent reapplaying for the same internship offer
$check = "SELECT * FROM student_internship WHERE (studentID=$uid AND internshipID=$idoffer)";
$querycheck = mysqli_query($connection,$check); 
if (mysqli_affected_rows($connection)!=0){
	echo "<h2>"."You have already applied for this internship"."</h2>";
}

else {
$sql = "INSERT INTO student_internship(`studentID`, internshipID) VALUES ($uid,$idoffer)";
$query = mysqli_query($connection,$sql);
if (mysqli_affected_rows($connection)==1){header('Location:myApplications.php');}
}
}
mysqli_close($connection);
?>
</body>
</html>