<?php
    session_start();
    include_once 'config.php';
    //print_r($_SESSION);

    if((!isset($_SESSION['email']) == true) && (!isset($_SESSION['passsword']) == true))
    {
        unset($_SESSION['email']);
        unset($_SESSION['password']);
        header('Location: index.html');
    }

    $email = $_SESSION['email']; //Atribuindo email.
    
    $userN = "SELECT user FROM Login WHERE email = '$email'"; //Selecionando usuário
    $resUser = $conect->query($userN);

    $user_data = mysqli_fetch_assoc($resUser);
    $userName = $user_data['user'];

    //show datas
    //Pegando o id referenciado de outra tabela.
    $id = "SELECT * FROM Login WHERE email = '$email'";
    $id_res = $conect->query($id);

    $user_data_id = mysqli_fetch_assoc($id_res);
    $userID = $user_data_id['id'];

    /*Finances*/
    $finance_data = "SELECT * FROM Finance WHERE id = '$userID'";
    $finance_result = $conect->query($finance_data);

    /*Teamwork*/
    $teamwork_data = "SELECT * FROM Teamwork WHERE id = '$userID'";
    $teamwork_result = $conect->query($teamwork_data);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleEnd.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <title>Dashboard</title>
</head>
<body>
    <header>
        <div class="headers">
            <a href="sair.php">sair</a>
            <h1>Welcome to control</h1>
            <a href="#"><?php echo "$userName" ?></a>
        </div>

        <div class="sub-headers">
            <a href="addfinance.php">Finanças</a>
            <a href="addTeamwork.php">Teamwork</a>
            <a href="#">Contracts</a>
        </div>
    </header>

    <main>
        <div class="main-container">
            <div class="Finances m-5">
                <h1>Finanças</h1>
                <table class="table table-striped table-personal"> 
                    <thead class="thead-dark thead">
                        <th scope="col">nome</th>
                        <th scope="col">custo</th>
                        <th scope="col">custo</th>
                        <th scope="col">custo</th>
                        <th scope="col">custo_final</th>
                        <th scope="col">descrição</th>
                        <th scope="col">...</th>
                    </thead>
                    <tbody>
                    <?php
                            while($user_data = mysqli_fetch_assoc($finance_result))
                            {
                                echo "<tr>";
                                echo "<td>".$user_data['nome']."</td>";
                                echo "<td>".$user_data['custo1']."</td>";
                                echo "<td>".$user_data['custo2']."</td>";
                                echo "<td>".$user_data['custo3']."</td>";
                                echo "<td>".$user_data['final']."</td>";
                                echo "<td>".$user_data['descrip']."</td>";
                                echo "<td>Ações</td>";
                                echo "</tr>";
                            }
                        ?>
                    </tbody>
                </table>
            </div>
            <hr>
            <div class="Teamwork m-5">
            <h1>Teamwork</h1>
                <table class="table table-striped table-personal"> 
                    <thead class="thead-dark thead">
                        <th scope="col">nome</th>
                        <th scope="col">email-superior</th>
                        <th scope="col">Hora de inicio</th>
                        <th scope="col">Hora de término</th>
                        <th scope="col">Descrição</th>
                        <th scope="col">...</th>
                    </thead>
                    <tbody>
                    <?php
                            while($user_data = mysqli_fetch_assoc($teamwork_result))
                            {
                                echo "<tr>";
                                echo "<td>".$user_data['nome']."</td>";
                                echo "<td>".$user_data['email_boss']."</td>";
                                echo "<td>".$user_data['Inicial_hour']."</td>";
                                echo "<td>".$user_data['final_hour']."</td>";
                                echo "<td>".$user_data['descreva']."</td>";
                                echo "<td>Ações</td>";
                                echo "</tr>";
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</body>
</html>