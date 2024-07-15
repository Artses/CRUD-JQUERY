<?php

class Conexao
{
    private static $instance;

    public static function get_instance()
    {
        if (!isset(self::$instance)) {
            try {
                self::$instance = new PDO(
                    "mysql:host=localhost;dbname=primeirocrud",
                    "root",
                    "",
                    array(
                        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8',
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
                    )
                );
            } catch (PDOException $e) {

                throw new Exception("Erro ao conectar ao banco de dados: " . $e->getMessage());
            }
        }

        return self::$instance;
    }
}
?>