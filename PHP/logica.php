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

            if (empty($_POST["imagen"])) {
                $imagErr = "Imagen de usuario requerida.";
            } else {
                
                if ($_POST("imagen") != 'image/jpeg' || $_POST("imagen") != 'image/png') {
                    $imagErr = "Imagen de usuario requerida.";
                }else{
                    $imagen = test_input($_POST["imagen"]);
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

        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
    ?>