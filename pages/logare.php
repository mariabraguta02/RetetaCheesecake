
<?php  
$emailErr = $passwordErr = "";  
$email = $password = "";  

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


?>


<!DOCTYPE html>    
<html>    
<head>     
    <meta charset="UTF-8" />   
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
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
#pass{  
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


        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" >
<br><br>  

<?php  
    if(isset($_POST['submit'])) {  
    if($emailErr == "" && $passwordErr == "") {  
        echo "<p style='color: green; text-align: center; font-size: 20px;'> V-ați logat cu succes. </p>";
    } else {  
        echo "<p style='color:red; text-align: center;' '> <b>Forma nu este completata!</b> </p>";  
    }  
    }  
?>  


        <h1 id="textsignin"> Sign in</h1>
        <label>Email</label>    
        <input type="Email" name="email" id="email" placeholder="Email"> <span id="emailMsg"> </span> <br><br>   
        <label>Password</label>    
        <input type="Password" name="password" id="pass" placeholder="Password">    
       <span id="passMsg"> </span> <br><br>     
       <input name="submit" type="submit" id="submit" class="submit" value="Submit">
        <br><br>Don't have an account? <a style="text-decoration: none; color: black;" href="signup.php">Create one</a>  
      </form>     
     </div>   

 <script type="text/javascript">
    $(document).ready(function(){
        $("#email").keyup(function(){
            if(validateEmail()){
                $("#email").css("border","2px solid green");
                $("#emailMsg").html("<p class='text-success'>Validated</p>");
            }else{
                $("#email").css("border","2px solid red");
                $("#emailMsg").html("<p class='text-danger'>Un-validated</p>");
            }
        });
        
        $("#pass").keyup(function(){
            if(validatePassword()){
                $("#pass").css("border","2px solid green");
                $("#passMsg").html("<p class='text-success'>Password validated</p>");
            }else{
                $("#pass").css("border","2px solid red");
                $("#passMsg").html("<p class='text-danger'>Password not valid</p>");
            }
        });
    });

    function validateEmail(){
        var email=$("#email").val();
         var reg = /^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/
         if(reg.test(email)){
            return true;
         }else{
            return false;
         }

    }
    function validatePassword(){
        var pass=$("#pass").val();
        if(pass.length > 7){
            return true;
        }else{
            return false;
        }

    }
</script>

</body>    
</html>     