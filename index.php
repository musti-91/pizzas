<?php
include('config/db_connect.php');
// write query for all pizzas
// make query and get result
$sql = 'SELECT * FROM pizzas ORDER BY createdAt';
// get result from connection
$result = mysqli_query($conn, $sql);

// fetch result rows as an Array
$pizzas = mysqli_fetch_all($result, MYSQLI_ASSOC);
// free result from memory
mysqli_free_result($result);
// close connection
mysqli_close($conn);
?>
<!DOCTYPE html>
<html>
<?php include 'templates/header.php'; ?>
<h4 class="center grey-text">Pizzas</h4>
<div class="container">
  <div class="row">
    <?php foreach ($pizzas as $pizza) : ?>
    <div class="col s6 md3">
      <div class="card z-depth-0">
        <img class="center pizza" src="img/pizza.svg">
        <div class="card-content center">
          <h6><?php echo htmlspecialchars($pizza['title']); ?></h6>
          <ul>
            <?php foreach (explode(',', $pizza['ingredients']) as $ing) : ?>
            <li><?php echo htmlspecialchars($ing); ?></li>
            <?php endforeach; ?>
          </ul>
        </div>
        <div class="card-action right-align">
          <a class="brand-text" href="details.php?id=<?php echo $pizza['id'] ?>">
            more info
          </a>
        </div>
      </div>

    </div>
    <?php endforeach; ?>
  </div>
</div>
<?php include 'templates/footer.php'; ?>

</html>