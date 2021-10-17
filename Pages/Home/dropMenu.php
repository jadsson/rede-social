<style>
    .drop-menu {
        width: 20vw;
        max-width: 600px;
        min-width: 300px;
        height: 100vh;
        position: fixed;
        z-index: 1;
        left: -700px;
        top: 70px;
        border-radius: 0 0 5px 0;
        background: rgb(0,0,0);
        box-shadow: 0 0 15px 6px rgb(30,30,30);
        transition: all ease .3s;
    }
    .list {
        display: flex;
        width: 100%;
        list-style: none;
        
    }
    .drop-menu .list li{
        width: 100%;
        cursor: pointer;
        padding: 15px 10px 15px 10px;
        color: white;
        display: flex;
        align-items: center;
        padding-left: 20px;
    }
    .drop-menu .sair {
        border-top: 1px solid rgba(200,200,200,.6);
    }
    .drop-menu span {
        padding-left: 20px;
    }
    .drop-menu .list:hover {
        background-color: rgba(200,200,200,.6);
    }
    .icon-menu {
        position: fixed;
        z-index: 10;
        cursor: pointer;
        top: 15px;
        left: 30px;
        border-radius: 4px;
    }
    .icon-menu img {
        height: 30px;
    }
    @media (max-width: 700px) {
        .icon-menu {
            top: calc(100vh - 52px);
            right: 10px;
            left: auto;
        }
        .drop-menu {
            width: 100vw;
            top: 0;
        }
    }
    .open-menu {
        left: 0;
    }
</style>

<div class="icon-menu" title="abrir menu">
    <img src="http://localhost/xgram/Assets/Icons/menu_white_24dp.svg" alt="" class="icon-open-close">
</div>
<div class="drop-menu">
    <ul class="list">
        <li>
            <img src="http://localhost/xgram/Assets/Icons/person_white_24dp.svg" alt="">
            <span>perfil</span>
        </li>
    </ul>
    <ul class="list">
        <li>
            <img src="http://localhost/xgram/Assets/Icons/settings_white_24dp.svg" alt="">
            <span>configurações</span>
        </li>
    </ul>
    <ul class="list">
        <li>
            <img src="http://localhost/xgram/Assets/Icons/bookmark_white_24dp.svg" alt="">
            <span>posts salvos</span>
        </li>
    </ul>
    <ul class="list">
        <li>
            <img src="http://localhost/xgram/Assets/Icons/question_answer_white_24dp.svg" alt="">
            <span>chat</span>
        </li>
    </ul>
    <a href="http://localhost/xgram/Pages/User/logout.php">
        <ul class="list sair">
            <li>
                <img src="http://localhost/xgram/Assets/Icons/logout_white_24dp.svg" alt="">
                <span>sair</span>
            </li>
        </ul>
    </a>
</div>

<script>
    const menu = document.querySelector('.icon-menu');
    const drop = document.querySelector('.drop-menu');
    const icon = document.querySelector('.icon-open-close');

    menu.addEventListener('click', ()=>{
        drop.classList.toggle('open-menu');
        drop.classList.contains('open-menu') ? (
            icon.setAttribute('src', 'http://localhost/xgram/Assets/Icons/close_white_24dp.svg'),
            menu.setAttribute('title', 'fechar menu')
        ) : (
            icon.setAttribute('src', 'http://localhost/xgram/Assets/Icons/menu_white_24dp.svg'),
            menu.setAttribute('title', 'abrir menu')
        )
    })

    window.addEventListener('keydown', ()=>{
        event.keyCode == 27 && drop.classList.contains('open-menu') ? (
            icon.setAttribute('src', 'http://localhost/xgram/Assets/Icons/menu_white_24dp.svg'),
            drop.classList.remove('open-menu')
        ):( 
            '' 
        );
    })

</script>
