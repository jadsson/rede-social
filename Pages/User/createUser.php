<?php 
    !isset($_SESSION) ? session_start() : '';
    if(isset($_SESSION['username'])) {
        header('location: http://localhost/xgram');
        exit;
    }
    include_once "../../Rules/User.php";

    $ruleUser = new User;
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://localhost/xgram/CSS/global.css">
    <link rel="stylesheet" href="http://localhost/xgram/CSS/form.css">
    <link rel="stylesheet" href="http://localhost/xgram/CSS/button.css">
    <title>xGram</title>
</head>
<body>
    <h1 id="logo-frontpage">xGram</h1>
    <form class="form" method="POST" enctype="multipart/form-data">
        <h2>cadastro</h2>
        <input type="file" name="img" id="img-form" style="display: none!important;">
        <input type="text" name="username" placeholder="insira seu username" required maxlength="18">
        <input type="email" name="email" placeholder="insira seu email" required maxlength="50">
        <input type="password" name="pass" placeholder="insira sua senha" required maxlength="255">
        <input type="password" name="conf" placeholder="confirmar senha" required maxlength="255">
        <button class="bt">escolher imagem do perfil</button>
        <button class="bt-orange" type="submit" name="imagemPerfil">cadastrar</button>
        <a href="http://localhost/xgram">ir para login</a>
    </form> 
<style>
    .conf-msg {
        background-color: rgba(200,200,200,.4);
        color: white;
        position: absolute;
        width: fit-content;
        padding: 15px 10px;
        border-radius: 15px;
        top: 15%;
        left: 50%;
        transform: translateX(-50%);
    }
</style>
    <?php 
        if(isset($_POST['imagemPerfil'])) {
            $permitidas = ['jpg', 'png', 'jpeg'];
            $extensao = pathinfo($_FILES['img']['name'], PATHINFO_EXTENSION);

            if(in_array($extensao, $permitidas)) {
                $caminho = '../../Assets/Images/Perfil/';
                $tmp = $_FILES['img']['tmp_name'];
                $userimg = sha1(uniqid(time())).'.'.$extensao;

                if(!move_uploaded_file($tmp, $caminho.$userimg)) {
                    echo "<div class='conf-msg'>ocorreu um erro ao fazer upload. tente novamente.</div>";
                } else {
                    $username = addslashes(htmlentities($_POST['username']));
                    $email = addslashes(htmlentities($_POST['email']));
                    $pass = addslashes(htmlentities($_POST['pass']));
                    $conf = addslashes(htmlentities($_POST['conf']));

                    if(!empty($username) && !empty($email) && !empty($pass) && !empty($conf)) {
                        if($pass === $conf) {
                        
                            echo $ruleUser->CreateUser($username, $email, $userimg, $conf) ? '<div class="conf-msg">cadastro realizado com sucesso</div>' : '';
                        } else {
                            echo "<div class='conf-msg'>senhas divergentes</div>";
                        }
                    }
                }
            } else {
                $_SESSION['cacheUsername'] = $username;
                $_SESSION['cacheEmail'] = $email;
                $_SESSION['cachePass'] = $conf;
                ?>
                    <script>
                        
                    </script>
                <?php
                echo "<div class='conf-msg'>formato de imagem \"$extensao\" não permitido</div>";
            }
        }
    ?>

    <script>
        const element = (el) => document.querySelector(el);

        element('.bt').addEventListener('click', (e)=>{
            e.preventDefault();
            element('#img-form').click();
        })

        if(element('.conf-msg')) {
            setTimeout(() => {
                element('.conf-msg').style.display = 'none';
            }, 3000);
        }
    </script>
</body>
</html>