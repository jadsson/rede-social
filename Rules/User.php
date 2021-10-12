<?php 
    include_once 'Conect.php';

    class User {
        function CreateUser($name, $email, $pass){

            $sql = "SELECT id_user FROM users WHERE username = ?";
            $stmt = Conect::Con()->prepare($sql);
            $stmt->bindValue(1, $name);
            $stmt->execute();
            
            if($stmt->rowCount() > 0) {
                return "This username alread exists";
            } else {
                
                $sql = "SELECT id_user FROM users WHERE usermail = ?";
                $stmt = Conect::Con()->prepare($sql);
                $stmt->bindValue(1, $email);
                $stmt->execute();
                
                if($stmt->rowCount() > 0) {
                    return "Email alread exists";
                    
                } else {

                    $msg = "";
                    $sql = "INSERT INTO users (username, usermail, pass) VALUES (?,?,?)";
                    $stmt = Conect::Con()->prepare($sql);
                    $stmt->bindValue(1, $name);
                    $stmt->bindValue(2, $email);
                    $stmt->bindValue(3, password_hash($pass, PASSWORD_DEFAULT));
                    $stmt->execute() ? $msg = "SingUp completed" : "Error in SignUp";

                    return $msg;
                }

            }
        }

        function ReadAllUsers(){
            $sql = "SELECT * FROM users";
            $stmt = Conect::Con()->prepare($sql);
            $stmt->execute();

            return $stmt->rowCount() ? $stmt->fetchAll(PDO::FETCH_ASSOC) : [];
        }

        function SearchUser($username) {
            $sql = "SELECT * FROM users WHERE username LIKE '%?%'";
            $stmt = Conect::Con()->prepare($sql);
            $stmt->bindValue(1, $username);
            $stmt->execute();

            return $stmt->rowCount() ? $stmt->fetchAll(PDO::FETCH_ASSOC) : [];
        }

        function ReadUser($id){
            $sql = "SELECT * FROM users WHERE id_user = ?";
            $stmt = Conect::Con()->prepare($sql);
            $stmt->bindValue(1, $id);
            $stmt->execute();

            return $stmt->rowCount() ? $stmt->fetchAll(PDO::FETCH_ASSOC) : [];
        }

        function UpdateUser($id, $name){
            $sql = "UPDATE users SET username = ? WHERE id_user = ?";
            $stmt = Conect::Con()->prepare($sql);
            $stmt->bindValue(1, $name);
            $stmt->bindValue(2, $id);
            $stmt->execute();

            return $stmt->rowCount() > 0;
        }

        function DeleteUser($id){
            $sql = "DELETE FROM users WHERE id_user = ?";
            $stmt = Conect::Con()->prepare($sql);
            $stmt->bindValue(1, $id);
            $stmt->execute();

            return $stmt->rowCount() > 0;
        }


        function SignIn($email, $name, $password){
            $sql = "SELECT * FROM users WHERE usermail = ? OR username = ?";
            $stmt = Conect::Con()->prepare($sql);
            $stmt->bindValue(1, $email);
            $stmt->bindValue(2, $name);
            $stmt->execute();

            if($stmt->rowCount() > 0) {
                $userData = $stmt->fetch(PDO::FETCH_ASSOC);
                echo "<script>console.log('dados do usuário {$userData['username']}')</script>";

                if(password_verify($password, $userData['pass'])) {
                    !isset($_SESSION) ? session_start() : false;
                    $_SESSION["id"]         = $userData["id_user"];
                    $_SESSION["username"]   = $userData["username"];
                    $_SESSION["usermail"]   = $userData["usermail"];

                    echo "<script>alert('welcome {$userData['username']}')</script>";
                    echo "<script>location.href = 'http://localhost/xgram/'</script>";
                    return true;
                } else {
                
                    echo "<script>alert('invalid password')</script>";
                    return false;
                }
            } else {

                echo "<script>alert('invalid username or email')</script>";
                return false;
            }
        }

        function CreateAccount($email, $name, $password){
            $sql = "SELECT * FROM users WHERE usermail = ?";
            $stmt = Conect::Con()->prepare($sql);
            $stmt->bindValue(1, $email);
            $stmt->execute();
            if($stmt->rowCount() > 0) {
                
                echo "<script>alert('$email alread exists')</script>";
                return false;
            } else {
                $sql = "SELECT * FROM users WHERE username = ?";
                $stmt = Conect::Con()->prepare($sql);
                $stmt->bindValue(1, $name);
                $stmt->execute();

                if($stmt->rowCount() > 0) {

                    echo "<script>alert('$name alread exists')</script>";
                    return false;
                } else {

                    $sql = "INSERT INTO users (username, usermail, pass) VALUES (?,?,?)";
                    $stmt = Conect::Con()->prepare($sql);
                    $stmt->bindValue(1, $name);
                    $stmt->bindValue(2, $email);
                    $stmt->bindValue(3, password_hash($password, PASSWORD_DEFAULT));

                    echo "<script>alert('account created')</script>";
                    return true;
                }
            }
        }

        function LogOut(){
            !isset($_SESSION) ? session_start() : false;
            unset($_SESSION["id"], $_SESSION["usermail"], $_SESSION["username"]);
            echo "<script>location.href = 'http://localhost/xgram'</script>";
            exit;
        }
    }