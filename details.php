<?php

if (!isset($_SESSION)) {
  session_start();
  unset($_SESSION['LOGIN-ERROR']);
  unset($_SESSION['SIGNUP-ERROR']);
}

include_once("connections/connection.php");
$con = connection();
$productId = $_GET['id'];

$detailSql = "SELECT * FROM products WHERE id = '$productId'";
$detailProducts = $con->query($detailSql) or die ($con->error);
$detailsRow = $detailProducts->fetch_assoc();

if(isset($_SESSION['ID'])) {
  $id = $_SESSION['ID'];

  $initSql = "SELECT * FROM users WHERE id = '$id'";
  $initUser = $con->query($initSql) or die ($con->error);
  $initRow = $initUser->fetch_assoc();
  $initTotal = $initUser->num_rows;
  
  if ($initTotal > 0) {
    $_SESSION['FULLNAME'] = $initRow['full_name'];
  }
}

if(isset($_POST['login'])){

  $uname = $_POST['username'];
  $pass = $_POST['password'];

  $sql = "SELECT * FROM users WHERE username = '$uname' AND password = '$pass'";
  $user = $con->query($sql) or die ($con->error);
  $row = $user->fetch_assoc();
  $total = $user->num_rows;

  if ($total > 0) {
    $_SESSION['ID'] = $row['id'];
    $_SESSION['FULLNAME'] = $row['full_name'];
    echo header("Location: index.php");
    unset($_SESSION['LOGIN-ERROR']);
  } else {
    $_SESSION['LOGIN-ERROR'] = "User not found";
  }
  
}

