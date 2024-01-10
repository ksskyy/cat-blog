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
    if($_POST['username'] =="" || $_POST['email']==""|| $_POST['password']==""){
        echo "please enter your info";
    }else{
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = password_hash($_POST['password'],PASSWORD_DEFAULT);

        $insert = $conn->prepare("INSERT INTO users (email, username, mypassword) VALUES (:email,:username,:mypassword)");

        $insert->execute([
            ':email' => $email,
            ':username' => $username,
            ':mypassword' => $password
        ]);
        header("location:login.php");
        exit;
    }
}
?>
            <form method="POST" action="register.php">
              <!-- Email input -->
              <div class="form-outline mb-4">
                <input type="email" name="email" id="form2Example1" class="form-control" placeholder="Email" />
               
              </div>

              <div class="form-outline mb-4">
                <input type="" name="username" id="form2Example1" class="form-control" placeholder="Username" />
               
              </div>

              <!-- Password input -->
              <div class="form-outline mb-4">
                <input type="password" name="password" id="form2Example2" placeholder="Password" class="form-control" />
                
              </div>



              <!-- Submit button -->
              <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">Register</button>

              <!-- Register buttons -->
              <div class="text-center">
                <p>Aleardy a member? <a href="login.php">Login</a></p>
                

               
              </div>
            </form>
<?php require_once "../includes/footer.php";?>


