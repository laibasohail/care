<?php 
include("connect.php");
function signup($con){
	$error="";
	$success="";
if(isset($_POST['submit']))
{
	$name=name_check($_POST['name']);
	$email=$_POST['email'];
	$passcheck=pass_check($_POST['password']);
	$password=$_POST['password'];
	$passwordconfirm=pass_check($_POST['passwordconfirm']);
	$occupation=name_check($_POST['occupation']);
	$gender=$_POST['gender'];
	$birthday=birth_check($_POST['birthday']);
	$date=date("F,d Y");
		
	if($name!=($_POST['name'])){
	$error="--Invalid Name";
	return $error;
	}

	else if(strlen($occupation)<2 or $occupation!=($_POST['occupation'])){
	$error="--Invalid Occupation";
	return $error;
	}

	else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
	$error="--Please enter a valid email";
	return $error;
	}

	else if($passcheck!="success"){
	return $passcheck;
	}

	else if($passcheck!==$passwordconfirm){
	$error="--Password does not match";
	return $error;
	}

	else if($birthday=="error"){
	$error="--Invalid birthdate";
	return $error;
	}

	else{
	$pd=md5($password);
	$insertQuery="INSERT INTO USERS(Name,Email,Password,Occupation,Gender,Birthday,Reg_date) VALUES('$name','$email','$pd','$occupation','$gender','$birthday','$date')";
	if(mysqli_query($con,$insertQuery)) {
			$success="\nAccount created successfully";
			return $success;
		}
		else{
			$success="\nError in creating account";
			return $success;
		}
	
	}
}
}

	function name_check($data){
	$data = trim($data);
  	$data = stripslashes($data);
  	$data = htmlspecialchars($data);
  	$data= preg_replace("/[^a-zA-Z\s]/", "", $data);
  	return $data;
	}

	function pass_check($data){
	if(strlen($data)<5){
		$data="--Password must be greater than 5 characters.";
		return $data;
		}

	else if(!preg_match("/[0-9]/",$data)){
	$data="--Password must contain at least one digit";
	return $data;
		}


	else if(!preg_match("/[A-Za-z]/",$data)){
	$data="--Password must contain at least one letter";
	return $data;
		}

	else{
	$data="success";
	return $data;
		}

	}

	function birth_check($data){
	$new_data=explode('/',$data);
	if(checkdate($new_data[1],$new_data[0],$new_data[2])){
	return $data;	
	}
	else{
	$data="error";
	return $data;
	}
	
	}
	function aadhaar($data){
	if(strlen($data)!=12 and !ctype_digit($data)){
		$data="Aadhaar must be a 12 digit numeric";
		return $data;
	}

	else{
	return $data;
	}
	}

	function mobile_check($data){
	if(strlen($data)<10 and !ctype_digit($data))
	{
		$data="Mobile number must be of 10 digits";
		return $data;
	}
	
	else{	
	return $data;
	}
	}


	function donation($data){
	if (!ctype_alpha(str_replace(' ', '', $data))){
	$data="Invalid Item";
	return $data;
	}

	else{
	return $data;
	}
	}

function register($con){
	if(isset($_POST['submit']))
	{
	
	    $email = mysqli_real_escape_string($conn, $_POST['email']);
	    $password = mysqli_real_escape_string($conn, $_POST['password']);
		
		if(email_exists($email,$conn))
		{
			$result=(mysqli_query($conn,"SELECT Password FROM users WHERE email='$email'"));
			
			$retrievepassword = mysqli_fetch_assoc($result);
			if(md5($password)!==$retrievepassword['Password']){
				$error="Login Failed! Please make sure that you enter the correct password";
				return $error;
			}
			else{
				$error="Success";
				return $error;
			
			
			}
        }
		else{
            $error="Login Failed! Email does not exist";
            return $error;
            
		}	
	}

}		


function email_exists($email,$con){
	$result=mysqli_query($conn,"SELECT id FROM users WHERE Email='$email'");
	if(mysqli_num_rows($result) == 1){
		return true;
	}
	else{
		return false;
	}
	
}


function infom($conn,$email){
		if(isset($_POST['submit'])){
		$mobile=mobile_check($_POST['mobile']);
		$aadhaar=aadhaar($_POST['aadhaar']);
		$city=$_POST['city'];
		$item=donation($_POST['item']);
		$date=date("F,d Y");
		if($mobile!=($_POST['mobile'])){
			return $mobile;
			}
		else if($aadhaar!=($_POST['aadhaar'])){
			return $aadhaar;
		}
		else if($item!=($_POST['item'])){
			return $item;
			
		}
		else{
			
			$insertQuery="INSERT INTO info(Name,City,Mobile,Aadhaar,Item,Date) VALUES('$email','$city','$mobile','$aadhaar','$item','$date')";
			if(mysqli_query($conn,$insertQuery)){	
				header("Location: ./redirect.html");
			}
			else{
				return "Error in inserting your information";
				
			}
			
		}
		
	}
	
	}
	

	
?>
