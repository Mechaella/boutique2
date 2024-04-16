 <?php

 session_start();

 include_once("db-config.php");

 if(isset($_POST['login'])){
 	$email = $_POST['email'];
 	$password = md5($_POST['password']);

 	$result = mysqli_query($mysqli, "SELECT 'email', 'password' FROM users WHERE email='$email' and password='$password'");

 	$user_matched = mysqli_num_rows($result);

 	if($user_matched > 0){
 		$_SESSION["email"] = $email;
 		header("location: home.php");
 	}else{
 		echo "User email or password is not matched";
 	}
 }
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>LOGIN PAGE</title>
	<link rel="stylesheet" type="text/css" href="reglog.css" href="bootstrap/bootstrap.min.css">
</head>
<body>
<style>
        body {
  background-image: url('background.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: 100% 100%;
}
.button{
    display: inline-block;
padding: 10px 20px;
font-size: 19px;
cursor: pointer;
text-align: center;
text-decoration: none;
outline: none;
color: white;
background-color: darkkhaki;
border: none;
border-radius: 15px;
box-shadow: 0 5px #999;
margin-top: 30px;
margin-left: 20px;
    </style>

    <a class="button" href="index.php">Go Back</a>

     <div class="header"> <p>LOGIN FORM</p></div>
    <form action="login.php" method="post" name="form1">
        
                <div class="input-group">
                <label>Email</label>
                <input type="text" name="email">
                </div>
            
                <div class="input-group">
                <label>Password</label>
                <input type="password" name="password">
                </div>
           
                <div class="input-group">
               <input type="submit" name="login" class="btn" value="Login">
                </div>
                <style>
           	a{
           		color: saddlebrown;
           	}
           </style>
           <p>
        Not yet register? <a href="register.php">Sign up</a>
        </p>
    </form>

    <style>
.footer {
  left: 0;
  bottom: 0;
  width: 100%;
  background-color: transparent;
  color: white;
  text-align: center;
}
</style>
<br><br><br><br><br><br><br>
<br><br><br><br><br><br><br>
</body>
</html>