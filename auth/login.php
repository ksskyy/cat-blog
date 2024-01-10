<?php 
require_once "../includes/navbar.php";
require_once "../includes/header.php";
require_once "../config/config.php";
?>
<?php
if(isset($_SESSION['username'])){
    header("location: http://localhost/clean-blog/index.php");
    exit;
}
if(isset($_POST['submit'])){
    if(empty($_POST['email'])||empty($_POST['password'])){
        echo "please enter you info";
    }else{
        $email = $_POST['email'];
        $password = $_POST['password'];

        $login = $conn->query("SELECT * FROM users WHERE email ='$email'");

        $login->execute();

        $row = $login->FETCH(PDO::FETCH_ASSOC);

        if( $login->rowCount() > 0){
            if(password_verify($password, $row['mypassword'])){
                $_SESSION['username']=$row['username'];
                $_SESSION['user_id']=$row['id'];
                header('Location: /clean-blog/index.php');
                exit;
                // echo "logged";
            }else{
                echo "please enter your right info";
            }
        }
    }
}
?>

               <form method="POST" action="login.php">
                  <!-- Email input -->
                  <div class="form-outline mb-4">
                    <input type="email" name="email" id="form2Example1" class="form-control" placeholder="Email" />
                   
                  </div>

                  
                  <!-- Password input -->
                  <div class="form-outline mb-4">
                    <input type="password" name="password" id="form2Example2" placeholder="Password" class="form-control" />
                    
                  </div>



                  <!-- Submit button -->
                  <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">Login</button>

                  <!-- Register buttons -->
                  <div class="text-center">
                    <p>a new member? Create an acount<a href="register.php"> Register</a></p>
                    

                   
                  </div>
                </form>

           
<?php require_once "../includes/footer.php";?>