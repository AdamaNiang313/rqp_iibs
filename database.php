<?php
$host = 'localhost';
$dbname = 'emargent_ibbs';
$username = 'root';
$password = '';

try {
  
    $connexion = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);

    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "Connexion réussie à la base de données.";
} catch (PDOException $e) {
   
    echo "Erreur de connexion : " . $e->getMessage();
}
?>