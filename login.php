<?php
session_start();
include "script.php";
include "connect.php";
$a=" ";
$res=register($conn);

if($res!="Success"){
 $a=$res;
}
else{
	$_SESSION['Email'] = $_POST['email'];
	header("Location: ./donation_form.php");
}



?>
<html>
<head>
<title> CareIND : Donate Here</title>
<link rel ="stylesheet" href="./signup_login.css">
<link rel="stylesheet" href="./style.css">
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

<div class="container">
  <div class="left">
    <div class="header">
      <h2 class="animation a1">Hey!</h2>
      <h4 class="animation a2">Log in to your account using email and password</h4>
    </div>
    <form method="POST" action="login.php">
    <div class="form">
      <input type="text" name="email" class="form-field animation a3" placeholder="Email Address">
      <input type="password" name="password" class="form-field animation a4" placeholder="Password">
      <input type="submit" name="submit" style="padding: 12px 10px; border: 0; background: linear-gradient(to right, #da22ff, #9733ee); border-radius: 3px; margin-top: 10px; color: #fff; letter-spacing: 1px; font-family: 'Century gothic', sans-serif;'" value="Login" class="animation a6">
<?php
echo $a;
?>
    </div>
  </div>
  <div class="right"></div>
</div>
</body>
</html>

