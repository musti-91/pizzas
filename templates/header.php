<?php
session_start();
// check empty query string or noname
if ($_SERVER['QUERY_STRING'] == 'noname' || $_SERVER['QUERY_STRING'] == '') {
  unset($_SESSION['name']);
}
// print session set it by specials.php
$name = $_SESSION['name'] ?? 'Guest';
// print gender set it by specials.php
$gender = $_COOKIE['gender'] ?? 'Unknown';

?>


<head>
  <title>Ninja Pizzas</title>
  <!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

  <!-- Compiled and minified JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>



  <style type="text/css">
    .brand {
      background: #cbb09c !important;
    }

    .brand-text {
      color: #cbb09c !important;
    }

    form {
      max-width: 460px;
      margin: 20px auto;
      padding: 20px;
    }

    .mg-10 {
      margin: 10px auto;


    }

    .pizza {
      width: 100px;
      margin: 40px auto -30px;
      display: block;
      position: relative;
      top: -30px;
    }
  </style>

</head>

<body class="grey lighten-4">
  <nav class="white z-depth-0">
    <div class="container">
      <a href="index.php" class="brand-logo brand-text">
        Ninja Pizza
      </a>
      <ul class="right hide-on-small-and-down" id="nav-mobile">
        <li class="grey-text"> Hello <?php echo htmlspecialchars($name); ?>(<?php echo htmlspecialchars($gender); ?>)</li>
        <li><a href="add.php" class="btn z-depth-0">add Pizza</a></li>
      </ul>
    </div>
  </nav>