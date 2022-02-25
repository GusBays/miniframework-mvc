<?php

namespace App;

use Exception;
use PDO;
use PDOException;

class Connection {

    //metodos estáticos não exigem que instancia a classe, é possível chamar o metodo com ::
    public static function getDB() {
        try {     
            $conn = new \PDO(
                "mysql:host=localhost;dbname=mvc;charset=utf8",
                "root",
                ""
            );

            return $conn;

        } catch (\PDOException $e) {
            //carregar pagina de erro
        }
    }
}

?>