<?php

if (!isset($_SESSION)) {
  session_start();
  unset($_SESSION['CHANGEPASSWORD-ERROR']);
}

include_once("connections/connection.php");
$con = connection();
$id = $_SESSION['ID'];
$fullname = $_SESSION['FULLNAME'];

$initSql = "SELECT * FROM users WHERE id = '$id'";
$initUser = $con->query($initSql) or die ($con->error);
$initRow = $initUser->fetch_assoc();
$initTotal = $initUser->num_rows;

if(isset($_POST['save'])) {

  $cpass = $_POST['currentpassword'];
  $npass = $_POST['newpassword'];
  $cnpass = $_POST['confirmnewpassword'];

  if (strlen($cnpass) < 4) {
    $_SESSION['CHANGEPASSWORD-ERROR'] = "Password must be at least 4 characters";
  } else {
    if ($npass == $cnpass) {
      $searchSql = "SELECT * FROM users WHERE id LIKE '$id' AND password LIKE '$cpass'";
      $searchUser = $con->query($searchSql) or die ($con->error);
      $searchRow = $searchUser->fetch_assoc();
      $searchTotal = $searchUser->num_rows;
      if ($searchTotal > 0) {
        $changeSql = "UPDATE users SET password = '$cnpass' WHERE id = '$id'";
        $changeUser = $con->query($changeSql) or die ($con->error);
        echo header("Location: logout.php");
        unset($_SESSION['CHANGEPASSWORD-ERROR']);
        } else {
          $_SESSION['CHANGEPASSWORD-ERROR'] = "Password does not match";
        }
      } else {
        $_SESSION['CHANGEPASSWORD-ERROR'] = "New password and confirm new password does not match";
      } 
  }
}

if (isset($_POST['cancel'])) {
  echo header("Location: myprofile.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/icon" href="img/favicon.ico"/>
    <title>Profile</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="js/bridge.js"></script>
</head>
<body>
    <div class="header">
        <div class="container">
            <div class="logo-container">
              <h1><a href="index.php"><img src="img/logo.png" alt=""><span>IVAN</span>SHOP</a></h1>
            </div>
            <ul class="navigation">
                <a href="aboutus.html"><li>About Us</li></a>
                <a href="contactus.html"><li>Contact Us</li></a>
            </ul>
        </div>
    </div> 
    <div class="container">
    <div class="row">
      <div class="column left" style="background-color:#2565ae; padding-top: 0px; margin: 10px 0;">
        <div class="wrapper-sidebar-left">
          <div class="sidebar">
              <ul>
                  <li><a href="#"><i class="fas fa-home"></i>All</a></li>
                  <li><a href="#"><i class="fas fa-home"></i>Mobiles</a></li>
                  <li><a href="#"><i class="fas fa-user"></i>Accessories</a></li>
                  <li><a href="#"><i class="fas fa-address-card"></i>Portable Audio</a></li>
                  <li><a href="#"><i class="fas fa-project-diagram"></i>Chargers</a></li>
                  <li><a href="#"><i class="fas fa-blog"></i>Tablets</a></li>
                  <li><a href="#"><i class="fas fa-address-book"></i>Wearables</a></li>
              </ul> 
          </div>
      </div>
      </div>
      <div class="column middle" style="background-color:#fff; padding-top: 10px;">
        
        <!--Start Change Password Form-->
        <form class="middle-form" method="post">
          <?php if(isset($_SESSION['CHANGEPASSWORD-ERROR'])){ ?>
            <label style="color: #ff0000; font-size: 12px; height: 100%; width: 100%; margin-bottom: 10px; display:inline-block;"><?php echo $_SESSION['CHANGEPASSWORD-ERROR']; ?></label>
          <?php } ?>
          <label style="font-weight: bold; width: 49%; margin-right: 1%; float: left; text-align: left;">Current Password:</label><label style="font-weight: bold; width: 49%; margin-left: 1%; float: left; text-align: left;">New Password:</label><br><br>
          <input type="password" class="input-form" name="currentpassword" style="width: 49%; margin-right: 1%; float: left; text-align: left;"><input type="password" class="input-form" name="newpassword" style="width: 49%; margin-left: 1%; float: left; text-align: left;"><br><br>
          <label style="font-weight: bold; width: 49%; margin-right: 1%; float: left; text-align: left;">Confirm New Password:</label><br><br>
          <input  type="password" class="input-form" name="confirmnewpassword" style="width: 49%; margin-right: 1%; float: left; text-align: left;"><br><br><br>
          <button type="submit" name="save" value="submit" class="btn-submit" style="width: 49%; margin-right: 1%;">Save</button><button type="submit" name="cancel" value="cancel" class="btn-submit" style="width: 49%; margin-left: 1%;">Cancel</button>
        </form>
        <!--End Change Password Form-->

    </div>
    <div class="column right" style="background-color:#d5f3fe; padding-top: 10px; margin: 10px 0;">
      
      <!-- Start User Logged In-->
      <label 
        style="font-size: 16px; color: #0f5298; margin: 0 0 0 15px;">
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
            <?php echo $initRow['full_name'];?>
          </label>
          <?php } ?>
      <div class="wrapper-sidebar-right">
        <div class="sidebar"> <!--can be hidden-->
            <ul>
                <li><a href="myprofile.php"><i class="fas fa-home"></i>Manage My Account</a></li>
                  <ul>
                    <li style="padding-left: 20px; font-size: 14px;"><a href="myprofile.php"><i class="fas fa-home"></i>My Profile</a></li>
                      <ul>
                        <li style="padding-left: 40px; font-size: 12px;"><a href="editprofile.php"><i class="fas fa-home"></i>Edit Profile</a></li>
                        <li style="padding-left: 40px; font-size: 12px; background-color: #66d3fa;"><a href="changepassword.php" style="color: #242424;"><i class="fas fa-home"></i>Change Password</a></li>
                      </ul>
                    <li style="padding-left: 20px; font-size: 14px;"><a href="#"><i class="fas fa-home"></i>Address Book</a></li>
                  </ul>
                <li><a href="#"><i class="fas fa-home"></i>My Orders</a></li>
                <!-- <ul> Returns &d Cancellation
                  <li style="padding-left: 20px; font-size: 14px;"><a href="#"><i class="fas fa-home"></i>Returns</a></li>
                  <li style="padding-left: 20px; font-size: 14px;"><a href="#"><i class="fas fa-home"></i>Cancellations</a></li>
                </ul> -->
                <li><a href="logout.php"><i class="fas fa-address-card"></i>Logout</a></li>
            </ul> 
        </div>
      </div>
      <!-- End User Logged In-->
  
    </div>
    </div>
  </div>
</body>
</html>