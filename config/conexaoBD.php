<?php
define('usuario', 'root');
define('senha', '');
define('Host', 'mysql:host=localhost;dbname=uniao');

class Ligar{
    private static $conn = null;
    public static function conectar() {
        try {
            self::$conn = new PDO(Host, usuario, senha);
        } catch (exception $erro) {
             }
        return self::$conn;
    }
    public static function chamar_bd() {
        return(self::$conn == null) ? self::conectar() : self::$conn;
    }

}