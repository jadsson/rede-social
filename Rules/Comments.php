<?php 
    include_once 'Conect.php';

    class Comments {

        function commentByPost($id_post) {
            $sql = "SELECT * FROM comments WHERE fk_postComment = ?";
            $stmt = Conect::Con()->prepare($sql);
            $stmt->bindValue(1, $id_post);
            $stmt->execute();

            return $stmt->rowCount() > 0 ? $stmt->fetchAll(PDO::FETCH_ASSOC) : [];
        }

        function deleteComment($id_user, $id_comment) {
            $sql = "DELETE FROM comments WHERE fk_userComment = ? AND id_comment = ?";
            $stmt = Conect::Con()->prepare($sql);
            $stmt->bindValue(1, $id_user);
            $stmt->bindValue(2, $id_comment);
            
            return $stmt->execute();
        }
    }

?>