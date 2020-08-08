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
        $email = $_POST['email'];
        $password = $_POST['password'];

        $email_search = "select * from registration where email='$email' ";
        $query = mysqli_query($con, $email_search);

        $email_count = mysqli_num_rows($query);

        if($email_count){
            $email_pass = mysqli_fetch_assoc($query);

            $db_pass= $email_pass['password'];

            $pass_decode = password_verify($password, $db_pass );

            if($pass_decode)
            {
                echo "login successful";
                
            }
            else
            {
                echo "password incorrect";
            }
}
           else
            {
                echo "invalid email";
            }
 }

    ?>

        


        <div class="card bg-light">
        <article class="card-body mx-auto" style="mx-width: 400px;">
            <h4 class="card-title mt-3 text-center">Login Page</h4>
            <p class="text-center">Get started with your free account</p>
            <p>
               <a href="" class="btn btn-block btn-gmail"> <i class="fa fa-google"> </i> Login via Gmail</a>
               <a href="" class="btn btn-block btn-facebook"> <i class="fa fa-facebook"> </i> Login via Facebook</a>
            </p>   
            <p class="divider-text">
                <span class="bg-light">OR</span>
           </p>
           <form action=" <?php echo htmlentities($_SERVER['PHP_SELF']); ?> " method="POST">
            <div class="form-group input-group">
                <div classs="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                </div>
                <input name="email" class="form-control" placeholder="Enter Email" type="email">
            </div>

            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                </div>
                        <input class="form-control" placeholder="Confirm password" type="password" name="password" value="" required>
            </div>

            <div class="form-group">
                <button type="submit" name="submit" class="btn btn-primary btn-block"> Login</button>
            </div>
            <p class="text-center">Forgot Password, No Worries - <a href="recover_email.php">Click Here</a> </p>
            <p class="text-center">Not have an account? <a href="registration.php">SignUp Here </a> </p>


        </form>
    </article>

            </div>

</body>
</html>




?>
