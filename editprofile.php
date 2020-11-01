<?php

if (!isset($_SESSION)) {
  session_start();
}

include_once("connections/connection.php");
$con = connection();
$id = $_SESSION['ID'];
$fname = $_SESSION['FULLNAME'];

$sql = "SELECT * FROM users WHERE id = '$id'";
$user = $con->query($sql) or die ($con->error);
$row = $user->fetch_assoc();

if (isset($_POST['submit'])) {
  $funame = $_POST['fullname'];
  $eaddress = $_POST['emailaddress'];
  $bdate = $_POST['birthdate'];
  $gender = $_POST['gender'];
  $pnumber = $_POST['phonenumber'];

  $sql = "UPDATE users SET full_name = '$funame', email_address = '$eaddress', birth_date = '$bdate', gender = '$gender', phone_number = '$pnumber' WHERE id = '$id'";
  $con->query($sql) or die ($con->error);

  echo header("Location: editprofile.php?id=".$id);
}

if (isset($_POST['cancel'])) {
  echo header("Location: myprofile.php");
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/icon" href="img/favicon.ico" />
    <title>Contact Us</title>
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="js/bridge.js"></script>
  </head>
  <body>
    <div class="header">
      <div class="container">
        <div class="logo-container">
          <h1>
            <a href="index.php"
              ><img src="img/logo.png" alt="" /><span>IVAN</span>SHOP</a
            >
          </h1>
        </div>
        <ul class="navigation">
          <a href="aboutus.html"><li>About Us</li></a>
          <a href="contactus.html"><li>Contact Us</li></a>
        </ul>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div
          class="column left"
          style="background-color: #2565ae; padding-top: 0px; margin: 10px 0"
        >
          <div class="wrapper-sidebar-left">
            <div class="sidebar">
              <ul>
                <li>
                  <a href="#"><i class="fas fa-home"></i>All</a>
                </li>
                <li>
                  <a href="#"><i class="fas fa-home"></i>Mobiles</a>
                </li>
                <li>
                  <a href="#"><i class="fas fa-user"></i>Accessories</a>
                </li>
                <li>
                  <a href="#"
                    ><i class="fas fa-address-card"></i>Portable Audio</a
                  >
                </li>
                <li>
                  <a href="#"><i class="fas fa-project-diagram"></i>Chargers</a>
                </li>
                <li>
                  <a href="#"><i class="fas fa-blog"></i>Tablets</a>
                </li>
                <li>
                  <a href="#"><i class="fas fa-address-book"></i>Wearables</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div
          class="column middle"
          style="background-color: #fff; padding-top: 10px"
        >
          <!--Start Edit Profile Form-->
          <form class="middle-form" method="post">
            <label
              style="
                font-weight: bold;
                width: 49%;
                margin-right: 1%;
                float: left;
                text-align: left;
              "
              >Fullname:</label
            ><label
              style="
                font-weight: bold;
                width: 49%;
                margin-left: 1%;
                float: left;
                text-align: left;
              "
              >Email Address:</label
            ><br /><br />
            <input 
              type="text" 
              class="input-form" 
              name="fullname"
              style="width: 49%; margin-right: 1%; float: left; text-align: left;" 
              value="<?php echo $row['full_name'];?>" required>
            <input
              type="text"
              class="input-form"
              name="emailaddress"
              style="width: 49%; margin-left: 1%; float: left; text-align: left"
              value="<?php echo $row['email_address'];?>" required>
            <br/><br/>
            <label
              style="
                font-weight: bold;
                width: 49%;
                margin-right: 1%;
                float: left;
                text-align: left;
              "
              >Birthdate:</label
            ><label
              style="
                font-weight: bold;
                width: 49%;
                margin-left: 1%;
                float: left;
                text-align: left;
              "
              >Gender:</label
            ><br /><br />
            <input
              type="date"
              id="birthdate"
              name="birthdate"
              style="width: 49%; margin-right: 1%; float: left; text-align: left;"
              value="<?php echo $row['birth_date'];?>" required>
            <select
              class="dropdown-form"
              name="gender"
              style="width: 49%; margin-left: 1%; float: left; text-align: left">
              <?php switch ($row['gender']):
                case "Male": ?>
                    <option value="Male" selected>Male</option>
                    <option value="Female">Female</option>
                    <option value="Other">Other</option>
                    <?php break; ?>
                <?php case "Female": ?>
                    <option value="Male">Male</option>
                    <option value="Female" selected>Female</option>
                    <option value="Other">Other</option>
                    <?php break; ?>
                <?php case "Other": ?>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Other" selected>Other</option>
                    <?php break; ?>
                <?php default: ?>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Other">Other</option>
                    <?php break; ?>
              <?php endswitch; ?>
            </select><br /><br />
            <label
              style="
                font-weight: bold;
                width: 49%;
                margin-right: 1%;
                float: left;
                text-align: left;
              "
              >Phone Number:</label
            ><br /><br />
            <input
              type="text"
              class="input-form"
              name="phonenumber"
              style="
                width: 49%;
                margin-right: 1%;
                float: left;
                text-align: left;"
              value="<?php echo $row['phone_number'];?>" required>
            <br /><br /><br />
            <button type="submit" name="submit" value="submit" class="btn-submit" style="width: 49%; margin-right: 1%">
              Save</button
            ><button type="submit" name="cancel" value="cancel" class="btn-submit" style="width: 49%; margin-left: 1%">
              Cancel
            </button>
          </form>
          <!--End Edit Profile Form-->
        </div>
        <div
          class="column right"
          style="background-color: #d5f3fe; padding-top: 10px; margin: 10px 0"
        >
          <!-- Start User Logged In-->
          <label style="font-size: 16px; color: #0f5298; margin: 0 0 0 15px">
            <!--display: none - hides label-->
            Welcome
          </label>

          <?php if(isset($_SESSION['FULLNAME'])){ ?>
            <label
            style="
              display: block;
              width: 250px;
              font-size: 16px;
              color: #0f5298;
              margin: 0 0 0 15px;
              text-transform: uppercase;
              font-weight: bold;
              white-space: nowrap;
              overflow: hidden;
              text-overflow: ellipsis;
            "
          >
            <?php echo $row['full_name']; ?>
          </label>
          <?php } ?>

          <div class="wrapper-sidebar-right">
            <div class="sidebar">
              <!--can be hidden-->
              <ul>
                <li>
                  <a href="myprofile.php"
                    ><i class="fas fa-home"></i>Manage My Account</a
                  >
                </li>
                <ul>
                  <li style="padding-left: 20px; font-size: 14px">
                    <a href="myprofile.php"
                      ><i class="fas fa-home"></i>My Profile</a
                    >
                  </li>
                  <ul>
                    <li
                      style="
                        padding-left: 40px;
                        font-size: 12px;
                        background-color: #66d3fa;
                      "
                    >
                      <a href="editprofile.php" style="color: #242424"
                        ><i class="fas fa-home"></i>Edit Profile</a
                      >
                    </li>
                    <li style="padding-left: 40px; font-size: 12px">
                      <a href="changepassword.html"
                        ><i class="fas fa-home"></i>Change Password</a
                      >
                    </li>
                  </ul>
                  <li style="padding-left: 20px; font-size: 14px">
                    <a href="#"><i class="fas fa-home"></i>Address Book</a>
                  </li>
                </ul>
                <li>
                  <a href="#"><i class="fas fa-home"></i>My Orders</a>
                </li>
                <!-- <ul> Returns &d Cancellation
                  <li style="padding-left: 20px; font-size: 14px;"><a href="#"><i class="fas fa-home"></i>Returns</a></li>
                  <li style="padding-left: 20px; font-size: 14px;"><a href="#"><i class="fas fa-home"></i>Cancellations</a></li>
                </ul> -->
                <li>
                  <a href="logout.php"><i class="fas fa-address-card"></i>Logout</a>
                </li>
              </ul>
            </div>
          </div>
          <!-- End User Logged In-->
        </div>
      </div>
    </div>
  </body>
</html>
