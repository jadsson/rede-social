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
?>