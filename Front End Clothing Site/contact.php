<?php
$isSent=false;
include('dbHandler.php');
if(isset($_POST['name'])){
    $name=$_POST["name"];
      $email=$_POST["email"];
      $subject=$_POST["subject"];
      $body=$_POST["body"];
       $sql2 = "INSERT INTO msgs (name, email, subject, body) VALUES ('$name', '$email', '$subject','$body')";
       if ($conn->query($sql2) === TRUE) {
           unset($_POST["name"]);
           $isSent=true;
      }
    }       

$conn->close();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="contactcss.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;500&display=swap" rel="stylesheet">
</head>
<body class="body">
    <header>
        <nav class="nav-container">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">Web Project</a>
            </div>
            <div class="navbar-links">
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="contact.html">Contact</a></li>
                    <li><a href="#"><i class="fas fa-search"></i></a></li>
                    <li><a href="cart.html"><i class="fas fa-shopping-cart"><span class="cartspan">0</span></i></a></li>
                </ul>
            </div>
        </nav>
            </div>
        </div>
    </header>
    <?php
        if(!$isSent){
    ?>
   <div class="container">
     <h2 class="contactName">Contact us</h2>
     <div class="ptags">
    <p >If you have business inquiries or other questions, please fill out the following form to contact
                        us or send email to "example@gmail.com "</a>
                        Thank you. </p>

                    <p>Fields with * are required.</p>
                </div>
                    <div class="form-contact">
                        <form action = "<?php echo $_SERVER['PHP_SELF']; ?>" 

                        method= "post"  ><input type='hidden' name=''  >                        <div class="row">

                         <input type='hidden' name=''  >                        <div class="row">
                            <label>Name *</label><br />
                            <input type='text' name='name'  required  value=''>                        </div>
                        <div class="row">
                            <label>Email *</label><br />
                            <input type='email' name='email'  required  value=''>                        </div>
                        <div class="row">
                            <label>Subject *</label><br />
                            <input type='text' name='subject'  required  value=''>                        </div>
                        <div class="row">
                            <label>Body *</label><br />
                            <textarea name='body'  required ></textarea>                        </div>
                        <div class="row">
                            <label></label>

                         
                        <div class="clr"></div><br />
                        <div class="contact-input">
                            <label></label>
                        <button type='submit' onclick="document.location='#'" >Submit</button>          </div>
                            
                        </form>
                    </div> 

            <?php
            }else{
            
            ?>
            
            <h1 >Form sent successfully</h1>
            <a href="index.html"><h1>back to home</h1></a>
            
            <?php }?>
    
</body>
</html>
