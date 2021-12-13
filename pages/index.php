<!doctype html>
    <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../css/style.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
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
include 'config2.php';
$msg = array(
    "status" => 0,
    "mesage" => ""
);

if(isset($_POST['submit_con'])){
    $name = mysqli_real_escape_string($db, $_POST['name']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $telefon = mysqli_real_escape_string($db, $_POST['telefon']);

    if (empty($email)) {
        $emailErr = "Email is required";
        $msg["mesage"] = $emailErr;
      } 
    elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          $emailErr = "Invalid email format";
          $msg["mesage"] = $emailErr;

        }
      

    elseif(empty($name)) {  
        $nameErr = "Nu ati introdus numele";  
        $msg["mesage"] = $nameErr;

    } 
    elseif (strlen($_POST['telefon']) < 10){
           $telefonErr = "Parola e prea scurtă..";
           $msg["mesage"] = $telefonErr;
      }
      else{

    $sql = "INSERT INTO contacts (nume, email, telefon) VALUES('$name','$email','$telefon')";
    mysqli_query($db, $sql);
    $msg["mesage"] = "Datele au fost introduse in baza de date!";
    $msg["status"] = 1;
}

}
echo json_encode($msg);
?> 

    <div class="form-group">
    <b> <label for="nume"> Nume </label> </b>
    <input type="text" class="form-control" id="nume" placeholder="Nume"  name="name" autocomplete="off">
  </div>

   <div class="form-group">
   <b>  <label for="email">Email</label> </b>
    <input type="Email" class="form-control" id="email" name="email" placeholder="Introduceti email-ul dvs veridic" autocomplete="off">
    <span id="emailMsg"> </span> 
  </div>
   
   <div class="form-group">
   <b> <label for="telefon">Telefon</label> </b>
    <input type="tel" class="form-control" id="telefon" name="telefon" placeholder="Introduceti numarul dvs" autocomplete="off">
    <span id="telMsg"> </span>
  </div>
  <input name="submit" type="submit" id="submit" class="submit" value="Submit">
</form> 

</div> 



<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
 <script type="text/javascript">


$(document).ready(function(){
  $("#registration").validate({
            rules:{
                name:{
                    required: true,
                    noSpace: true,
                    lettersonly: true
                },
                email: {
                    required: true,
                    email: true,
                },

                telefon: {
                    matches: "[0-9]+",
                    minlength:10,
                    maxlength:10
                }

            },
            messages:{
                email: {
                    required: "Introduceți emailul.",
                    email: "Emailul este greșit."
                },

                telefon {
                    minlength: "Parola trebuie să conțină minim 10 caractere."
                },

                name:{
                    required: "Introduceti numele.",
                    noSpace: "Trebuie să scriți ceva.",
                    lettersonly: "Introduceți doar litere."
                   
                }

            },

            submitHandler: function(form, event) {
                event.preventDefault();
                var submit =$("#submit").val();
                var name =$("#name").val();
                var email =$("#email").val();
                var telefon =$("#telefon").val();
                
                $.ajax({
                    type: 'POST',
                    cache: false,
                    data: {'submit':submit, 'name':name, 'email':email, 'telefon': telefon},
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
            
        })
    }
})
  
            
  </script>
  </body>
  </html>