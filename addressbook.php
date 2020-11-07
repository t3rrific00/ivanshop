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
              <li><a href="result.php?search="><i class="fas fa-home"></i>All</a></li>
              <li><a href="result.php?search=&category=Mobiles"><i class="fas fa-home"></i>Mobiles</a></li>
              <li><a href="result.php?search=&category=Accessories"><i class="fas fa-user"></i>Accessories</a></li>
              <li><a href="result.php?search=&category=Portable+Audio"><i class="fas fa-address-card"></i>Portable Audio</a></li>
              <li><a href="result.php?search=&category=Chargers"><i class="fas fa-project-diagram"></i>Chargers</a></li>
              <li><a href="result.php?search=&category=Tablets"><i class="fas fa-blog"></i>Tablets</a></li>
              <li><a href="result.php?search=&category=Wearables"><i class="fas fa-address-book"></i>Wearables</a></li>
            </ul>
          </div>
      </div>
      </div>
      <div class="column middle" style="background-color: #fff; padding-top: 10px;">
        
        <!--Start Here-->

      <div class="table-container">
        <div class="table-item">
        <table>
        <tr>
          <th style="width: 100px;">Full name</th>
          <th style="width: 200px;">Address</th> 
          <th style="width: 150px;">Postcode</th>
          <th style="width: 120px;">Mobile Number</th>
          <th style="width: 50px;">Default</th>
          <td></td>
        </tr>
        <tr>
          <td>Niel Picson Sauro</td>
          <td>Office - Blk 2 Lot 1 Salanap Compound Sitio Mendez Brgy Baesa Quezon City</td>
          <td>Quezon City, Metro Manila, Philippines</td>
          <td>0999-999-9999</td>
          <td>Yes</td>
          <td>Edit</td>
        </tr>
        <tr>
          <td>Niel Picson Sauro</td>
          <td>Office - Blk 2 Lot 1 Salanap Compound Sitio Mendez Brgy Baesa Quezon City</td>
          <td>Quezon City, Metro Manila, Philippines</td>
          <td>0999-999-9999</td>
          <td>Yes</td>
          <td>Edit</td>
        </tr>
        <tr>
          <td>Niel Picson Sauro</td>
          <td>Office - Blk 2 Lot 1 Salanap Compound Sitio Mendez Brgy Baesa Quezon City</td>
          <td>Quezon City, Metro Manila, Philippines</td>
          <td>0999-999-9999</td>
          <td>Yes</td>
          <td>Edit</td>
        </tr>
        </table>
        </div>
      </div>

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
                        <li style="padding-left: 40px; font-size: 12px;"><a href="changepassword.php"><i class="fas fa-home"></i>Change Password</a></li>
                      </ul>
                    <li style="padding-left: 20px; font-size: 14px; background-color: #66d3fa;"><a href="addressbook.php" style="color: #242424;"><i class="fas fa-home"></i>Address Book</a></li>
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