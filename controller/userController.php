<?php

    function getAllUsersC(){
        $users = allUser(); //Model
        require_once './view/users/liste.php'; //View
    }

    function addUserC(){
        $roles = getAllRoles(); //model
        require_once './view/users/add.php';    //view 
    }

    function storeUserC(){
        extract($_POST);
        addUser($nom,$prenom,$age,$id_r,$login,$password); //model
        header('location:index.php'); //view 
    }

    function editUserC(){
        $id=$_GET['id'];
        $roles = getAllRoles();
        $user = getUserById($id);         
        require_once './view/users/edit.php';   
    }

    function updateUserC(){
        extract($_POST);
        updateUser($nom,$prenom,$age,$id_r,$login,$password,$id);
        header('location:index.php');
    }
   
    function deleteUserC(){
        $id=$_GET['id'];
        deleteUser($id); //model
        header('location:index.php'); //view
    }

    function getUsersOver18C() {
        $users = getUserAgePlusDe18(); // Appelle la fonction de filtrage
        require_once './view/users/liste.php'; // Charge la vue avec les utilisateurs filtrés
    }

    function getUserAgePlusDe18() {
        $users = allUser(); // Récupère tous les utilisateurs depuis le modèle
        $filteredUsers = [];
    
        foreach ($users as $user) {
            if ($user['age'] > 18) {
                $filteredUsers[] = $user;
            }
        }
    
        return $filteredUsers; // Retourne les utilisateurs ayant plus de 18 ans
    }
?>