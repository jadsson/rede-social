<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/global.css">
    <link rel="stylesheet" href="CSS/form.css">
    <link rel="stylesheet" href="CSS/button.css">
    <title>xGram</title>
</head>
<body>
    <h1 id="logo-frontpage">xGram</h1>
    <form class="form" method="POST">
        <h2>entrar</h2>
        <input type="text" name="user" placeholder="insira seu username ou email" required>
        <input type="password" name="pass" placeholder="insira sua senha" required>
        <button class="bt-orange" type="submit">entrar</button>
        <a href="http://localhost/xgram/Pages/User/createUser.php">cadastre-se!</a>
    </form> 

    <?php 
        if(isset($_POST['user'])) {
            $usernameOrEmail = $_POST['user'];
            $password = $_POST['pass'];

            $rules->SignIn($usernameOrEmail, $usernameOrEmail, $password);
            
        }
    ?>
</body>
</html>