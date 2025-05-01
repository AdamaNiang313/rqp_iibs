<?php 
        require_once './database.php';
        $connexion = getConnexion();
        require_once './model/userModel.php';
        require_once './model/roleModel.php';

        require_once './controller/userController.php';
        require_once './routes.php';
?>