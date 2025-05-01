<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<div class="container">
    <a class="btn btn-success mt-5" href="?action=addUser">Nouveau</a>
    <a class="btn btn-danger mt-5 ml-5" href="?action=filterUsersOver18">filtre Age</a>
    <table class="table table-bordered mt-5">
    <thead>
        <tr>
        <th scope="col">Id</th>
        <th scope="col">Nom</th>
        <th scope="col">Prénom</th>
        <th scope="col">Age</th>
        <th scope="col">Login</th>
        <th scope="col">Rôle</th>
        <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($users as $row) {?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= $row['nom'] ?></td>
                <td><?= $row['prenom'] ?></td>
                <td><?= $row['age'] ?></td>
                <td><?= $row['login'] ?></td>
                <td><?= $row['libelle'] ?></td>
                <td>
                    <a class="btn btn-primary" href="?action=editUser&&id=<?= $row['id'] ?>">Modifier</a>
                    <a class="btn btn-danger" href="?action=deleteUser&&id=<?= $row['id'] ?>">Supprimer</a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
    </table>
</div>
