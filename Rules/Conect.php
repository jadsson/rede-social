<?php 
    class Conect {
        private static $i;
        
        static function Con() {
            if(!isset(self::$i)) {
                try {
                    self::$i = new PDO('mysql:dbname=xgram; host=localhost', 'root', 'root');
                } catch (Exception $e) {
                    echo "Erro no Banco de Dados: ".$e->getMessage();
                }
            }
            return self::$i;
        }
    }