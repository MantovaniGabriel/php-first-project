<?php
    session_start();
    include_once 'config.php';
    include_once 'addTeamwork.php';


    //Pegando o id referenciado de outra tabela.
    $id = "SELECT * FROM Login WHERE email = '$email'";
    $id_res = $conect->query($id);

    //print_r($id_res);

    $user_data_id = mysqli_fetch_assoc($id_res);
    $userID = $user_data_id['id'];
    $userMail = $user_data_id['email'];

    if(isset($_POST['submit']))
    {
        $nome  = $_POST['name'];
        $inicial  = $_POST['inicial_hour'];
        $final  = $_POST['final_hour'];
        $descrip  = $_POST['description'];

        //echo "$userID<br>, $nome<br>, $userMail<br>, $inicial<br>, $final<br>, $descrip";

        $result = mysqli_query($conect, "INSERT INTO Teamwork(id, nome, email_boss, Inicial_hour, final_hour, descreva) VALUES('$userID', '$nome', '$userMail','$inicial', '$final', '$descrip')");
        
        //print_r($result);
    }
?>