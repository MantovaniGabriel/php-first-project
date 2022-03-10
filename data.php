<?php
    session_start();

    if(isset($_POST['submit']))
    {
        include_once 'config.php';

        $nome  = $_POST['name'];
        $user = $_POST['user'];
        $email = $_POST['email'];
        $passw = $_POST['password'];
        $date  = $_POST['date'];
        $type  = $_POST['type'];

        /*Verificando existência de email - usuário.*/
        $Verification = "SELECT * FROM Login WHERE user = '$user' or email = '$email'";
        $resVerification = $conect->query($Verification);

        if(mysqli_num_rows($resVerification) < 1)
        {
            $result = mysqli_query($conect, "INSERT INTO Login(nome, user, email, password, data, tipo_conta) VALUES('$nome', '$user', '$email', '$passw', '$date', '$type')");
            header('Location: login.html');
        }
        else{
            header('Location: register.html');

        }
    }
?>