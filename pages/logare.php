
<!DOCTYPE html>    
<html>    
<head>     
    <meta charset="UTF-8" />   
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    

    <title>Sign in</title>     
</head>  

<style> 
body  
{  
    margin: 0;  
    padding: 0;  
    background-color: #ffe4e1;
    font-family: 'Arial';  
}  
.login{  
        width: 300px;
        margin: auto;  
        color: #999;
        border-radius: 3px;
        margin-bottom: 15px;
        background: #f2f3f7;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        padding: 60px; 

 } 

label{  
    color: black;  
    font-size: 17px;  
    padding-top: 80px;

}  

#textsignin { 
    color: #636363;
    text-align: center;
    font-size: 26px;
    margin-top: 0; 
    text-decoration: none;
}  

#email{  
    width: 300px;  
    height: 30px;  
    border: none;  
    border-radius: 3px;  
    padding-left: 8px;  
}  
#password{  
    width: 300px;  
    height: 30px;  
    border: none;  
    border-radius: 3px;  
    padding-left: 8px;  
      
}  
#submit{  
    width: 150px;  
    height: 30px;  
    border: none;  
    border-radius: 17px;  
    padding-left: 7px;  
    margin-left: 80px;
    color: whitesmoke;  
    background-color: green;
  
  
}  
span{  
    color: white;  
    font-size: 17px;  
}  

.text-success {
    color: green;
}

.text-danger {
    color: red;
}
  
</style>
<body>    
     <aside> 
        <a href="index.html"> Acasă </a>
        <a href="partea2.html"> Preparare</a>
        <a href="partea3.html"> Rețete  </a> 
        <a href="index.php"> Contacte  </a> 
 
    </aside>

    <h2>Welcome</h2><br> 
     <div class="login">    
      <form name="login" id="login" method="POST"> 


        <form method="post" name="registration" id="registration" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" >
<br><br>  

<?php

include 'config.php';

$msg = array(
    "status" => 0,
    "mesage" => ""
);

session_start();

if(isset($_POST['submit'])){
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $password = md5($_POST['password']);

    if (empty($email)) {
        $emailErr = "Email is required";
        $msg['mesage'] = $emailErr;
      } 
    elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          $emailErr = "Invalid email format";
          $msg['mesage'] = $emailErr;
          
        }
    
     else {
        $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) == 1){
            $row = mysqli_fetch_assoc($result);
            $msg['mesage'] ="Success";
            $msg['status'] =1;
           
            }else{ echo "<p style='color: red; text-align: center; font-size: 20px;'> Parola sau email-ul nu este corect. </p>";


            
         }      
      }
     
}
echo json_encode($msg);
?>  


        <h1 id="textsignin"> Sign in</h1>
        <label>Email</label>    
        <input type="Email" name="email" id="email" placeholder="Email"> 
        <label>Password</label>    
        <input type="Password" name="password" id="password" placeholder="Password">             
       <input name="submit" type="submit" id="submit" class="submit" value="submit">
        <br><br>Don't have an account? <a style="text-decoration: none; color: black;" href="signup.php">Create one</a>  

         <?php if (isset($_SESSION['message'])) : ?>
            <div class="msg">
                <?php
                echo $_SESSION['message'];
                unset($_SESSION['message']);
                ?>
            </div>
        <?php endif ?>

      </form>     
     </div>   
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
 <script type="text/javascript">
$(document).ready(function(){
  $("#registration").validate({
    rules: {
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
                var submit=$("#submit").val();
                var email =$("#email").val();
                var password =$("#password").val();
                console.log(submit);
                console.log(email);
                console.log(password);

                $.ajax({           
                    type: 'POST',
                    cache: false,
                    data: {'submit': submit,'email': email, 'password':password},
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