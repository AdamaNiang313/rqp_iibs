<?php

    $action = $_GET['action'] ?? 'listUser';


    switch($action){
        case 'listUser':
            getAllUsersC();
            break;
        case 'addUser':
            addUserC();
            break;
        case 'saveUser':
            storeUserC();
            break;
        case 'deleteUser':
            deleteUserC();
            break;
        case 'updateUser':
            updateUserC();
            break;
        case 'editUser':
            editUserC();
            break;
        case 'filterUsersOver18': // Nouvelle route pour le filtrage
            getUsersOver18C();
            break;

    }


?>