<?php
    include("dbHandler.php");
    if(isset($_POST["username"])&&isset($_POST["password"])){
        $name=$_POST["name"];
        $phone=$_POST["phone"];
        $username=$_POST["username"];
        $password=password_hash($_POST["password"], PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (name, phone, username, password) VALUES ('$name', '$phone', '$username','$password')";
        if ($conn->query($sql) === TRUE) {
            header("location: signin.php");
            unset($_POST["username"]);
            unset($_POST["password"]);
          }else {
            echo "Error: " . $sql . "<br>" . $conn->error;
          }
          $conn->close();
        
    }

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="SignUpLogin.css">
    <title>Sign Up</title>
    <script src="show.js"></script>
</head>
<body>
    
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <fieldset>
            <div class="SignupContainer register_form">
	 
	<h1 class="form__title">Create Account</h1>
            <div class="form__message form__message--error "></div>
            
                <div class="form__input-group ">
                
                    <input type="text" id="name" required name="name" class="form__input " autofocus placeholder="Full Name">
                    <div class="form__input-error-message"></div>
                </div>
                <div class="form__input-group ">
                    <input type="tel" id="phone" required name="phone" class="form__input " autofocus placeholder="Phone Number">
                    <div class="form__input-error-message"></div>
                </div>
                <div class="form__input-group ">
                    <input type="text" required id="username" name="username" class="form__input " autofocus placeholder="Username">
                    <div class="form__input-error-message"></div>
                </div>
                <div class="form__input-group ">
                    <input type="password" id="password" required name="password" minlength="8" class="form__input " autofocus placeholder="Password">
                    <div class="form__input-error-message"></div>
                </div>
                <div class="form__input-group ">
                    
                    <input type="checkbox" onclick="showpassword()"><label>Show Password</label>
                </div>
            
            <button class="form__button">Sign Up</button>
    </div>
        </fieldset>
    </form>
</body>
</html>
