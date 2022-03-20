<?php

include('../tuto/config/db_connect.php');

// query from database pizza
$sql = 'SELECT title, ingredients, id FROM pizzas ORDER BY created_at';
$result = mysqli_query($conn, $sql);
$pizzas = mysqli_fetch_all($result, MYSQLI_ASSOC);
$countPizza = count($pizzas) >= 2 ? '<p>there are 2 pizzas or more</p>' : '<p>There few or less pizza than 2</p>';
mysqli_free_result($result);
// close database connection
mysqli_close($conn);



?>

<!DOCTYPE html>
<html lang="en">
  <?php include('templates/header.php')?>

<h4 class="center grey-text">pizza!</h4>
<div class="container">
  <div class="row">
    <?php foreach($pizzas as $pizza): ?>
      <div class="col s6 md3">
        <div class="card z-depth-0">
          <img src="./img/pizza.jpg" class="pizza">
          <div class="card-content center">
            <h6><?php echo $pizza['title'] ?></h6>
            <ul>
              <?php foreach(explode(',', $pizzas[0]['ingredients']) as $ing): ?>
<li class='btn green m4'><?php echo htmlspecialchars( $ing) ?></li><br />
                <?php endforeach ?>
            </ul>
          </div>
          <div class="card-action right-align">
            <a href="details.php?id=<?php echo $pizza['id'] ?>" class="brand-text">more info</a>
          </div>
                </div>
      </div>

    <?php endforeach ?>
    <?php echo $countPizza; ?>
  </div>
</div>
<?php include('templates/footer.php')?>

</html>