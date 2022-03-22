<?php 
include 'config/db_connect.php';
session_start();
if(isset($_POST['submit'])){
  $email = $_POST['email'];
  $password = md5($_POST['password']);

  $result = mysqli_query($connB, "SELECT * FROM `users` WHERE email='$email' AND password='$password'");

  
  if($result->num_rows > 0){
$row = mysqli_fetch_assoc($result);
$_SESSION['username'] = $row['username']; 
header("Location: add.php");

  }else{
    echo 'something wrong with password or email';
  }
}
?>
<!DOCTYPE html>
<html lang="en">

  <?php include('templates/header.php') ?>
  <div class="container">
    <form action="" method="POST" class="login-email">
      <p class="login-text" style="font-size:2 rem; font-weight: 800;">
      login
      </p>
      <p><?php echo $success ?></p>
      <div class="input-group">
        <input required type="email"  placeholder="email" value="<?php echo $email ?>" name="email" class="email">
      </div>
<div class="input-group">
        <input required type="password" value="<?php echo $_POST['password']; ?>" name="password" placeholder="password" class="password">
      </div>
      <div class="input-group">
        <button class="btn" name="submit">login</button>
      </div>
      <p class="login-register-text">don't have a account? <a href="register.php">register</a></p>
    </form>
  </div>

  <?php include('templates/footer.php') ?>


</html>