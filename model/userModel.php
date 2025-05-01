<?php


function allUser(){
    global $connexion;
    $sql="SELECT u.id,u.nom,u.prenom,u.age,u.login,r.libelle FROM user u ,role r where r.id=u.id_r";
    $stmt = $connexion->prepare($sql);
    $stmt->execute();
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $users;
}

function addUser($nom,$prenom,$age,$id_r,$login,$password){
    global $connexion;
    $sql="INSERT INTO user (nom,prenom,age,id_r,login,password) values (?,?,?,?,?,?)";
    $stmt = $connexion->prepare($sql);
    $stmt->execute([$nom,$prenom,$age,$id_r,$login,$password]);

}

function deleteUser($id){
    global $connexion;
    $sql="DELETE FROM user where id = :id";
    $stmt = $connexion->prepare($sql);
    $stmt->execute(['id'=>$id]);
}

function updateUser($nom,$prenom,$age,$id_r,$login,$password,$id){
    global $connexion;
    $sql="UPDATE user SET nom = :nom, prenom=:prenom, age=:age, login=:login,password = :password , id_r=:id_r where id = :id";
                $stmt = $connexion->prepare($sql);
                $stmt->execute(
                    [
                    'id_r'=>$id_r,
                    'nom'=>$nom,
                     'prenom'=>$prenom,
                     'age'=>$age,
                     'password'=>$password,
                     'login'=>$login,
                     'id' =>$id
                    ]
                 );
}

function getUserById($id){
    global $connexion;
    $sql="SELECT * FROM user where id= ?";
    $stmt = $connexion->prepare($sql);
    $stmt->execute([$id]);
    $user =  $stmt->fetch(PDO::FETCH_ASSOC);
    return $user;
}
?>