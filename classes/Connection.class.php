<?php



abstract class Connection {
    public static $instance;

    public static function getInstance() {
        //verificar se já foi instanciado
        if (!isset(self::$instance)) {
            try {
                self::$instance = new PDO('mysql:host=localhost; dbname=curso1', 'root', '');
                self::$instance->exec("set names utf8");
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }
        return self::$instance;
    }

// metodo para pegar a conexão
    protected function prepare($sql) {
        return self::getInstance()->prepare($sql);
    }
}




?>