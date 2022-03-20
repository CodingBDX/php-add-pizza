<?php 
session_start();
if($_SERVER['query_string'] == 'noname'){
  unset($_SESSION['name']);
}
$name = $_SESSION['name'] ?? 'Guest';
$gender = $_COOKIE['gender'] ?? 'unknow';
?>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
  <style>
    .brand {
      background-color: red!important;
    }
    .brand-text {
      color: gray!important
      ;
    }
    form {
      max-width: 70vw;
      margin: auto;
      padding: 0.7em;
    }
    .pizza {
      width: 100px;
      margin: 40px auto -30px;
      display: block;
      position: relative;
      top:-40px;
    }
  </style>
</head>
<body class="grey lighten-4">
  <nav class="white z-depth-0">
    <div class="container">
      <a href="index.php" class="brand-logo brand-text">Ninja pizza</a>
      <ul id="nav-mobile" class="right hide-on-small-and-down">
        <li class="grey-text">hello<?php echo htmlspecialchars($name)?>(<?php echo htmlspecialchars($gender)?>)</li>
        <li><a href="add.php" class="btn brand z-depth-0">add a pizza</a></li>
      </ul>
    </div>
  </nav>