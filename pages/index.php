<?php  
$nameErr = $emailErr = $telefonErr = "";  
$name = $email = $telefon = "";  
  
if ($_SERVER["REQUEST_METHOD"] == "POST") {  
      if (empty($_POST["name"])) {  
         $nameErr = "Numele nu a fost introdus.";  
    } else {  
        $name = ($_POST["name"]);  
            if (!preg_match("/^[a-zA-Z ]*$/",$name)) {  
                $nameErr = "Sunt permise doar litere.";  
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
    
    if (empty($_POST["telefon"])) {  
            $telefonErr = "Numărul de telefon nu a fost introdus.";  
    } else {  
            $telefon = ($_POST["telefon"]);  
            if (!preg_match ("/^[0-9]*$/", $telefon) ) {  
            $telefonErr = "Sunt permise doar cifre.";  
            }  
       

         }

     }
      
?>  






<!doctype html>
    <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../css/style.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>

  </head>

  <body>

<style> 
  body{
       background-color: #ffe4e1;
    }
</style>
 
 <aside> 
        
      
        <a href="index.html"> Acasă </a>
        <a href="partea2.html"> Preparare</a>
        <a href="partea3.html"> Rețete </a> 
        <a href="index.php"> Contacte  </a> 
 
    </aside>


  <h1 style="color: black ; text-shadow: 6px 6px 8px lightgreen; text-align: center; padding-top: 70px; "> Contacte </h1>
  <h2 style="font-size: 15px;"  > *Pentru a primi săptămânal mai multe rețete, vă îndemnăm să completați formularul de mai jos. Toate rețele vor fi transmise pe email-ul dvs.</h2>

  
<div class="container">

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" >
<br><br>  

<?php  
    if(isset($_POST['submit'])) {  
    if($nameErr == "" && $emailErr == "" && $telefonErr == "") {  
        echo "<p style='color: green; text-align: center; font-size: 20px;'> Vă mulțumim! Datele au fost salvate cu succes. </p>";
    } else {  
        echo "<p style='color:red; text-align: center;' '> <b>Forma nu este completata!</b> </p>";  
    }  
    }  
?>  

    <div class="form-group">
    <b> <label for="nume"> Nume </label> </b>
    <input type="text" class="form-control" id="nume" placeholder="Nume"  name="name" autocomplete="off">
     <span class="error">* <?php echo $nameErr; ?> </span>  
    <br><br>  
  </div>

   <div class="form-group">
   <b>  <label for="email">Email</label> </b>
    <input type="Email" class="form-control" id="email" name="email" placeholder="Introduceti email-ul dvs veridic" autocomplete="off">
    <span id="emailMsg"> </span>
      <span class="error">* <?php echo $emailErr; ?> </span>  
    <br><br>  
  </div>
   
   <div class="form-group">
   <b> <label for="telefon">Telefon</label> </b>
    <input type="tel" class="form-control" id="telefon" name="telefon" placeholder="Introduceti numarul dvs" autocomplete="off">
    <span id="telMsg"> </span>
    <span class="error">* <?php echo $telefonErr; ?> </span>  
    <br><br>  
  </div>
  <input name="submit" type="submit" id="submit" class="submit" value="Submit">
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
        
        $("#telefon").keyup(function(){
            if(validateTelephone()){
                $("#telefon").css("border","2px solid green");
                $("#telMsg").html("<p class='text-success'>Telephone validated</p>");
            }else{
                $("#telefon").css("border","2px solid red");
                $("#telMsg").html("<p class='text-danger'>Telephone not valid</p>");
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


     function validateTelephone(){
        var telefon=$("#telefon").val();
         var reg = /^((\+[1-9]{1,4}[ \-]*)|(\([0-9]{2,3}\)[ \-]*)|([0-9]{2,4})[ \-]*)*?[0-9]{3,4}?[ \-]*[0-9]{3,4}?$/;
         if(reg.test(telefon)){
            return true;
         }else{
            return false;
         }

    }

  
            
  </script>
  </body>
  </html>