<?php //error_reporting(0);include_once 'connection.php';?>
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


        <h3>Internship Information</h3>
        <br><br>

        <form action="" method="POST" style="width:6in">
            <div class="mb-3">
                <label for="postName" class="form-label">Internship Title</label>
                <input type="text" class="form-control" name="postName" aria-describedby="postName" id="postName">
            </div>
            <div class="mb-3">
                <label for="bdescription" class="form-label">Brief Description</label>
                <input type="text" class="form-control" name="bdescription" id="bdescription">
            </div>
            <div class="mb-3">
                <label for="ddescription" class="form-label">Detailed Description</label>
                <input type="text" class="form-control" name="ddescription" id="ddescription">
            </div>
            <div class="mb-3">
                <label for="responsibilities" class="form-label">Your Responsibilities</label>
                <input type="text" class="form-control" name="responsibilities" id="responsibilities">
            </div>   
            
            <div class="mb-3">
                <label for="qualifications" class="form-label">Qualifications</label>
                <input type="text" class="form-control" name="qualifications" id="qualifications">
            </div>

            <div class="mb-3">
                <table>
                    <tr>
                        <td>
                            <label for="startDate" class="form-label">Start Date</label>
                            <input type="date" class="form-control" name="startDate"  style="width:2.5in" id="startDate">
                        </td>
                        <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td>
                            <label for="endDate" class="form-label">End Date</label>
                            <input type="date" class="form-control" name="endDate" style="width:2.5in" id="endDate">
                        </td>
                    </tr>
                </table>
            </div>      
              <div class="mb-3">
                <label for="deadline" class="form-label">Application Deadline</label>
                <input type="date" class="form-control" name="deadline" id="deadline" style="width:2.5in">
            </div>  <br><br>
            

            <table>
                    <tr>
                        <td>
                            <button type="reset" class="btn btn-primary" style="background-color: #9c000d; width: 150px">Reset</button>
                        </td>
                        <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td>
                            <button type="submit" class="btn btn-primary" style="background-color: #9c000d; width: 150px">Submit</button>
                        </td>
                    </tr>
                </table>
        </form>

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
