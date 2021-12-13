<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" type="text/css" href="../css/style.css" />
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
        height: 600px;
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

include 'config.php';

$msg = array(
  "status" => 0,
  "mesage" => ""
);

if(isset($_POST['submit'])){
    $nume = $_POST['nume'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $cpassword = md5($_POST['cpassword']);

    if (empty($email)) {
      $emailErr = "Email is required";
      $msg['mesage'] = $emailErr;
    } 
  elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format";
        $msg['mesage'] = $emailErr;
        
      }

      else {
        if ($password === $cpassword) {
            $password = trim($password);
            $sql = "INSERT INTO users (email, password) VALUES('$email','$password')";
            mysqli_query($db, $sql); 
            $msg["mesage"] = "Datele au fost introduse in baza!";
            $msg["status"] = 1;
         }
         else {
            $cpasswordErr = "Parolele nu coincid..";
            $msg["mesage"] = $cpasswordErr;

            
         }      
      }
     
}
echo json_encode($msg);

?>  

        <h2 style="text-align: center; font-size: 26 px; color: #636363; font-family: arial"> Sign up</h2>
            <form method="POST"name="registration" id="registration">
 
            <label for="firstname">User Name</label>
            <input type="text" name="nume" id="firstname"><br>
 
            <label for="email">Email</label>
            <input type="email" name="email" id="email" ><br>  
 
            <label for="password">Password</label>
            <input type="password" name="password" id="password" ><br>

             <label for="password">Confirm Password</label>
            <input type="password" name="cpassword" id="cpassword"><br>
 
            <input name="submit" type="submit" id="submit" class="submit" value="Submit">
           <br> <div id="textsignin">Already have an account? <a style="text-decoration: none; color: black;" href="logare.php">Sign in</a></div>
        
            </form>
       </div>

    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
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

    submitHandler: function(form, event) {
                event.preventDefault();
                var submit =$("#submit").val();
                var email =$("#email").val();
                var password =$("#password").val();
                var conpassword =$("#cpassword").val();         
                console.log(email);
                console.log(password);
                
                
                $.ajax({
                    type: 'POST',
                    cache: false,
                    data: {'submit': submit,'email': email, 'password': password, 'cpassword': cpassword},
                    dataType: 'json',
                    success: function(data){
                        console.log(data);
                        if(!data)
                        alert('Something went wrong..');
                        else
                        $("#registration").trigger("reset");
                    }
                })
    }
  
  });
});
</script>
</body>
</html>