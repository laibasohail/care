<?php

session_start();
include("connect.php");
include("script.php");

if(isset($_SESSION['Email'])) {
$email=$_SESSION['Email'];
$name=mysqli_query($con,"SELECT Name FROM users WHERE Email='$email'");
$res=mysqli_fetch_assoc($name);
$n=$res["Name"];



}

$r=infom($con,$email);

?>

<html>
<head>
<title> CareIND : Donate Here</title>
<link rel ="stylesheet" href="./donation_form.css">
<link rel ="stylesheet" href="./style.css">
</head>
<body>
<nav>
		<div class="logo">
			<a href="index.html">
			<h4>CareIND</h4><img src="images/CareOurIND.png"  alt="CareIND" class="CareIND"></a>
		</div>
		<ul class="nav-links">
			<li>
				<a href='about.html'>About Us</a>
			</li>
			<li>
				<a href="signup.php">Signup</a>
			</li>
			<li>
				<a href='login.php'>Donate/Login</a>
			</li>
		</ul>
	</nav>
    <div class="header">
      <h2 class="">Hey!</h2>
      <h4 class="">Fill out the form below to donate your item</h4>
    </div>
<div id="form" class="form">
<form method="POST" action="donation_form.php">
<input type="text" name="city" class="form-field" placeholder="City" required/>
<input type="text" name="mobile" class="form-field" placeholder="Mobile" required />
<input type="text" name="aadhaar" class="form-field" placeholder="Aadhaar" required />
<input type="text" name="item" class="form-field" placeholder="Donating Item" required/>
 <input type="submit" name="submit" style="padding: 12px 10px; border: 0; background: linear-gradient(to right, #da22ff, #9733ee); border-radius: 3px; margin-top: 10px; color: #fff; letter-spacing: 1px; font-family: 'Century gothic', sans-serif;'" value="Register Donation" class="">
<?php
echo "<p style='color:red'>$r</p>";
?>
</div>
</body>
</html>

