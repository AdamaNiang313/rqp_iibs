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
    }


?>