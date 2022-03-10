<?php
    session_start();
    include_once 'config.php';
    include_once 'addfinance.php';


    //Pegando o id referenciado de outra tabela.
    $id = "SELECT id FROM Login WHERE email = '$email'";
    $id_res = $conect->query($id);

    //print_r($id_res);

    $user_data_id = mysqli_fetch_assoc($id_res);
    $userID = $user_data_id['id'];

    if(isset($_POST['submit']))
    {
        $nome  = $_POST['name'];
        $custo1  = $_POST['custo1'];
        $custo2  = $_POST['custo2'];
        $custo3  = $_POST['custo3'];
        $descrip  = $_POST['descrip'];

        $final = $custo1 + $custo2  + $custo3;

        //echo "$userID<br>, $nome<br>, $custo1<br>, $custo2<br>, $custo3<br>, $final<br>, $descrip";

        $result = mysqli_query($conect, "INSERT INTO Finance(id, nome, custo1, custo2, custo3, final, descrip) VALUES('$userID', '$nome', '$custo1', '$custo2', '$custo3', '$final', '$descrip')");
        
        //print_r($result);
    }
?>