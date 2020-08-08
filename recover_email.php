  <?php

  session_start();

  ?>  


    <!DOCTYPE html>
<html>
    <head>
        <title>registration</title>
        <?php include 'style.css' ?>
        <?php include 'links.php' ?>
    </head>
    <body>


      <?php

      include 'dbcon.php';


      if(isset($_POST['submit'])){

        $email =mysqli_real_escape_string($con, $_POST['email']);
      



        $emailquery = " select * from registration where email='$email' ";
        $query = mysqli_query($con, $emailquery);

        $emailcount = mysqli_num_rows($query);

        if($emailcount){
            
            $userdata = mysqli_fetch_array($query);

            $username = $userdata['username'];
            $token = $userdata['token'];
       
       $subject = "Reset Password";
       $body = "Hi, $username. Click here to reset  your password
       http://localhost/shalu/reset_password.php?token=$token " ;
       $sender_email = "From: iraveni182@gmail.com";


       if(mail($email, $subject, $body, $sender_email))
        {$_SESSION['msg'] = "check your mail to reset your password $email";
      header('location:login.php');
    }
    else{
      echo "Email sending failed..";
    }

    }else
    {
      echo "Entered Email doesn't match our database. Please enter valid email.";
    }          
                                                        
     }




?>
        <div class="card bg-light">
        <article class="card-body mx-auto" style="mx-width: 400px;">
            <h4 class="card-title mt-3 text-center">Recover your password</h4>
            <p class="text-center">Type in your registered email-id in order to recover your password</p> 
            
           
           <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
               
                   <div class="form group input-group">
                       <div class="input-group-prepend">
                           <span class="input-group-text"> <i class=" fa fa-envelop"> </i> </span>
                       </div>
                       <input name="email" class="form-control" placeholder="Email address" type="email" required>
                   </div> <!--form-group/-->
                   
                
                   <div class="form-group">
                       <button type="submit" name="submit" class="btn btn-primary btn-block ">Send Mail</button>
                   </div> <!--form-group//-->
                   <p class="text-center">Have an account? <a href="login.php">Log In</a></p>
            </form>
        </article>
        </div> <!--card.//-->
    </body>
</html>


                                       

