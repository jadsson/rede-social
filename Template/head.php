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

<body>
    <header>
        <nav class="menu">
            <a href="http://localhost/xgram"><ul class="logo">xGram</ul></a>

                <form action="" class="search-form">
                    <input class="input" type="text" placeholder="buscar">
                </form>

            <?php 
                if(isset($_SESSION['username'])) {
                ?>
                    <ul class="menu-list">
                        <a href=""><li>fotos</li></a>
                        <a href=""><li>mensagens</li></a>
                        <a href=""><li><?php echo $_SESSION['username']; ?></li></a>
                    </ul>
                <?php
                }
            ?>
        </nav>
    </header>    

