<?php 
    session_start();
    if(!isset($_SESSION['RegState'])){
         $_SESSION['RegState'] = 0;
    }
    if(!isset($_SESSION['RememberFlag'])){
         $_SESSION['RememberFlag'] = 0;
    }
if(!isset($_SESSION['Email'])){
         $_SESSION['Email'] = '';
    }
if(!isset($_SESSION['Password'])){
         $_SESSION['Password'] = '';
    }
    //when you start a session you can access all session variable youve left last time
    //use $_SESSION["RegState"] to control views  ( RegState == registration state
?>

<!doctype html>
<html lang="en">
 <!-- views
 regState(0) = navigation to and from signin->register  signin->forgot-password
 regState(1) = blocking state
 regState(2) = registration authentification done register -> setPassword
 regState(9) = setPassword -> login
 regState(3) = blocking state from forgotPassword -> setForgottenPassword
 regState(9) = setForgotPassword -> login
 regState(9) = signin -> login
 regState(11) = failure to signin
 #ca434e
  -->
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="soundQ">
    <meta name="author" content="Mary Davy Guillermo">
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/signin.css" rel="stylesheet">
    <!-- ok here we will include the jquery script source and then scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src='https://www.google.com/recaptcha/api.js'></script>
    
    <script>
        
        $(document).ready(function(){
            var regState = '<?php echo $_SESSION['RegState'];?>';
            var rFlag = <?php echo $_SESSION['RememberFlag'];?>;
            if(regState == 0){
                //first registration phase         
                //user wants to log-in
                //user wants to register
                //user wants to start password recovery process
                if(rFlag == 1){
                    var Email = '<?php echo $_SESSION['Email'];?>';
                    $("#inputEmail").val(Email);
                    var Password = '<?php echo $_SESSION['Password'];?>';
                    $("#inputPassword").val(Password);
                    
                }
                
                
                $("#form-signin").show();
                $("#failure").hide();
                $("#register").hide();
                $("#setPassword").hide();
                $("#forgotPassword").hide();
                $("#setForgotPassword").hide();
                $("#checkEmail").hide();
            
            $("#registerButton").click(function(e){
                e.preventDefault();
               $("#form-signin").hide();
                $("#register").show();
                $("#setPassword").hide();
                $("#forgotPassword").hide();
                $("#setForgotPassword").hide();
                $("#failure").hide();
                $("#checkEmail").hide();
            });
            $(".goBack").click(function(e){
                e.preventDefault();
               $("#form-signin").show();
                $("#register").hide();
                $("#setPassword").hide();
                $("#forgotPassword").hide();
                $("#setForgotPassword").hide();
                $("#failure").hide();
                $("#checkEmail").hide();
            });
            $("#forgotPasswordButton").click(function(e){
                e.preventDefault();
               $("#form-signin").hide();
                $("#register").hide();
                $("#setPassword").hide();
                $("#forgotPassword").show();
                $("#setForgotPassword").hide(); 
                $("#failure").hide();
                $("#checkEmail").hide();
            });
            $("#sendRegistrationEmail").click(function(){
               $("#form-signin").hide();
                $("#register").hide();
                $("#setPassword").show();
                $("#forgotPassword").hide();
                $("#setForgotPassword").hide();
                $("#failure").hide();
                $("#checkEmail").hide();
            });                    
                
            }
            if(regState == 1){
                //user is registering
                //user entered email 
                //user now wants password to set to register
                $("#form-signin").hide();
                $("#register").hide();
                $("#setPassword").hide();
                $("#forgotPassword").hide();
                $("#setForgotPassword").hide();
                $("#failure").hide();
                $("#checkEmail").show();
            }
            if(regState == 2){
                //the user is trying to register
                //user wants is now setting password
                
                $("#form-signin").hide();
                $("#register").hide();
                $("#setPassword").show();
                $("#forgotPassword").hide();
                $("#setForgotPassword").hide();
                $(".goBack").hide();
                $("#failure").hide();
                $("#checkEmail").hide();
                
            }
            if(regState == 3){
                //the user forgot password
                //user wants to reset password block
                
                $("#form-signin").hide();
                $("#register").hide();
                $("#setPassword").hide();
                $("#forgotPassword").hide();
                $("#setForgotPassword").show();
                $(".goBack").hide();
                $("#failure").hide();
                $("#checkEmail").hide();
                
            }
            //failure
            if(regState == 11){
                $("#form-signin").hide();
                $("#register").hide();
                $("#setPassword").hide();
                $("#forgotPassword").hide();
                $("#setForgotPassword").hide();
                $("#failure").show();
                $("#checkEmail").hide();
                
            }
            
            if(regState == 9){
                $("#form-signin").hide();
                $("#register").hide();
                $("#setPassword").hide();
                $("#forgotPassword").hide();
                $("#setForgotPassword").hide();
                $("#failure").hide();
                $("#checkEmail").hide();
            }
            
            });
        
    </script> 
    
    <title>Lab 2</title>

  </head>

  <body class="text-center">
    <form id = "form-signin" class = "signin" method="get" action = "php/signin.php">
      <img class="mb-4" src="images/logo.png" alt="" width="500" height="400">
      <h1 class="h2 mb-3 font-weight-normal">Hey, sign in!</h1>
      <label for="inputEmail" class="sr-only">Email address</label>
      <input type="email" name = "Email" id="inputEmail" class="form-control" placeholder="Email address" autofocus>
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" name = "Password" id="inputPassword" class="form-control" placeholder="Password">
      <div class="checkbox">
        <label><input name = "check" type="checkbox"> Remember me</label>
      </div>
      <button class="btn btn-lg btn-primary btn-block signing" name = "signin" type="submit" id = "form-signinSubmit">Sign in</button>
      <div class = "secondButtons">
          <button style="width: 40%; float: left; font-size: 12px;border-right-width:thick" class="btn btn-sm btn-primary btn-block" id  = "registerButton" >Register</button>
          <button style="border-right: 0; border-left-width:thick;  width: 60%; float: right; font-size: 12px" class="btn btn-sm btn-primary btn-block" id = "forgotPasswordButton" >Forgot password!</button>
      </div>
      <div class="g-recaptcha" data-sitekey="6LdTGlMUAAAAAJ0omiF94bX0oz2KGDOYdtzq2mb0"></div>
      <p class="mt-5 mb-3 text-muted">2018</p>
    </form>
    
    <form id ="register" class = "signin" action = "php/register.php" method="get">
        <img class="mb-4" src="images/Images WORK-07.png" alt="" width="200" height="200">
      <h1 class="h2 mb-3 font-weight-normal">Register Here</h1>
      <div class = "secondRegLine">
          <label for="inputPassword" class="sr-only">firstname</label>
          <input style="width: 50%; float: left; border-width: 3px; border-color: red; border-radius: 15px;" type="text" id="inputRegisterfirst" name = "firstname" class="form-control" placeholder="firstname" >
          <label for="inputPassword" class="sr-only">lastname</label>
          <input style="width: 50%; float: right; border-width: 3px; border-color: red; border-radius: 15px; " type="text" id="inputRegisterlast" name = "lastname" class="form-control" placeholder="lastname">
      </div>
      <label for="inputEmail" class="sr-only">Email Address</label>
      <input style="border-width: 3px; border-color: red; border-radius: 15px;" type="email" id="inputRegisterEmail" name = "Email" class="form-control" placeholder="email address" autofocus>
      <div class = "secondRegLine">
          <label for="inputPassword" class="sr-only">password</label>
          <input style="width: 50%; float: left; border-width: 3px; border-color: red; border-radius: 15px;" type="password" id="inputRegisterpass" name = "password" class="form-control" placeholder="password" >
          <label for="inputPassword" class="sr-only">repassword</label>
          <input style="width: 50%; float: right; border-width: 3px; border-radius: 15px; border-color: #32006f; " type="password" id="inputRegisterrepass" name = "repassword" class="form-control" placeholder="re-enter password">
      </div> 
      <button class="btn btn-lg btn-primary btn-block" id = "sendRegistrationButton" type="submit">Register</button>
      <div class = "secondButtons">     
          <button style=" float: left; font-size: 12px;border: 0" class="btn btn-sm btn-primary btn-block goBack">Go Back!</button>
      </div>
      <div class="g-recaptcha" data-sitekey="6LdTGlMUAAAAAJ0omiF94bX0oz2KGDOYdtzq2mb0"></div>
      <p class="mt-5 mb-3 text-muted">2018</p>
    </form>
    
    <form id ="setPassword" class = "signin" action = "php/setPassword.php" method="get">
        <img class="mb-4" src="images/Images WORK-07.png" alt="" width="200" height="200">
      <h1 class="h2 mb-3 font-weight-normal">Now Pick a Password!</h1>
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" name = "Password" id="inputSetPassword" class="form-control" placeholder="Password">
      <div class="checkbox mb-3">
      </div>
      <button class="btn btn-lg btn-primary btn-block signin" type="submit">Let's Get To It</button>
      <div class = "secondButtons">
          <button style="float: left; font-size: 12px;border:0" class="btn btn-sm btn-primary btn-block goBack" >Go Back!</button>
          
      </div>
      <p class="mt-5 mb-3 text-muted">2018</p>
    </form>
    <form id="forgotPassword" class = "signin" action = "php/forgotPassword.php"method = "get">
        <img class="mb-4" src="images/Images WORK-07.png" alt="" width="200" height="200">
      <h1 class="h2 mb-3 font-weight-normal">Let's Fix That, What's Your Email?</h1>
      <label for="inputEmail" class="sr-only">Email address</label>
      <input type="email" name = "Email" id="inputForgotPasswordEmail" class="form-control" placeholder="Email address" required autofocus>
      <div class="checkbox mb-3">
      </div>
      <button class="btn btn-lg btn-primary btn-block" id = "recoverButton" type="submit">Next Step</button>
      <div class = "secondButtons">
          <button style=" float: left; font-size: 12px;" class="btn btn-sm btn-primary btn-block goBack" type="submit">Go Back!</button>
          
      </div>
      <p class="mt-5 mb-3 text-muted">2018</p>
    </form>
    <form id="setForgotPassword" class = "signin" action = "php/resetPassword.php" method="get">
        <img class="mb-4" src="images/Images WORK-07.png" alt="" width="200" height="200">
      <h1 class="h2 mb-3 font-weight-normal">Almost There!</h1>
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" name = "Password" id="inputNewPassword" class="form-control" placeholder="Password" required>
      <div class="checkbox mb-3">                  
      </div>
      <button class="btn btn-lg btn-primary btn-block signin" type="submit">Set</button>
      <div class = "secondButtons">
          <button style=" float: left; font-size: 12px;" class="btn btn-sm btn-primary btn-block goBack" type="submit">Go Back!</button>
      </div>
      <p class="mt-5 mb-3 text-muted">2018</p>
    </form>
    <form id="failure" class = "signin" action = "php/failure.php" method="post">
        <img class="mb-4" src="images/Images WORK-07.png" alt="" width="200" height="200">
      <h1 class="h2 mb-3 font-weight-normal">Hmmmmm, try again</h1>
          <div class = "failureBack">
          <button style=" float: left; font-size: 12px;border: 0" class="btn btn-sm btn-primary btn-block goBack">Go Back!</button>
      </div>
      <p class="mt-5 mb-3 text-muted">2018</p>
    </form>
    <form id="checkEmail" class = "signin">
        <img class="mb-4" src="images/Images WORK-07.png" alt="" width="200" height="200">
      <h1 class="h2 mb-3 font-weight-normal">Go check your email!!!</h1>
    </form>
    
  </body>
</html>
