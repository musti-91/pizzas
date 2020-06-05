<?php

// connect to database
$conn = mysqli_connect('localhost', 'musti', 'Test@12345', 'ninja');

// check the connection
if (!$conn) {
  echo 'Connection Error: ' . mysqli_connect_error();
}



// $ingredients = explode(',', $pizza[0][ingredients]);