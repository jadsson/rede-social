<?php 

    include_once "../../Template/head.php";

    include_once "../../Rules/User.php";

    $ruleUser = new User;
    
    print_r($ruleUser->CreateUser("jadson", "jadson@gmail.com", "jadson"));
?>
<h1>
    estou na página createUser
</h1>