<?php
    $controller = new UserController();
    $action = $_GET['action'] ?? 'listUser';

    switch ($action) {
        case 'listUser':
            $controller->listUsers();
            break;
        case 'addUser':
            $controller->addUserForm();
            break;
        case 'saveUser':
            $controller->saveUser();
            break;
        case 'deleteUser':
            $id = $_GET['id'] ?? null;
            if ($id) {
                $controller->deleteUser($id);
            }
            break;
        case 'updateUser':
            $controller->updateUser();
            break;
        case 'editUser':
            $id = $_GET['id'] ?? null;
            if ($id) {
                $controller->editUserForm($id);
            }
            break;
        case 'filterUsersOver18':
            $controller->getUsersOver18C();
            break;
        case 'searchUsers':
            $controller->searchUsers();
            break;
        default:
            echo "Action non reconnue.";
            break;
    }
?>