
<?php
    function getAllRoles(){
        global $connexion;
        $sql="SELECT * FROM role";
        $stmt = $connexion->prepare($sql);
        $stmt->execute();
        $roles = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $roles;
    }
?>