<?php
    session_start();

    if(isset($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['password']))
    {
        include_once 'config.php';

        $user     = $_POST['email'];
        $pass     = $_POST['password'];

        echo "$user  ";
        echo "$pass <br><br>";

        $sql = "SELECT * FROM Login WHERE email = '$user' and password = '$pass'";
        $result = $conect->query($sql);
        print_r($result);

        if(mysqli_num_rows($result) < 1)
        {
            unset($_SESSION['email']);
            unset($_SESSION['password']);
            header('Location: login.html');

        }else{
            $_SESSION['email'] = $user;
            $_SESSION['password'] = $pass;
            header('Location: dashboard.php');
        }
    }
    else
    {
        header('Location: login.html');
    }
?>