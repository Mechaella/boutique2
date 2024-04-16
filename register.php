<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title> Registration Page</title>
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
}
    </style>

    <a class="button" href="index.php">Go Back</a>

     <div class="header"> <p> REGISTRATION FORM </p></div>
    <form action="register.php" method="post" name="form1">

            <div class="input-group">
                <label>First Name</label>
                <input type="text" name="first_name" required>
                </div>

                <div class="input-group">
                <label>Last Name</label>
                <input type="text" name="last_name" required>
                </div>

            <div class="input-group">
                <label>Email</label>
                <input type="text" name="email" required>
                </div>

                <div class="input-group">
                <label>Date of Birth</label>
                <input type="text" name="date_of_birth" required>
                </div>

<div class="input-group">
                <label>Contact Number</label>
                <input type="tel" name="contact_number" required>
                </div>

<div class="input-group">
                <label>Address</label>
                <input type="text" name="address" required>
                </div>

            <div class="input-group">
                <label>Password</label>
                <input type="password" name="password" required>
                </div>
            <div class="input-group">
                <input type="submit" name="register" class="btn" value="Register">
            </div>

           <style>
           	a{
           		color: saddlebrown;
           	}
           </style>
            <p>
                Already a member? <a href="login.php">Login</a>
            </p>

        <?php
        
        include_once("db-config.php");

        
        if (isset($_POST['register'])) {
            $first_name     = $_POST['first_name'];
            $last_name     = $_POST['last_name'];
            $email    = $_POST['email'];
            $date_of_birth    = $_POST['date_of_birth'];
            $contact_number    = $_POST['contact_number'];
            $address    = $_POST['address'];
            $password = md5($_POST['password']);

            
            $email_result = mysqli_query($mysqli, "select 'email' from users where email='$email' and password='$password'");

            
            $user_matched = mysqli_num_rows($email_result);

            
            if ($user_matched > 0) {
                echo "<br/><br/><strong>Error: </strong> User already exists with the email id '$email'.";
            } else {
                
                $result   = mysqli_query($mysqli, "INSERT INTO users(first_name, last_name, email, date_of_birth, contact_number, address, password) VALUES('$first_name', '$last_name', '$email', '$date_of_birth', '$contact_number', '$address',  '$password')");

                
                if ($result) {
                    echo "<br/><br/>User Registered successfully.";
                } else {
                    echo "Registration error. Please try again." . mysqli_error($mysqli);
                }
            }
        }

        ?>
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
<br><br><br>
<div class="footer">
  <p>© 2021 All Right Reserved</p>
</div>
</body>
</html>