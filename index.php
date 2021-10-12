<?php !isset($_SESSION) ? session_start() : false;
    include_once 'Rules/User.php';
    $rules = new User;
?>
    <link rel="stylesheet" href="CSS/global.css">
    <link rel="stylesheet" href="CSS/footer.css">
    <link rel="stylesheet" href="CSS/button.css">
    <link rel="stylesheet" href="CSS/form.css">
    <link rel="stylesheet" href="CSS/timeline.css">
    <link rel="stylesheet" href="CSS/modal/openImage.css">

    <?php 
        if(!isset($_SESSION['username'])) {
            ?>
                <h1 id="logo-frontpage">xGram</h1>
                <form class="form" method="POST">
                    <h2>Faça login para continuar:</h2>
                    <input type="text" name="user" placeholder="insira seu username ou email" required>
                    <input type="password" name="pass" placeholder="insira sua senha" required>
                    <button class="bt-orange" type="submit">entrar</button>
                    <p>ainda não tem conta? <a href="">cadastre-se!</a></p>
                </form> 
            <?php

                if(isset($_POST['user'])) {
                    $usernameOrEmail = $_POST['user'];
                    $password = $_POST['pass'];

                    $rules->SignIn($usernameOrEmail, $usernameOrEmail, $password);
                    
                }
                
        } else {
            include_once 'Template/head.php';
            include_once 'Pages/Home/timeline.php';
        } 
?>