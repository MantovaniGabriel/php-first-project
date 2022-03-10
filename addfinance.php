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
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="finance.css">
    <title>Adicionar registro</title>
</head>
<body>
    <header>
        <div class="headers">
            <a href="sair.php">sair</a>
            <h1>Welcome to control</h1>
            <a href="#"><?php echo "$userName" ?></a>
        </div>

        <div class="sub-header">
            <a href="dashboard.php">Retornar</a>
            <a href="addTeamwork.php">Teamwork</a>
            <a href="#">Contracts</a>
        </div>
    </header>
    
    <main>
        <div class="finances">
            <form action="financeData.php" method="post">
                <input type="text" name="name" placeholder="Nome identificador" required>
                <input type="number" name="custo1" placeholder="Custo" step="0.01" min="1.00"required>
                <input type="number" name="custo2" placeholder="Custo" step="0.01" min="1.00">
                <input type="number" name="custo3" placeholder="Custo" step="0.01" min="1.00">
                <input type="text" name="descrip" placeholder="Descrição">
                <input type="submit" value="submit" name="submit">
            </form>
        </div>
    </main>
</body>
</html>