<?php
        // define variables y setea variables vacias
        $nameErr = $emailErr = $passErr = $confiErr = $imagErr = $dateErr = $acceptErr = " ";
        $nombre = $correo = $contraseña = $confirmar = $imagen = $nacimiento = $accept = " ";
        $imagenFile;

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST["nombre"])) {
                $nameErr = "Nombre requerido.";
            } else {
                
                if (!preg_match("/^[a-zA-Z-' ]*$/",$nombre)) {
                    $nameErr = "Solo se permiten letras y espacios.";

                } else {
                    $nombre = test_input($_POST["nombre"]);
                }
            }

            if (empty($_POST["correo"])) {
                $emailErr = "Email requerido.";
            } else {
                
                if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
                    $emailErr = "Formato de correo electronico invalido.";
                } else {
                    $correo = test_input($_POST["correo"]);
                }
            }

            if (empty($_POST["contraseña"])) {
                $passErr = "Contraseña requerida.";
            } else {
                $contraseña = test_input($_POST["contraseña"]);
            }

            if (empty($_POST["confirmar"])) {
                $confiErr = "Confirmación de contraseña requerida.";
            } else {
                if ($_POST("confirmar") != $_POST("contraseña")) {
                    $confiErr = "Confirmacion de contraseña no es igual a la contraseña.";
                }
            }

            if (empty($_POST["imagen"])) {
                $imagErr = "Imagen de usuario requerida.";
            } else {
                $imagenFile = test_input($_FILES["imagen"]);
            }

            if (empty($_POST["nacimiento"])) {
                $dateErr = "Fecha de nacimiento requerida.";
            } else {
                $nacimiento = test_input($_POST["nacimiento"]);
            }

            if (empty($_POST["aceptar"])) {
                $acceptErr = "Aceptacion de politicas de seguridad requerida.";
            } else {
                $accept = test_input($_POST["aceptar"]);
            }
        }

        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/estilosIndex.css">
    <title>Cuenta de ElectroVision</title>
</head>
<body>
    <header>
        <nav class="Opciones"><a href="index.html" class="textoDeProducto"><p>Pagina principal</p></a></nav>
        <nav class="Opciones"><a href="cuenta.php" class="textoDeProducto"><p>Cuenta</p></a></nav>
        <nav class="Opciones"><a href="index.html#precios" class="textoDeProducto"><p>Mejores precios</p></a></nav>
    </header>
    <div class="principal">
        <div class="perfilProducto">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
                    <label for="nombre">Nombre de Usuario: </label> <input type="text" name="nombre" id="nombreUs" required>
                    <span id="name">* </span>
                    <br>
                    <label for="imagen">Imagen de Usuario: </label> <input type="file" name="imagen" id="imgUs" accept="image/*" required>
                    <span id="image">* </span>
                    <br>
                    <label for="contraseña">Contraseña: </label> <input type="password" name="contraseña" id="contraseña" required>
                    <span id="pass">* </span>
                    <br>
                    <label for="confirmar">Confirmar contraseña: </label> <input type="password" name="confirmar" id="confirma" required>
                    <span id="confi">* </span>
                    <br>
                    <label for="correo">Correo electronico: </label> <input type="email" name="correo" id="correo" required>
                    <span id="email">* </span>
                    <br>
                    <label for="nacimiento">Fecha de Nacimiento: </label><input type="date" name="nacimiento" required>
                    <span id="born"></span>
                    <br>
                    <label for="aceptar">Acepta nuestra politica de seguridad (Necesario) </label><input type="checkbox" name="aceptar" id="acepta" required>
                    <span id="accep">* </span>
                    <div>
                        <input type="submit" value="Registrarse">
                    </div>
                </form>
            </div>
    </div>
    
</body>
</html>