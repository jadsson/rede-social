<?php 
    !isset($_SESSION) ? session_start() : '';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://localhost/xgram/CSS/global.css">
    <link rel="stylesheet" href="http://localhost/xgram/CSS/head.css">
    <title>xGram</title>
</head>

<style>
    .perfil-menu li {
        width: 70px;
        height: 60px;
    }
    .perfil-menu img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 50%;
    }
    .search-form img {
        cursor: pointer;
    }
    #send-search {
        outline: none;
        border: none;
        border-radius: 0;
        width: 10%;
    }
</style>

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
                        <a href="" class="perfil-menu" title="<?php echo $_SESSION['username']; ?>"><li><img src="http://localhost/xgram/Assets/Images/dragonball-1.jpg" alt=""></li></a>
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
