<style>
    .drop-menu {
        border-left: none;
        width: 20vw;
        max-width: 600px;
        min-width: 300px;
        height: 100vh;
        position: fixed;
        z-index: 1;
        right: -700px;
        top: 80px;
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
        padding: 10px;
        color: white;
        display: flex;
        align-items: center;
        padding-left: 20px;
    }
    .drop-menu span {
        padding-left: 20px;
    }
    .drop-menu .list:hover {
        background-color: rgba(200,200,200,.6);
    }
    .icon-menu {
        position: fixed;
        cursor: pointer;
        top: 70px;
        right: 15px;
    }
    @media (max-width: 700px) {
        .drop-menu {
            top: 60px;
            height: calc(100vh + 60px);
        }
        .back-drop {
            width: 100vw;
            height: calc(100vh + 10px);
            background-color: rgba(0,0,0,.6);
            position: absolute;
            top: -70px;
            right: 0;
            bottom: 0;
            z-index: -1;
        }
    }
</style>
<div class="icon-menu">
    <img src="http://localhost/xgram/Assets/Icons/menu_white_24dp.svg" alt="">
</div>
<div class="drop-menu">
    <div class="back-drop"></div>
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
    <ul class="list">
        <li>
            <img src="http://localhost/xgram/Assets/Icons/logout_white_24dp.svg" alt="">
            <span>sair</span>
        </li>
    </ul>
</div>

<script>
    const menu = document.querySelector('.icon-menu');

    menu.addEventListener('click', ()=>{
        document.querySelector('.drop-menu').style.right = '0';
    })

    window.addEventListener('keydown', ()=>{
        event.keyCode == 27 ? document.querySelector('.drop-menu').style.right = '-700px' : '';
    })
</script>
