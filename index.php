<?php !isset($_SESSION) ? session_start() : false;
    include_once 'Rules/User.php';
    $rules = new User;

        if(!isset($_SESSION['username'])) {
            
            include_once 'Pages/User/login.php';
                
        } else {
            include_once 'Template/head.php';
            include_once 'Pages/Home/timeline.php';
        } 
?>
