
<div class="container">
    <a class="btn btn-success mt-5" href="?action=addUser">Nouveau</a>
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
