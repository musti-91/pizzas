<?php
include('config/db_connect.php');
$errors = [
	'email'       => '',
	'title'       => '',
	'ingredients' => '',
];

$email         =
	$title         =
	$error_message =
	$ingredients   = '';

if (isset($_POST['submit'])) {

	if (empty($_POST['email'])) {
		$errors['email'] = 'Email is not valid!';
	} else {
		$email = $_POST['email'];
		// if not valid email
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$errors['email'] = 'Email is not valid';
		} else {
			$errors['email'] = "";
		}
	}

	if (empty($_POST['title'])) {
		$errors['title'] = 'Title cannot be empty <br/>';
	} else {
		$title = $_POST['title'];
		if (!preg_match('/^[a-zA-Z\s]+$/', $title)) {
			$errors['title'] = 'Title must be letters!';
		} else {
			$errors['title'] = "";
		}
	}

	if (empty($_POST['ingredients'])) {
		$errors['ingredients'] = 'At least one ingredient is required <br/>';
	} else {
		$ingredients = $_POST['ingredients'];
		if (!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/', $title)) {
			$errors['ingredients'] = 'At least one ingredient is required <br/>';
		} else {
			$errors['ingredients'] = "";
		}
	}

	if (array_filter($errors)) {
		$error_message = 'Fix errors before submitting the form!';
	} else {
		// redirect to homepage
		// prevent 
		$email = mysqli_real_escape_string($conn, $_POST['email']);
		$title = mysqli_real_escape_string($conn, $_POST['title']);
		$ingredients = mysqli_real_escape_string($conn, $_POST['ingredients']);


		// create sql
		$sql = "INSERT INTO pizzas(title, email, ingredients) VALUES('$title', '$email', '$ingredients')";

		// save to db and check
		if (mysqli_query($conn, $sql)) {
			// success
			header('Location: index.php');
		} else {
			echo 'query Error: ' . mysqli_error($conn);
		}
	}
}

?>
<!DOCTYPE html>
<html>
<?php include 'templates/header.php'; ?>
<section class="container grey-text">
  <h4 class="center"> Add a Pizza</h4>

  <form class="white" action="add.php" method="POST">
    <!-- Email input field -->
    <div class="red-text mg-10">
      <?php echo $error_message ?>
    </div>
    <div class="row">
      <div class="input-field col s12">
        <input id="email" autofocus="true" type="email" class="validate" name="email"
          value="<?php echo htmlspecialchars($email) ?>">
        <label for="email">Email</label>
        <span class="helper-text red-text" data-error="<?php echo $errors['email'] ?>">
          <?php echo $errors["email"] ?>
        </span>
      </div>
    </div>
    <!-- Email input field -->
    <div class="row">
      <div class="input-field col s12">
        <input id="title" type="text" name="title" class="validate" value="<?php echo htmlspecialchars($title) ?>">
        <label for="title">Pizza title</label>

        <span class="helper-text red-text" data-error="<?php echo $errors['title'] ?>">
          <?php echo $errors["title"] ?>
        </span>
      </div>
    </div>
    <!-- Email input field -->
    <div class="row">
      <div class="input-field col s12">
        <input id="ingredients" name="ingredients" type="text" class="validate"
          value="<?php echo htmlspecialchars($ingredients) ?>">
        <label for="ingredients">Ingredients(comma separated)</label>
        <span class="helper-text red-text" data-error="<?php echo $errors['ingredients'] ?>">
          <?php echo $errors["ingredients"] ?>
        </span>
      </div>
    </div>
    <!-- Submit button -->
    <div class="center">
      <input type="submit" name="submit" value="submit" class="btn brand z-depth-0">
    </div>
  </form>
</section>
<?php include 'templates/footer.php' ?>

</html>