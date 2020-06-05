<?php
include('config/db_connect.php');
// POST QUERY
if (isset($_POST['delete'])) {

    $id_to_delete = mysqli_real_escape_string($conn, $_POST['id_to_delete']);


    $sql = "DELETE FROM pizzas WHERE id=$id_to_delete";

    if (mysqli_query($conn, $sql)) {
        // success
        header('Location: index.php');
    } else {
        echo 'query error:' . mysqli_error($conn);
    }
}
// check get request id query
if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);

    //sql query
    $sql = "SELECT * FROM pizzas WHERE id= $id";

    // get query result
    $result = mysqli_query($conn, $sql);

    // fetch result in an array format
    $pizza = mysqli_fetch_assoc($result);


    mysqli_free_result($result);
    mysqli_close($conn);
}



?>

<html>
<?php include('templates/header.php'); ?>


<div class="container center grey-text">
  <?php if ($pizza) : ?>
  <h4>
    <?php echo htmlspecialchars($pizza['title']); ?>
  </h4>
  <p>
    Created by:
    <?php echo htmlspecialchars($pizza['email']); ?>
  </p>
  <p>
    <?php echo date($pizza['createdAt']); ?>
  </p>
  <h5>Ingredients</h5>
  <p>
    <?php echo htmlspecialchars($pizza['ingredients']) ?>
  </p>
  <!--Delete form- -->
  <form action='<?echo $_SERVER[' PHP_SELF']?>' method='POST'>
    <input type="hidden" value="<?php echo htmlspecialchars($pizza['id']) ?>" name="id_to_delete">
    <input type="submit" class="btn brand z-depth-0" value="DELETE" name="delete">
  </form>
  <?php else : ?>
  <h5>No such pizza exists </h5>

  <?php endif; ?>
</div>

<?php include('templates/footer.php'); ?>

</html>