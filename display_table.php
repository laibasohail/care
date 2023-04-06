<?php
include_once 'connect.php';
$result = mysqli_query($con,"SELECT users.name AS name,info.city, info.mobile, info.item,info.date 
From users 
INNER JOIN info 
ON users.email = info.name");
?>
<!DOCTYPE html>
<html>
 <head>
 <title> CareIND : Donate here</title>
 <link rel="stylesheet" href="./table.css">
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

<?php
if (mysqli_num_rows($result) > 0) {
?>

<div class="tbl-header">
<table cellpadding="0" cellspacing="0" border="0">
<thead>

	<tr>

		<td>   Name</td>

		<td>   City</td>

		<td>   Mobile</td>

		<td>   Item</td>

		<td>   Date</td>

	</tr>
</thead>
</table>
</div>
<div class="tbl-content">
<table cellpadding="0" cellspacing="0" border="0">
<tbody>

<?php


	if($result != "zero")

	{

		while($row = $result->fetch_assoc())

		{

			echo "<tr>";

			echo "<td>" . $row['name'] . "</td>";

			echo "<td>" . $row['city'] . "</td>";

			echo "<td>" . $row['mobile'] . "</td>";

			echo "<td>" . $row['item'] . "</td>";

			echo "<td>" . $row['date'] . "</td>";

			echo "</tr>";


		}

	}

	else

		{

			echo $result;

	}

?>
</tbody>
</table>
</div>
 <?php
}
else{
    echo "<h2>"."No Current Donations :("."</h2>";
}
?>
</body>
</html>
