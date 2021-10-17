<?php 
    !isset($_SESSION) ? session_start() : '';
    include_once 'Rules/User.php';

    $usuarioRegra = new User();
    $usuarioLogado = $usuarioRegra->ReadUser($_SESSION['id']);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/head.css">
    <link rel="stylesheet" href="CSS/global.css">
    <link rel="stylesheet" href="CSS/button.css">
    <link rel="stylesheet" href="CSS/form.css">
    <link rel="stylesheet" href="CSS/timeline.css">
    <link rel="stylesheet" href="CSS/modal/openImage.css">
    <title>xGram</title>
</head>

<body>
    <header>
        <nav class="menu">
            <a href="http://localhost/xgram"><ul class="logo"></ul></a>

                <form action="" class="search-form">
                    <input class="input" type="text" placeholder="buscar">
                    <button type="submit" id="send-search">
                        <img src="http://localhost/xgram/Assets/Icons/search_white_24dp.svg" alt="" class="button-send">
                    </button>
                </form>

            <?php 
                if(isset($_SESSION['username'])) {
                ?>
                    <ul class="menu-list">
                        <a href="" title="suas fotos"><li><img src="http://localhost/xgram/Assets/Icons/collections_white_24dp.svg" alt=""></li></a>
                        <a href="" title="mensagens"><li><img src="http://localhost/xgram/Assets/Icons/chat_white_24dp.svg" alt=""></li></a>
                        <a href="" class="perfil-menu" title="<?php echo $usuarioLogado['username']; ?>"><li><img src="http://localhost/xgram/Assets/Images/Perfil/<?php echo $usuarioLogado['userimg']?>" alt=""></li></a>
                    </ul>
                <?php
                }
            ?>
        </nav>
    </header>    

    <script>
        const send = document.querySelector('.search-form');
        const data = document.querySelector('.input');
        send.addEventListener('submit', (e)=>{
            e.preventDefault();
            console.log(data.value ? data.value : 'vazio');
        })
    </script>
