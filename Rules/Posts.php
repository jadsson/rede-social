<?php 
    include_once 'Conect.php';

    class Posts {

        function newPost($img, $comment = null, $id_user) {
            $sql = "INSERT INTO posts (picture, text_post, fk_userPost) VALUES (?,?,?)";
            $stmt = Conect::Con()->prepare($sql);
            $stmt->bindValue(1, $img);
            $stmt->bindValue(2, $comment);
            $stmt->bindValue(3, $id_user);

            return $stmt->execute();
        }

        function showAllPosts() {
            $sql = "SELECT * FROM posts LIMIT = 40";
            $stmt = Conect::Con()->prepare($sql);

            return $stmt->execute() ? $stmt->fetchAll(PDO::FETCH_ASSOC) : [];
        }

        function deletePost($id_post) {
            $sql = "DELETE FROM posts WHERE id = ?";
            $stmt = Conect::Con()->prepare($sql);
            $stmt->bindValue(1, $id_post);

            return $stmt->execute();
        }

        function savePost($id_post, $id_user) {
            $sql = "SELECT * FROM posts WHERE id_post = ? AND id_user = ?";
            $stmt = Conect::Con()->prepare($sql);
            $stmt->bindValue(1, $id_post);
            $stmt->bindValue(2, $id_user);
            $stmt->execute();

            if(!$stmt->rowCount()) {
                $sql = "INSERT INTO save_posts (fk_postSave, fk_userSave) VALUES (?,?)";
                $stmt = Conect::Con()->prepare($sql);
                $stmt->bindValue(1, $id_post);
                $stmt->bindValue(2, $id_user);
                
                return $stmt->execute();
            }
        }
    }