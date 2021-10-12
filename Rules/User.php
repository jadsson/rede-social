<?php 
    include_once 'Conect.php';

    class User {
        function CreateUser($name, $email, $pass){

            $sql = "SELECT id_user FROM users WHERE username = ?";
            $stmt = Conect::Con()->prepare($sql);
            $stmt->bindValue(1, $name);
            $stmt->execute();
            
            if($stmt->rowCount() > 0) {
                return "$name já existe";
            } else {
                
                $sql = "SELECT id_user FROM users WHERE usermail = ?";
                $stmt = Conect::Con()->prepare($sql);
                $stmt->bindValue(1, $email);
                $stmt->execute();
                
                if($stmt->rowCount() > 0) {
                    return "$email já existe";
                    
                } else {

                    $msg = "";
                    $sql = "INSERT INTO users (username, usermail, pass) VALUES (?,?,?)";
                    $stmt = Conect::Con()->prepare($sql);
                    $stmt->bindValue(1, $name);
                    $stmt->bindValue(2, $email);
                    $stmt->bindValue(3, password_hash($pass, PASSWORD_DEFAULT));
                    $stmt->execute() ? $msg = "usuário registrado com sucesso" : "erro ao registrar usuário";

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

                    echo "<script>alert('bem-vindo(a) {$userData['username']}')</script>";
                    echo "<script>location.href = 'http://localhost/xgram/'</script>";
                    return true;
                } else {
                
                    echo "<script>alert('senha inválida')</script>";
                    return false;
                }
            } else {

                echo "<script>alert('nome de usuário ou email inválidos')</script>";
                return false;
            }
        }

        function LogOut(){
            !isset($_SESSION) ? session_start() : false;
            unset($_SESSION["id"], $_SESSION["usermail"], $_SESSION["username"]);
            echo "<script>alert('sua sessão foi encerrada')</script>";
            echo "<script>location.href = 'http://localhost/xgram'</script>";
            exit;
        }
    }