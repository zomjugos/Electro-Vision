<?php
        // define variables y setea variables vacias
        $nameErr = $emailErr = $passErr = $confiErr = $imagErr = $dateErr = $acceptErr = " ";
        $nombre = $correo = $contraseña = $confirmar = $imagen = $nacimiento = $accept = " ";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST["nombre"])) {
                $nameErr = "Nombre requerido.";
            } else {
                
                if (!preg_match("/^[a-zA-Z-' ]*$/",$nombre)) {
                    $nameErr = "Solo se permiten letras y espacios.";

                } else {
                    $nombre = test_input($_POST["name"]);
                }
            }

            if (empty($_POST["correo"])) {
                $emailErr = "Email requerido.";
            } else {
                
                if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
                    $emailErr = "Formato de correo electronico invalido.";
                } else {
                    $correo = test_input($_POST["email"]);
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
                } else{
                    $confirmar = test_input($_POST["confirmar"]);
                }
            }

            if (empty($_FILES["imagen"])) {
                $imagErr = "Imagen de usuario requerida.";
            } else {
                
                if ($_FILES("imagen") != 'image/jpeg' || $_POST("imagen") != 'image/png') {
                    $imagErr = "Imagen de usuario requerida.";
                }else{
                    $imagen = test_input($_FILES["imagen"]);
                }
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

        if (empty($nameErr) && empty($emailErr) && empty($passErr) && empty($confiErr) &&
        empty($imagErr) && empty($dateErr) && empty($acceptErr)) {

        // Aquí podrías guardar los datos en una base de datos o redirigir
        echo "<script>alert('Registro exitoso'); window.location.href='../index.html';</script>";
        exit;
    } else {
        // Mostrar errores (para pruebas, normalmente se renderiza en HTML)
        echo "<h3>Errores detectados:</h3>";
        echo "<ul>";
        echo "<li>$nameErr</li>";
        echo "<li>$emailErr</li>";
        echo "<li>$passErr</li>";
        echo "<li>$confiErr</li>";
        echo "<li>$imagErr</li>";
        echo "<li>$dateErr</li>";
        echo "<li>$acceptErr</li>";
        echo "</ul>";
        echo "<a href='../index.html'>Volver</a>";
    }

        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
    ?>