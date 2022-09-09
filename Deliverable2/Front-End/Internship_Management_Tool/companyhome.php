
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
        <!-- <p style="padding: 18px">
          <label id="percent" name="percent">60%</label>&nbsp; Complete your
          profile!
        </p> -->
      </div>

      <div class="container mt-3">

      <!-- Add additional code here -->


        <h2>Company Information</h2>

        <h4>About</h4>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere corporis nesciunt voluptas id, soluta totam tempora dolores dignissimos, quos excepturi exercitationem veniam reiciendis numquam magni repellat sint, asperiores cum. Nesciunt?</p>
        <br>
        <h4>Contacts</h4>
        <p>
          Email: <br>
          Phone Number: <br>
          Fax Number: <br>
          Address: <br>
        </p>

        <br>
        <h2>Internships</h2>
        <p>
      
        <table class="table table-striped" style="text-align: center;">
            <thead>
            <tr>
                <td>Post Name</td>
                <td>Post Information</td>
                <td>Post Date</td>
                <td>Number of Applicants</td>
                <td>Edit</td>
                <td>Delete</td>
            </tr>
            </thead>
            <tbody>
              <tr>
                <td>Internship1</td>
                <td>Info</td>
                <td>12-04-2002</td>
                <td>7</td>
                <td><img src="img/icons8-edit-64.png" width="width" height="height" alt="alt"/></td>
                <td><img src="img/icons8-delete-100.png" width="width" height="height" alt="alt"/></td>
            </tr>
              <tr>
                <td>Internship2</td>
                <td>Info</td>
                <td>09-09-2022</td>
                <td>10</td>
                <td><img src="img/icons8-edit-64.png" width="width" height="height" alt="alt"/></td>
                <td><img src="img/icons8-delete-100.png" width="width" height="height" alt="alt"/></td>
            </tr>
              <tr>
                <td>Internship3</td>
                <td>Info</td>
                <td>07-09-2022</td>
                <td>5</td>
                <td><img src="img/icons8-edit-64.png" width="width" height="height" alt="alt"/></td>
                <td><img src="img/icons8-delete-100.png" width="width" height="height" alt="alt"/></td>
            </tr>
              <tr>
                <td>Internship4</td>
                <td>Info</td>
                <td>06-10-2022</td>
                <td>7</td>
                <td><img src="img/icons8-edit-64.png" width="width" height="height" alt="alt"/></td>
                <td><img src="img/icons8-delete-100.png" width="width" height="height" alt="alt"/></td>
            </tr>
            </tbody>
        </table>

        <br>
        <form action="addinternship.php" method="POST">
              <button type="submit" class="btn btn-primary" style="background-color: #9c000d; width: 200px">Add Internship</button>
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
