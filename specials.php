<?php

$score = 50;
// echo $score >= 50 ? 'something' :  'readme';
echo '<br/>';

// super globals
// SERVER
// echo $_SERVER['PHP_SELF']; // return current file.

// SESSIONS
if (isset($_POST['submit'])) {
  setcookie('gender', $_POST['gender'], time() + 86400);
  session_start();
  $_SESSION['name'] = $_POST['name'];

  header('Location: index.php');
}
?>
<html>
<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
  <input type="text" name="name" placeholder="name of session">
  <select name="gender">
    <option value="male">Male</option>
    <option value="female">Female</option>
    <option value="multiGender">Multi Gender</option>
  </select>
  <input type="submit" name="submit" value="Submit">
</form>

</html>