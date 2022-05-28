<?php
$message="";
include("dbHandler.php");
if(isset($_POST["myusername"]) && isset($_POST["mypassword"])){
    
    
    $username=$_POST["myusername"];
    $mypassword=$_POST["mypassword"];
    $sql = "SELECT name, phone, username, password FROM users WHERE username='$username'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
          if(password_verify($mypassword, $row["password"])){
            $message="";
            $name=$row["name"];
            $phone=$row["phone"];
            header("location: index.php?name=$name&phone=$phone&username=$username");
            $conn->close();
          }else{
            $message="Incorrect username or Password";
          }
        }
      } else {
       $message="Incorrect username or Password";
      }
}



?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="show.js"></script>
    <title>Document</title>
</head>
<body>
    
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <fieldset>
            
            <div class="SignupContainer register_form">
	 
	<h1 class="form__title">Sign In</h1>
            <div class="form__message form__message--error "></div>
                <div class="form__input-group ">
                    <input type="text" required id="username" name="myusername" class="form__input " autofocus placeholder="Username">
                    <div class="form__input-error-message"></div>
                </div>
                <div class="form__input-group ">
                    <input type="password" id="password" required name="mypassword" class="form__input " autofocus placeholder="Password">
                    <div class="form__input-error-message"></div>
                </div>
                <div class="form__input-group ">
                    
                    <input type="checkbox" onclick="showpassword()"><label>Show Password</label>
                </div>
            
            <button class="form__button">Sign In</button>
    </div>
        </fieldset>
    </form>
</body>
</html>
