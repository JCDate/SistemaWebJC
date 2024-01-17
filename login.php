<?php
// Inicializar la sesión
session_start();

// Verifique si el usuario ya ha iniciado sesión, si es así, rediríjalo a la página de bienvenida
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
  header("location: Inicio.php");
  exit;
}

// Incluir archivo de conexion a la base de datos
require_once "conexion.php";

// Definir variables e inicializar con valores vacíos
$username = $password = "";
$username_err = $password_err = "";

// Procesamiento de datos del formulario cuando se envía el formulario
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Compruebe si el nombre de usuario está vacío
    if(empty(trim($_POST["username"]))){
        $username_err = "Por favor ingrese su usuario.";
    } else{
        $username = trim($_POST["username"]);
    }

    // Compruebe si la contraseña está vacía
    if(empty(trim($_POST["password"]))) {
        $password_err = "Por favor ingrese su contraseña.";
    } else{
        $password = trim($_POST["password"]);
    }

    // Validar contraseña y usuario
    if(empty($username_err) && empty($password_err)){
        // Consulta de la base de datos
        $sql = "SELECT id, usuario, password FROM usuariosproduccion WHERE usuario = ?";

        if($stmt = mysqli_prepare($conexion, $sql)){
            // Vincular variables a la declaración preparada como parámetros
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Establecer parámetros
            $param_username = $username;

            // Intente ejecutar la declaración preparada
            if(mysqli_stmt_execute($stmt)){

                mysqli_stmt_store_result($stmt);

                // Verifique si existe el nombre de usuario, si es así, verifique la contraseña
                if(mysqli_stmt_num_rows($stmt) == 1){
                    // Vincular variables de resultado
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // La contraseña es correcta, así que inicie una nueva sesión
                            session_start();

                            // Almacenar datos en variables de sesión
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["usuario"] = $username;

                            // Redirigir al usuario a la página de Inicio
                            header("location: Inicio.php");
                        } else{
                            // Muestra un mensaje de error si la contraseña no es válida
                            $password_err = "La contraseña que has ingresado no es válida.";
                        }
                    }
                } else{
                    // Muestra un mensaje de error si el nombre de usuario no existe
                    $username_err = "No existe cuenta registrada con ese nombre de usuario.";
                }
            } else{
                echo "Algo salió mal, por favor vuelve a intentarlo.";
            }
        }
        // Declaración de cierre
        mysqli_stmt_close($stmt);
    }
    // Conexión cercana
    mysqli_close($conexion);
}
?>

<!DOCTYPE html>

<html>

<head>
    <meta charset="UTF-8">
    <title>JC</title>
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/font-awesome.css">
    <link rel="shortcut icon" href="img/icono.png">

    <style>
        input::-webkit-input-placeholder {
            color:white;
        }
        input::-moz-placeholder {
            /* Mozilla Firefox 19+ */
            color: white;
        }
        input:-moz-placeholder {
            /* Mozilla Firefox 4 to 18 */
            color: white;
        }
        input:-ms-input-placeholder {
            /* Internet Explorer 10-11 */
            color: white;
        }
    </style>
</head>

<body>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div id="login-box">
            <h1>Login</h1>
            <div class="form">
                <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <div class="item">
                    <i class="fa fa-user-circle" aria-hidden="true"></i>
                    <input type="text" placeholder="USUARIO" name="username">
                </div>
                </div>
                <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <div class="item">
                    <i class="fa fa-key" aria-hidden="true"></i>
                    <input type="password" placeholder="CONTRASEÑA" name="password">
                </div>
                </div>
            </div>
            <button type="submit">Login</button>
        </div>
    </form>
  </body>
</html>
