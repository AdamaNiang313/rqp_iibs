<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<div class="container">
    <form action="?action=saveUser" method="POST">
        <label for="">Nom</label>
        <input type="text" name="nom" class="form-control">
        <label for="">Prénom</label>
        <input type="text" name="prenom" class="form-control">
        <label for="">Age</label>
        <input type="text" name="age" class="form-control">
        <label for="">Login</label>
        <input type="text" name="login" class="form-control">
        <label for="">Mot de passe</label>
        <input type="password" name="password" class="form-control">
        <label for="Role">Rôle</label>
        <select class="form-control" name="id_r" id="">
            <?php foreach($roles as $row):?>
                    <option value="<?= $row['id'] ?>"><?= $row['libelle'] ?></option>
            <?php endforeach ?>
        </select>
        <div class="mt-5">
            <button type="submit" class="btn btn-success">Valider</button>
            <button type="reset" class="btn btn-danger">Annuler</button>
        </div>
    </form>
</div>