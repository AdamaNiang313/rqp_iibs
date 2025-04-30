<?php


    if(isset($_GET['action'])){
                
        if($_GET['action']=="listUser"){
            require_once './view/users/liste.php'; 
        }
        if($_GET['action']=="addUser"){
            $roles = getAllRoles(); //model
            require_once './view/users/add.php';    //view 
        }
        if($_GET['action']=="saveUser"){
           extract($_POST);
           addUser($nom,$prenom,$age,$id_r,$login,$password); //model
           header('location:index.php'); //view 
        }
        if($_GET['action']=="editUser"){
            $id=$_GET['id'];
        

            $sql="SELECT * FROM role";
            $stmt = $connexion->prepare($sql);
            $stmt->execute();
            $roles = $stmt->fetchAll(PDO::FETCH_ASSOC);

            require_once './view/users/edit.php';   
        }
        if($_GET['action']=="updateUser"){
            extract($_POST);
            
            header('location:index.php');
        }
        if($_GET['action']=="deleteUser"){
            $id=$_GET['id'];
            deleteUser($id); //model
            header('location:index.php'); //view
        }
    }else{
        $users = allUser(); //Model
        require_once './view/users/liste.php'; //View
    }

?>