if(isset($_POST['signup'])){

  $uname = $_POST['username'];
  $pass = $_POST['password'];
  $fname = $_POST['fullname'];
  $eaddress = $_POST['emailaddress'];
  $pnumber = $_POST['phonenumber'];
  $bdate = $_POST['birthdate'];
  $gender = $_POST['gender'];

  $result = "SELECT * FROM users WHERE username = '$uname' OR email_address = '$eaddress'";
  $user = $con->query($result) or die ($con->error);
  $row = $user->fetch_assoc();
  $total = $user->num_rows;

  if (strlen(trim($pass)) < 4) {
    $_SESSION['SIGNUP-ERROR'] = "Password must be at least 4 characters";
  } else {
    if(is_numeric($pnumber)) {
      if ($total >= 1) {
        $_SESSION['SIGNUP-ERROR'] = "User already exist";
      } else {
        $sql = "INSERT INTO `users`(`username`, `password`, `full_name`, `email_address`, `phone_number`, `birth_date`, `gender`) VALUES ('$uname', '$pass', '$fname', '$eaddress', '$pnumber', '$bdate', '$gender')";
        $con->query($sql) or die ($con->error);
        echo header("Location: index.php");
        unset($_SESSION['SIGNUP-ERROR']);
      }
    } else {
      $_SESSION['SIGNUP-ERROR'] = "Invalid phone number";
    }
  }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/icon" href="img/favicon.ico"/>
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="js/bridge.js"></script>
</head>
<body>

  <div id="overlay"></div>
    <div class="header">
        <div class="container">
            <div class="logo-container">
              <h1><a href="#"><img src="img/logo.png" alt=""><span>IVAN</span>SHOP</a></h1>
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
    <div class="column middle" style="background-color:#fff; padding-top: 10px; margin: 10px 0;">
   
    <?php if($detailsRow != null) { ?>
    <!--Start Here-->
    <?php echo '<img style="width: 200px; height: 200px; margin-left: auto; margin-right: auto; margin-bottom: 5px; display: block;" src="data:image/png;base64,'.base64_encode($detailsRow['image']).'"/>'; ?>
    <label style="font-size: 12px;"><?php echo $detailsRow['name']; ?></label><br>
    <label style="font-size: 20px;"><span>&#8369;</span><?php echo $detailsRow['price']; ?></label>
    <?php } ?>


    </div>
    <div class="column right" style="background-color:#d5f3fe; padding-top: 10px; margin: 10px 0;">
      
      <!-- Start User Logged In-->
      <?php if(isset($_SESSION['FULLNAME'])){ ?>
        <label style="font-size: 16px; color: #0f5298; margin: 0 0 0 15px;">
      <?php }else{ ?>
        <label style="font-size: 16px; color: #0f5298; margin: 0 0 0 15px; display: none;">
      <?php } ?>
        Welcome
      </label>
      <?php if(isset($_SESSION['FULLNAME'])){ ?>
        <label style="display: block; width: 250px; font-size: 16px; color: #0f5298; margin: 0 0 0 15px; text-transform: uppercase; font-weight: bold; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;"> <!--display: none - hides label-->
      <?php }else{ ?>
        <label style="display: block; width: 250px; font-size: 16px; color: #0f5298; margin: 0 0 0 15px; text-transform: uppercase; font-weight: bold; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; display:none;"> <!--display: none - hides label-->
      <?php } ?>
      <?php if(isset($_SESSION['FULLNAME'])){ ?>
        <?php echo $_SESSION['FULLNAME'];?>
      <?php } ?>
      </label>
      <div class="wrapper-sidebar-right">
      <?php if(isset($_SESSION['FULLNAME'])){ ?>
        <div class="sidebar">
      <?php }else{ ?>
        <div class="sidebar" hidden>
      <?php } ?>
            <ul>
                <li><a href="myprofile.php"><i class="fas fa-home"></i>Manage My Account</a></li>
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
    
      <?php if(isset($_SESSION['FULLNAME'])){ ?>
        <div class="wrapper-login" hidden>
      <?php }else{ ?>
        <div class="wrapper-login">
      <?php } ?>
        <div class="container-login">

          <!-- Log In Form -->
          <label class="login">Log In</label>
          <form class="login-form" method="post" id="login-form">
            <?php if(isset($_SESSION['LOGIN-ERROR'])){ ?>
              <label style="color: #ff0000; font-size: 12px; height: 100%; width: 100%; margin-bottom: 10px; display:inline-block;"><?php echo $_SESSION['LOGIN-ERROR']; ?></label>
            <?php } ?>
            <input type="text" name="username" class="input-form" placeholder="Username" required><br>
            <input type="password" name="password" class="input-form" placeholder="Password" required><br>
            <button type="submit" name="login" class="btn-submit">Login</button>
            <span class="forgot-form">Forgot your password? <a href="#">Click here</a></span>
            <div style="width: 100%; height: 100% text-align: left; vertical-align: middle; margin-top: 20px;">
            <span class="forgot-form" style="vertical-align: top;">Log in via social media</span><br>
            <a href="#"><img src="img/fb.webp" width="40px" style="margin-right: 5px;"></a>
            <a href="#"><img src="img/g.webp" width="40px"></a>
            </div>
          </form>
          <!-- End Log In Form -->

          <br>
          
          <!-- Start Sign Up Form-->
          <label class="signup">Sign Up</label>
          <form class="signup-form" method="post" id="signup-form">
            <?php if(isset($_SESSION['SIGNUP-ERROR'])){ ?>
              <label style="color: #ff0000; font-size: 12px; height: 100%; width: 100%; margin-bottom: 10px; display:inline-block;"><?php echo $_SESSION['SIGNUP-ERROR']; ?></label>
            <?php } ?>
            <input type="text" name="username" class="input-form" placeholder="Username" required><br>
            <input type="password" name="password" class="input-form" placeholder="Password" id="password" required><br>
            <input type="email" name="emailaddress" class="input-form" placeholder="Email Address" required><br>
            <input type="text" name="fullname" class="input-form" placeholder="Full Name" required><br>
            <input type="text" name="phonenumber" class="input-form" placeholder="Phone Number" style="margin-bottom: 10px;">
            <label for="gender">Gender</label><br>
            <select class="dropdown-form" name="gender" id="gender" style="width: 100%; margin-left: 1%; float: left; text-align: left; margin-bottom: 10px;">
            <option value="Male">Male</option>
            <option value="Female">Female</option>
            <option value="Other">Other</option>
            </select>
            <label for="birthdate">Birthdate</label><br>
            <input type="date" id="birthdate" name="birthdate" style="margin-bottom: 10px;" required>
            <button type="submit" name="signup" class="btn-submit">Create</button>
              <div style="width: 100%; height: 100% text-align: left; vertical-align: middle; margin-top: 10px;">
              <span class="forgot-form" style="vertical-align: top;">Sign up via social media</span><br>
              <a href="#"><img src="img/fb.webp" width="40px" style="margin-right: 5px;"></a>
              <a href="#"><img src="img/g.webp" width="40px"></a>
              </div>
          </form>
          <!-- End Sign Up Form-->

        </div>
      </div>
    </div>
    </div>
  </div>
  <div>
    <button onclick="topFunction()" class="fix-btn">Back to Top</button>
    <div class="row-soc">
      <div class="column-soc">
        <a href="https://www.facebook.com" target="_blank"><img class="fix-img" src="img/facebook.webp"></a>
      </div>
      <div class="column-soc">
        <a href="https://www.twitter.com" target="_blank"><img class="fix-img" src="img/twitter.webp"></a>
      </div>
      <div class="column-soc">
        <a href="https://www.instagram.com" target="_blank"><img class="fix-img" src="img/instagram.webp"></a>
      </div>
    </div>
  </div>
    <footer id="main-footer">
      <p>Copyright &copy; 2020 IvanShop.com</p>
    </footer>
</body>
</html>