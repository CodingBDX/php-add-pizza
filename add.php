<?php
include('../tuto/config/db_connect.php');

$title = $email = $ingredients = '';
$errors = array('email'=> '', 'title' => '', 'ingredients' => '');

if(isset($_POST['submit'])){
// echo htmlspecialchars( $_POST['email']);
// echo htmlspecialchars( $_POST['title']);
// echo htmlspecialchars( $_POST['ingredients']);

// email check
if(empty($_POST['email'])){
  $errors['email'] = '<div class="btn red">an email as required</div><br />';
}else {
$email = $_POST['email'];
if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
  $errors['email'] = '<div class="btn red">an email valid must valid</div><br />';

}
}

// title check
if(empty($_POST['title'])){
  $errors['title'] = '<div class="btn red">an title as required</div><br />';
}else {
  $title = $_POST['title'];
  if(!preg_match('/^[a-zA-Z\s]+$/', $title)) {
$errors['title'] = '<div class="btn red">Title must be letters</div><br />';
  }
}

// ingredients check
if(empty($_POST['ingredients'])){
  $errors['ingredients'] = '<div class="btn red">ingredient for pizza!</div><br />';
}else {
  $ingredients = $_POST['ingredients'];
  if(!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/', $ingredients)) {
$errors['ingredients'] = '<div class="btn red">Ingredients must separated by coma</div><br />';
  }
  if(array_filter($errors)) {
    $errors['forminvalid'] = '<div class="btn red">form is valid</div><br />';
      
  } else {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $ingredients = mysqli_real_escape_string($conn, $_POST['ingredients']);
$sql = "INSERT INTO pizzas(email,title,ingredients) VALUES('$email', '$title', '$ingredients')";
if(mysqli_query($conn, $sql)) {
  //success
}else {
  // error
  echo 'query error' . mysqli_error($conn);
}
mysqli_close($conn);
    $errors['formvalid'] = '<div class="btn green">form is send, redirect to index after 5 secondes</div><br />';
    header( "refresh:5;url=index.php" );
  }
}
}
?>

<!DOCTYPE html>
<html lang="en">
<?php include('templates/header.php')?>
<section class="container grey-text">
  <h4 class="center">add a pizza

  </h4>
  <form action="" class="white" action="add.php" method="POST">
    <label for="">your mail:</label>

    <input type="text" name="email" value="<?php echo htmlspecialchars( $email) ?>" >
    <div class="red-text"><?php echo $errors['email'] ?></div>
        <label for="">Pizza title:</label>
    <input type="text" name="title" value="<?php echo htmlspecialchars( $title) ?>">
    <div class="red-text"><?php echo $errors['title'] ?></div>
    <label for="">ingredients (comma separated):</label>
    <input type="text" name="ingredients" value="<?php echo htmlspecialchars( $ingredients) ?>">
    <div class="red-text"><?php echo $errors['ingredients'] ?></div>
<div class="center">
    <div class="red-text"><?php echo $errors['forminvalid'] ?></div>
    <div class="red-text"><?php echo $errors['formvalid'] ?></div>

  <input type="submit" name="submit" value="btn" class="btn brand z-depth-0">
</div>
  </form>
</section>
<?php include('templates/footer.php')?>

</html>