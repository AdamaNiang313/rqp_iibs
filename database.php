<?php

class Database {
    private static $connexion;
    public static function getConnexion() {
        if (!self::$connexion) {
            try {
                self::$connexion = new PDO('mysql:host=localhost;dbname=emargements', 'root', '');
                self::$connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("Erreur de connexion : " . $e->getMessage());
            }
        }
        return self::$connexion;
    }
}
?>