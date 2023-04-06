<?php
include "script.php";
include "connect.php";
$res=signup($con);
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
      <h2 class="animation a1">Signup</h2>
      <h4 class="animation a2">Enter your details to get started</h4>
    </div>
<div id="form">
<form method="POST" action="signup.php" enctype="multipart/form-data">
<input type="text" name="name" class="form-field animation a3" placeholder="Name" required />
<input type="text" name="email" class="form-field animation a3" placeholder="Email Address" required>
<input type="password" name="password" class="form-field animation a3" placeholder="Password" required>
<input type="password" name="passwordconfirm" class="form-field animation a4" placeholder="Re-enter Password" required/>
<input type="text" name="occupation" class="form-field animation a4" placeholder="Occupation" required />
<select class="form-field animation a4" name="gender">
<option value="M">Male</option>
<option value="F">Female</option>
<option value="O">Other</option>
</select>
<input type="text" name="birthday" class="form-field animation a4" placeholder="Birthday : DD/MM/YYYY" required/>
<input type="submit" name="submit" style="padding: 12px 10px; border: 0; background: linear-gradient(to right, #da22ff, #9733ee); border-radius: 3px; margin-top: 10px; color: #fff; letter-spacing: 1px; font-family: 'Century gothic', sans-serif;'" value="Signup" class="animation a6">
<?php
echo $res;
?>
</div>
</div>
  <div class="right"></div>
</div>
</body>
</html> 
