<?php
     require 'database.php';

     $message = '';
   
     if (!empty($_POST['email']) && !empty($_POST['password'])) {
       $sql = "INSERT INTO users (email, password) VALUES (:email, :password)";
       $stmt = $conn->prepare($sql);
       $stmt->bindParam(':email', $_POST['email']);
       $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
       $stmt->bindParam(':password', $password);
   
       if ($stmt->execute()) {
         $message = 'Usuario creado exitosamente';
       } else {
         $message = 'Hubo un problema a crear la cuenta';
       }
     }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrate</title>
     <!-- Styles-->
    <link rel="stylesheet" href="assets/css/sing.css">
    <!-- Fonts-->
    <link rel="preconet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&family=Ubuntu:wght@300&display=swap" >
</head>
<body>
<?php require 'partials/header.php'?>
    <?php if (!empty($message)):?>
        <p><?php $message?></p>
    <?php endif; ?>
    <div class="box-flex">
        <div class="words">
            <h1>Crear Cuenta</h1>
            <p>Crea una cuenta para guardar todos <br>
            tus datos en la nube, e iniciar la experiencia App </p>
        </div>
        <div class="box-inputs-loguin">
            <form action="singup.php" method="post">
                <div class="inputs-loguin">
                    <p>Usuario</p>
                    <input type="text" name="email">
                    <p>Contraseña</p>
                    <input type="password"name="password">
                    <input type="submit" value="Enviar">
                </div>
            </form>
        </div>
    </div>
</body>
</html>