<?php  
$firstnameErr = $lastnameErr = $emailErr = $passwordErr = "";  
$firstname = $lastname = $email = $password = "";  
  
if ($_SERVER["REQUEST_METHOD"] == "POST") {  
      if (empty($_POST["firstname"])) {  
         $firstnameErr = "Numele nu a fost introdus.";  
    } else {  
        $fisrtname = ($_POST["firstname"]);  
            if (!preg_match("/^[a-zA-Z ]*$/",$firstname)) {  
                $firstnameErr = "Sunt permise doar litere.";  
            }  
    }  

      if (empty($_POST["lastname"])) {  
         $lastnameErr = "Prenumele nu a fost introdus.";  
    } else {  
        $lastname = ($_POST["lastname"]);  
            if (!preg_match("/^[a-zA-Z ]*$/",$lastname)) {  
                $lastnameErr = "Sunt permise doar litere.";  
            }  
    }  
  
    if (empty($_POST["email"])) {  
            $emailErr = "Email-ul nu a fost introdus.";  
    } else {  
            $email = ($_POST["email"]);  
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {  
                $emailErr = "Invalid email format";  
            }  
     }  
    
     if (empty($_POST["password"])) {  
            $passwordErr = "Parola nu a fost introdusă."; 
            } 

         }
      
?>  




<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" type="text/css" href="../css/style.css" />
     <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <title>Sign up</title>
</head>
<style>

  body{
      background-color: #ffe4e1;
      }
  #submit{
     width: 150px;  
    height: 30px;  
    border: none;  
    border-radius: 17px;  
    padding-left: 7px;  
    margin-left: 90px;
    color: whitesmoke;  
    background-color: green;
  }

  label,
  input,
  button {
    border: 0;
    margin-bottom: 3px;
    display: block;
    width: 100%;
    height: 25px;

  }
 .SignUpBox {
        margin: auto;  
        color: #999;
        border-radius: 3px;
        background: #f2f3f7;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        padding: 60px; 
        height: 590px;
        width: 350px;

   }
 #textsignin {
    text-align: center;
    color: grey;
    font-size: 19px;
 }

</style>
<body>

     <aside> 
        <a href="index.html"> Acasă </a>
        <a href="partea2.html"> Preparare</a>
        <a href="partea3.html"> Rețete  </a> 
        <a href="index.php"> Contacte  </a> 
 
    </aside>

      <div class="SignUpBox">
<?php  
    if(isset($_POST['submit'])) {  
    if($firstnameErr == "" && $lastnameErr == "" && $emailErr == "" && $passwordErr == "") {  
        echo "<p style='color: green; text-align: center; font-size: 20px;'>   Vă mulțumim  ".$_POST['firstname']." ".$_POST['lastname']." !<br /> 
        V-ați înregistrat cu succes. </p>";
    } else {  
        echo "<p style='color:red; text-align: center;' '> <b>Forma nu este completata CORECT!</b> </p>";  
    }  
    }  
?>  

        <h2 style="text-align: center; font-size: 26 px; color: #636363; font-family: arial"> Sign up</h2>
            <form method="POST"name="registration" id="registration">
 
            <label for="firstname">First Name</label>
            <input type="text" name="firstname" id="firstname"><br>
             <span class="error">* <?php echo $firstnameErr; ?> </span>  
             <br><br>  
 
            <label for="lastname">Last Name</label>
            <input type="text" name="lastname" id="lastname" ><br>
             <span class="error">* <?php echo $lastnameErr; ?> </span>  
             <br><br>  
 
            <label for="email">Email</label>
            <input type="email" name="email" id="email" placeholder=""><br>
             <span class="error">* <?php echo $emailErr; ?> </span>  
             <br><br>  
 
            <label for="password">Password</label>
            <input type="password" name="password" id="password" placeholder=""><br>
             <span class="error">* <?php echo $passwordErr; ?> </span>  
             <br><br>  
 
            <input name="submit" type="submit" id="submit" class="submit" value="Submit">
           <br> <div id="textsignin">Already have an account? <a style="text-decoration: none; color: black;" href="logare.php">Sign in</a></div>
            </form>
       </div>

<script type="text/javascript">
$(document).ready(function(){
  $("#registration").validate({
    rules: {
      firstname: "required",
      lastname: "required",
      email: {
        required: true,
        email: true
      },
      password: {
        required: true,
        minlength: 7
      }
    },
  
  });
});
</script>
 
</body>
</html>