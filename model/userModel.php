<?php

class UserModel {
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

    public function getAllUsers() {
        $sql = "SELECT u.id, u.nom, u.prenom, u.age, u.login, r.libelle 
                FROM user u 
                JOIN role r ON r.id = u.id_r";
        $stmt = $this->connexion->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addUser($nom, $prenom, $age, $id_r, $login, $password) {
        if (empty($nom) || empty($login)) {
            throw new Exception("Nom et login sont obligatoires");
        }
        if (!is_numeric($age) || $age < 0) {
            throw new Exception("L'âge doit être un nombre positif");
        }

        $sql = "INSERT INTO user (nom, prenom, age, id_r, login, password) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->connexion->prepare($sql);
        $stmt->execute([$nom, $prenom, $age, $id_r, $login, $password]);
    }

    public function deleteUser($id) {
        $sql = "DELETE FROM user WHERE id = :id";
        $stmt = $this->connexion->prepare($sql);
        $stmt->execute(['id' => $id]);
    }

    public function updateUser($id, $nom, $prenom, $age, $id_r, $login, $password) {
        $sql = "UPDATE user SET nom = :nom, prenom = :prenom, age = :age, login = :login, password = :password, id_r = :id_r WHERE id = :id";
        $stmt = $this->connexion->prepare($sql);
        $stmt->execute([
            'id' => $id,
            'nom' => $nom,
            'prenom' => $prenom,
            'age' => $age,
            'login' => $login,
            'password' => $password,
            'id_r' => $id_r
        ]);
    }

    public function getUserById($id) {
        $sql = "SELECT * FROM user WHERE id = ?";
        $stmt = $this->connexion->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function searchUsers($searchTerm) {
        $sql = "SELECT u.id, u.nom, u.prenom, u.age, u.login, r.libelle 
                FROM user u 
                JOIN role r ON r.id = u.id_r
                WHERE u.nom LIKE :search 
                   OR u.prenom LIKE :search 
                   OR u.login LIKE :search";
        $stmt = $this->connexion->prepare($sql);
        $stmt->execute(['search' => '%' . $searchTerm . '%']);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getUsersOver18() {
        $sql = "SELECT u.id, u.nom, u.prenom, u.age, u.login, r.libelle 
                FROM user u 
                JOIN role r ON r.id = u.id_r
                WHERE u.age > 18";
        $stmt = $this->connexion->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>