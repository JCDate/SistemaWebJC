<?php
  header("Content-Type: text/html; charset=utf-8");

  define('DB_SERVER', 'localhost');
  define('DB_USERNAME', 'root');
  define('DB_PASSWORD', '');
  define('DB_NAME', 'jc_mysql');


  if (session_status() == PHP_SESSION_NONE) {
      session_start();
  }

  if (!isset($_SESSION['tiempo'])) {
    $_SESSION['tiempo'] = time();
  } else if (time() - $_SESSION['tiempo'] > 3600) {
    session_destroy();
    /* Aquí redireccionas a la url especifica */
    $pagina = "../login.php";
    $alternativa = "login.php";
    if (file_exists($pagina)) {
      header("Location: ".$pagina);
    } else {
      header("Location: ".$alternativa);
    }
    die();
  }
  $_SESSION['tiempo'] = time(); //Si hay actividad seteamos el valor al tiempo actual

  /* Conexion a la base de datos */
  $conexion = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

  // Verifica la conexión
  if($conexion === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
  }

  $conexion -> set_charset("UTF8");
?>
