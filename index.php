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
            
            include_once 'Pages/User/login.php';
                
        } else {
            include_once 'Template/head.php';
            include_once 'Pages/Home/timeline.php';
        } 
?>