<?php 
include 'config/db_connect.php';


if(isset($_POST['submit'])){
$username = $_POST['username'];
$email = $_POST['email'];
$password = md5($_POST['password']);
$cpassword = md5($_POST['cpassword']);

if($password == $cpassword){
  $result = mysqli_query($connB, "SELECT * FROM `users` WHERE email='$email'");
  

  if($result->num_rows > 0){
   $already =  "user already exist";

  }else{
 $result = mysqli_query($connB, "INSERT INTO `users` (username, email, password) VALUES ('$username', '$email', '$password')");

 
 if($result){
   
$username = "";
$email = "";
$_POST['password'] = "";
$_POST['cpassword'] = "";
$success =  "you are register";

header('location:login.php'); 

}else {
   echo "<script>alert('eror register')</script>";

}
}

}else{
   echo "<script>alert('eror register')</script>";

}
}
?>

<!DOCTYPE html>
<html lang="en">
<?php include('templates/header.php') ?>

  <div class="container">
    <form action="register.php" method="POST" class="login-email">
      <p class="login-text" style="font-size:2 rem; font-weight: 800;">
      register
      </p>
      <div class="input-group">
        <input required type="text" value="<?php echo $username ?>"  placeholder="Username" name="username">
      </div>

      <div class="input-group">
        <input required type="email"  placeholder="Email" value="<?php echo $email ?>" name="email">
      </div>
<div class="input-group">
        <input required type="password" value="<?php echo $password ?>"    
         placeholder="password" name="password" class="password">
      </div>
      <div class="input-group">
        <input required type="password"  value="<?php echo $cpassword ?>" placeholder="Confirm password" name="cpassword" class="password">
      </div>
      <p><?php echo $errorCpassword; ?></p>
      <p><?php echo $already; ?></p>

      <div class="input-group">
        <button name="submit" class="btn">register</button>
      </div>
      <p class="login-register-text">have a account? <a href="index.php">register</a></p>
    </form>
  </div>
  <script src="script.js"></script>
<?php include('templates/footer.php') ?>
</html>