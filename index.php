<?php

// if (!isset($_SESSION)) {
//   session_start();
// }

include_once("connections/connection.php");

$con = connection();

if (isset($_POST['submit'])) {

  $uname = $_POST['username'];
  $pass = $_POST['password'];
  $fname = $_POST['fullname'];
  $pnumber = $_POST['phonenumber'];
  $bdate = $_POST['birthdate'];
  $gender = $_POST['gender'];

  $sql = "INSERT INTO `users`(`username`, `password`, `full_name`, `phone_number`, `birth_date`, `gender`) VALUES ('$uname', '$pass', '$fname', '$pnumber', '$bdate', '$gender')";
  $con->query($sql) or die ($con->error);

  echo header("Location: index.php");

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
  
  <!--Start Modal-->
  <div class="modal" id="modal">
    <div class="modal-header">
      <div class="title">SUPCASE UBPro for Google Pixel 3aXL Case Full-Body Rugged Case with Screen Protector & Holster Clip</div>
      <button data-close-button class="close-button">&times;</button>
    </div>
    <label><span>&#8369;</span>100</label>
    <br>
    <div class="modal-body">
      <img src="img/img1.jpg" alt="">
      <br>
      <p>Shockproof TPU bumperBuilt-In Screen ProtectorRotatable Holster ClipRaised bezelsTexturized grip
      ROTATABLE HOLSTER CLIPKeep your phone securely at arm's-length at all timesDROP PROTECTIONDual-layer design creates the industry's thinnest drop-proof case and winner of CNET's annual drop testEASY PORT ACCESSPrecise cutouts allow open access to portsGREAT FEELTexturized edges for enhanced grip</p>
      <br>
      <button class="btn-submit">Add to Cart</button>
    </div>
  </div>
  <!--End Modal-->

  <div id="overlay"></div>
    <div class="header">
        <div class="container">
            <div class="logo-container">
              <h1><a href="http://127.0.0.1:5500/index.html"><img src="img/logo.png" alt=""><span>IVAN</span>SHOP</a></h1>
            </div>
            <ul class="navigation">
                <a href="http://127.0.0.1:5500/aboutus.html"><li>About Us</li></a>
                <a href="http://127.0.0.1:5500/contactus.html"><li>Contact Us</li></a>
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
        <!--image slider start-->
        <div class="slider">
        <div class="slides">
          <!--radio buttons start-->
          <input type="radio" name="radio-btn" id="radio1">
          <input type="radio" name="radio-btn" id="radio2">
          <input type="radio" name="radio-btn" id="radio3">
          <!--radio buttons end-->
        <!--slide images start-->
        <div class="slide first">
          <img src="img/img1.jpg" alt="">
        </div>
        <div class="slide">
          <img src="img/img2.jpg" alt="">
        </div>
        <div class="slide">
          <img src="img/img3.jpg" alt="">
        </div>
        <!--slide images end-->
        <!--automatic navigation start-->
        <div class="navigation-auto">
          <div class="auto-btn1"></div>
          <div class="auto-btn2"></div>
          <div class="auto-btn3"></div>
        </div>
        <!--automatic navigation end-->
      </div>
      <!--manual navigation start-->
      <div class="navigation-manual">
        <label for="radio1" class="manual-btn"></label>
        <label for="radio2" class="manual-btn"></label>
        <label for="radio3" class="manual-btn"></label>
      </div>
      <!--manual navigation end-->
      </div>
    <!--image slider end-->

    <br>

    <!--Start Search-->
    <div class="search-box" style="margin:auto; max-width:100%;">
      <input type="text" placeholder="Search"/>
      <img src="img/search.png" alt="" style="margin-left: 0.9%;">
      <img src="img/cart.png" alt="" style="margin-left: 0.3%;">
    </div>
    <!--End Search-->

    <div class="row-grid">
      <div data-modal-target="#modal" class="column-grid">
        <div class="card-grid">
          <img src="img/img1.jpg" alt="">
          <br>
          <h3>SUPCASE UBPro for Google Pixel 3aXL Case Full-Body Rugged Case with Screen Protector & Holster Clip</h3>
          <p><span>&#8369;</span>100</p>
        </div>
      </div>
      <div class="column-grid">
        <div class="card-grid">
          <img src="img/img1.jpg" alt="">
          <br>
          <h3>SUPCASE UBPro for Google Pixel 3aXL Case Full-Body Rugged Case with Screen Protector & Holster Clip</h3>
          <p><span>&#8369;</span>100</p>
        </div>
      </div>
      <div class="column-grid">
        <div class="card-grid">
          <img src="img/img1.jpg" alt="">
          <br>
          <h3>SUPCASE UBPro for Google Pixel 3aXL Case Full-Body Rugged Case with Screen Protector & Holster Clip</h3>
          <p><span>&#8369;</span>100</p>
        </div>
      </div>
      <div class="column-grid">
        <div class="card-grid">
          <img src="img/img1.jpg" alt="">
          <br>
          <h3>SUPCASE UBPro for Google Pixel 3aXL Case Full-Body Rugged Case with Screen Protector & Holster Clip</h3>
          <p><span>&#8369;</span>100</p>
        </div>
      </div>
    </div>

    <div class="row-grid">
      <div class="column-grid">
        <div class="card-grid">
          <img src="img/img1.jpg" alt="">
          <br>
          <h3>SUPCASE UBPro for Google Pixel 3aXL Case Full-Body Rugged Case with Screen Protector & Holster Clip</h3>
          <p><span>&#8369;</span>100</p>
        </div>
      </div>
      <div class="column-grid">
        <div class="card-grid">
          <img src="img/img1.jpg" alt="">
          <br>
          <h3>SUPCASE UBPro for Google Pixel 3aXL Case Full-Body Rugged Case with Screen Protector & Holster Clip</h3>
          <p><span>&#8369;</span>100</p>
        </div>
      </div>
      <div class="column-grid">
        <div class="card-grid">
          <img src="img/img1.jpg" alt="">
          <br>
          <h3>SUPCASE UBPro for Google Pixel 3aXL Case Full-Body Rugged Case with Screen Protector & Holster Clip</h3>
          <p><span>&#8369;</span>100</p>
        </div>
      </div>
      <div class="column-grid">
        <div class="card-grid">
          <img src="img/img1.jpg" alt="">
          <br>
          <h3>SUPCASE UBPro for Google Pixel 3aXL Case Full-Body Rugged Case with Screen Protector & Holster Clip</h3>
          <p><span>&#8369;</span>100</p>
        </div>
      </div>
    </div>

    <div class="row-grid">
      <div class="column-grid">
        <div class="card-grid">
          <img src="img/img1.jpg" alt="">
          <br>
          <h3>SUPCASE UBPro for Google Pixel 3aXL Case Full-Body Rugged Case with Screen Protector & Holster Clip</h3>
          <p><span>&#8369;</span>100</p>
        </div>
      </div>
      <div class="column-grid">
        <div class="card-grid">
          <img src="img/img1.jpg" alt="">
          <br>
          <h3>SUPCASE UBPro for Google Pixel 3aXL Case Full-Body Rugged Case with Screen Protector & Holster Clip</h3>
          <p><span>&#8369;</span>100</p>
        </div>
      </div>
      <div class="column-grid">
        <div class="card-grid">
          <img src="img/img1.jpg" alt="">
          <br>
          <h3>SUPCASE UBPro for Google Pixel 3aXL Case Full-Body Rugged Case with Screen Protector & Holster Clip</h3>
          <p><span>&#8369;</span>100</p>
        </div>
      </div>
      <div class="column-grid">
        <div class="card-grid">
          <img src="img/img1.jpg" alt="">
          <br>
          <h3>SUPCASE UBPro for Google Pixel 3aXL Case Full-Body Rugged Case with Screen Protector & Holster Clip</h3>
          <p><span>&#8369;</span>100</p>
        </div>
      </div>
    </div>

    <div class="row-grid">
      <div class="column-grid">
        <div class="card-grid">
          <img src="img/img1.jpg" alt="">
          <br>
          <h3>SUPCASE UBPro for Google Pixel 3aXL Case Full-Body Rugged Case with Screen Protector & Holster Clip</h3>
          <p><span>&#8369;</span>100</p>
        </div>
      </div>
      <div class="column-grid">
        <div class="card-grid">
          <img src="img/img1.jpg" alt="">
          <br>
          <h3>SUPCASE UBPro for Google Pixel 3aXL Case Full-Body Rugged Case with Screen Protector & Holster Clip</h3>
          <p><span>&#8369;</span>100</p>
        </div>
      </div>
      <div class="column-grid">
        <div class="card-grid">
          <img src="img/img1.jpg" alt="">
          <br>
          <h3>SUPCASE UBPro for Google Pixel 3aXL Case Full-Body Rugged Case with Screen Protector & Holster Clip</h3>
          <p><span>&#8369;</span>100</p>
        </div>
      </div>
      <div class="column-grid">
        <div class="card-grid">
          <img src="img/img1.jpg" alt="">
          <br>
          <h3>SUPCASE UBPro for Google Pixel 3aXL Case Full-Body Rugged Case with Screen Protector & Holster Clip</h3>
          <p><span>&#8369;</span>100</p>
        </div>
      </div>
    </div>

    <div class="row-grid">
      <div class="column-grid">
        <div class="card-grid">
          <img src="img/img1.jpg" alt="">
          <br>
          <h3>SUPCASE UBPro for Google Pixel 3aXL Case Full-Body Rugged Case with Screen Protector & Holster Clip</h3>
          <p><span>&#8369;</span>100</p>
        </div>
      </div>
      <div class="column-grid">
        <div class="card-grid">
          <img src="img/img1.jpg" alt="">
          <br>
          <h3>SUPCASE UBPro for Google Pixel 3aXL Case Full-Body Rugged Case with Screen Protector & Holster Clip</h3>
          <p><span>&#8369;</span>100</p>
        </div>
      </div>
      <div class="column-grid">
        <div class="card-grid">
          <img src="img/img1.jpg" alt="">
          <br>
          <h3>SUPCASE UBPro for Google Pixel 3aXL Case Full-Body Rugged Case with Screen Protector & Holster Clip</h3>
          <p><span>&#8369;</span>100</p>
        </div>
      </div>
      <div class="column-grid">
        <div class="card-grid">
          <img src="img/img1.jpg" alt="">
          <br>
          <h3>SUPCASE UBPro for Google Pixel 3aXL Case Full-Body Rugged Case with Screen Protector & Holster Clip</h3>
          <p><span>&#8369;</span>100</p>
        </div>
      </div>
    </div>
    <br>
    <!--Start Pagination-->
    <div class="pagination-center">
      <div class="pagination">
      <a href="#">&laquo;</a>
      <a href="#">1</a>
      <a href="#" class="active">2</a>
      <a href="#">3</a>
      <a href="#">4</a>
      <a href="#">5</a>
      <a href="#">6</a>
      <a href="#">&raquo;</a>
      </div>
    </div>
    <!--End Pagination-->
    </div>
    <div class="column right" style="background-color:#d5f3fe; padding-top: 10px; margin: 10px 0;">
      
      <!-- Start User Logged In-->
      <label 
        style="font-size: 16px; color: #0f5298; margin: 0 0 0 15px; display: none;"> <!--display: none - hides label-->
        Welcome
      </label>
      <label 
        style="display: block; width: 250px; font-size: 16px; color: #0f5298; margin: 0 0 0 15px; text-transform: uppercase; font-weight: bold; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; display: none;"> <!--display: none - hides label-->
        Noah
      </label>
      <div class="wrapper-sidebar-right">
        <div class="sidebar" hidden> <!--can be hidden-->
            <ul>
                <li><a href="http://127.0.0.1:5500/myprofile.html"><i class="fas fa-home"></i>Manage My Account</a></li>
                <li><a href="#"><i class="fas fa-home"></i>My Orders</a></li>
                <!-- <ul> Returns &d Cancellation
                  <li style="padding-left: 20px; font-size: 14px;"><a href="#"><i class="fas fa-home"></i>Returns</a></li>
                  <li style="padding-left: 20px; font-size: 14px;"><a href="#"><i class="fas fa-home"></i>Cancellations</a></li>
                </ul> -->
                <li><a href="#"><i class="fas fa-address-card"></i>Logout</a></li>
            </ul> 
        </div>
      </div>
      <!-- End User Logged In-->
      
      <!-- Start Login / Sign Up Form -->
      <div class="wrapper-login"> <!--can be hidden-->
        <div class="container-login">
          <div class="login">Log In</div>
          <div class="signup" style="background: none;">Sign Up</div>
          <form class="login-form">
              <input type="text" class="input-form" placeholder="Username"><br>
              <input type="password" class="input-form" placeholder="Password"><br>
              <button class="btn-submit">Login</button>
              <span class="forgot-form">Forgot your password? <a href="#">Click here</a></span>
              <br>
              <br>
              <a href="#" class="fb fb-connect">Facebook</a>
              <a href="#" class="g g-connect">Google</a>
           </form>
           <form class="signup-form" method="post" hidden> <!--Don't touch hidden-->
            <input type="text" name="username" class="input-form" placeholder="Username"><br>
            <input type="password" name="password" class="input-form" placeholder="Password"><br>
            <input type="text" name="fullname" class="input-form" placeholder="Full Name"><br>
            <input type="text" name="phonenumber" class="input-form" placeholder="Phone Number"><br>
            <label for="birthdate">Birthdate</label><br>
            <input type="date" id="birthdate" name="birthdate"><br><br>
            <label for="gender">Gender</label><br>
            <input type="radio" id="male" name="gender" value="male">
            <label for="male">Male</label><br>
            <input type="radio" id="female" name="gender" value="female">
            <label for="female">Female</label><br>
            <input type="radio" id="other" name="gender" value="other">
            <label for="other">Other</label><br><br>
            <button type="submit" name="submit" class="btn-submit">Create</button><br><br>
            <a href="#" class="fb fb-connect">Facebook</a>
            <a href="#" class="g g-connect">Google</a>
         </form>
        </div>
      </div>
      <!-- End Login / Sign Up Form -->

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