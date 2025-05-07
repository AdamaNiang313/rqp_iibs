<?php

class RoleModel {
    private $connexion;

    public function __construct() {
        $this->connexion = Database::getConnexion();
    }

    // Getter pour $connexion
    public function getConnexion() {
        return $this->connexion;
    }

    // Setter pour $connexion
    public function setConnexion($connexion) {
        $this->connexion = $connexion;
    }

    public function getAllRoles() {
        $sql = "SELECT * FROM role";
        $stmt = $this->connexion->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>