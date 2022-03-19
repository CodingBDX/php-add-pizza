<?php 
include('../tuto/config/db_connect.php');

if(isset($_POST['delete'])) {
  $id_to_delete = mysqli_real_escape_string($conn, $_POST['id_to_delete']);
  $sql = "DELETE  FROM pizzas WHERE id = $id_to_delete";
  
  if(mysqli_query($conn, $sql)){
header('Location:index.php');
  }else {
    //error
    echo 'query error' . mysqli_error($conn);
  }
}

if(isset($_GET['id'])) {
$id = mysqli_real_escape_string($conn, $_GET['id']);

$sql = "SELECT * FROM pizzas WHERE id = $id";

$result = mysqli_query($conn, $sql);

$pizza = mysqli_fetch_assoc($result);

mysqli_free_result($result);
mysqli_close($conn);

}
?>
<!DOCTYPE html>
<html lang="en">
<?php include('templates/header.php')?>
<h2 class="center">Details</h2>
<div class="container center">
  <?php if($pizza): ?>
    <h4><?php echo htmlspecialchars( $pizza['title']); ?></h4>
    <p>created by:<?php echo htmlspecialchars( $pizza['email']); ?></p>
    <p>created at:<?php date( $pizza['created_at']); ?></p>
    <div><?php echo htmlspecialchars( $pizza['ingredients']); ?></div>
    <form action="details.php" method="POST">
      <input type="hidden" value="<?php echo $pizza['id'] ?>" name="id_to_delete">
      <input type="submit" name="delete" value="Delete" class="btn red z-depth-0">
    </form>
<?php else: ?>
  <h5 class='red-text'>no pizza here!</h5>
    <?php endif; ?>
</div>
<?php include('templates/footer.php')?>

</html>