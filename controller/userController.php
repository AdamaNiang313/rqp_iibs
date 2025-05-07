<?php

class UserController {
    private $userModel;
    private $roleModel;

    public function __construct() {
        $this->userModel = new UserModel();
        $this->roleModel = new RoleModel();
    }

    // Getter pour $userModel
    public function getUserModel() {
        return $this->userModel;
    }

    // Setter pour $userModel
    public function setUserModel($userModel) {
        $this->userModel = $userModel;
    }

    // Getter pour $roleModel
    public function getRoleModel() {
        return $this->roleModel;
    }

    // Setter pour $roleModel
    public function setRoleModel($roleModel) {
        $this->roleModel = $roleModel;
    }

    public function listUsers() {
        $users = $this->userModel->getAllUsers();
        require_once './view/users/liste.php';
    }

    public function addUserForm() {
        $roles = $this->roleModel->getAllRoles();
        require_once './view/users/add.php';
    }

    public function saveUser() {
        extract($_POST);
        $this->userModel->addUser($nom, $prenom, $age, $id_r, $login, $password);
        header('Location: index.php');
    }

    public function editUserForm($id) {
        $roles = $this->roleModel->getAllRoles();
        $user = $this->userModel->getUserById($id);
        require_once './view/users/edit.php';
    }

    public function updateUser() {
        extract($_POST);
        $this->userModel->updateUser($id, $nom, $prenom, $age, $id_r, $login, $password);
        header('Location: index.php');
    }

    public function deleteUser($id) {
        $this->userModel->deleteUser($id);
        header('Location: index.php');
    }

    public function searchUsers() {
        $searchTerm = $_POST['search'] ?? '';
        $users = $this->userModel->searchUsers($searchTerm);
        require_once './view/users/liste.php';
    }

    public function getUsersOver18C() {
        $users = $this->userModel->getUsersOver18();
        require_once './view/users/liste.php';
    }
}
?>