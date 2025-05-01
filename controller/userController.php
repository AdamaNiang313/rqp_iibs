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
       


?>