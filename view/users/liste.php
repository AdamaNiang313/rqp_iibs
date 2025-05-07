<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<style>
    :root {
        --primary-color: #4e73df;
        --secondary-color: #f8f9fc;
        --accent-color: #2e59d9;
        --text-dark: #5a5c69;
    }
    
    body {
        background-color: #f8f9fc;
        color: var(--text-dark);
    }
    
    .container {
        max-width: 1200px;
        margin-top: 2rem;
    }
    
    .card {
        border: none;
        border-radius: 15px;
        box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15);
        overflow: hidden;
    }
    
    .card-header {
        background-color: var(--primary-color);
        color: white;
        font-weight: 600;
        padding: 1.25rem;
    }
    
    .table-responsive {
        overflow-x: auto;
    }
    
    .table {
        margin-bottom: 0;
    }
    
    .table thead th {
        background-color: var(--secondary-color);
        border-bottom: 2px solid #e3e6f0;
        font-weight: 600;
        text-transform: uppercase;
        font-size: 0.85rem;
        letter-spacing: 0.5px;
    }
    
    .table tbody tr:hover {
        background-color: rgba(78, 115, 223, 0.05);
    }
    
    .btn-action {
        padding: 0.375rem 0.75rem;
        font-size: 0.85rem;
        border-radius: 0.35rem;
    }
    
    .search-box {
        position: relative;
        margin-bottom: 1.5rem;
    }
    
    .search-box .form-control {
        padding-left: 2.5rem;
        border-radius: 0.35rem;
        border: 1px solid #d1d3e2;
    }
    
    .search-box i {
        position: absolute;
        left: 1rem;
        top: 50%;
        transform: translateY(-50%);
        color: #b7b9cc;
    }
    
    .action-buttons .btn {
        margin-right: 0.5rem;
        min-width: 80px;
    }
    
    .badge-role {
        background-color: #e74a3b;
        color: white;
        padding: 0.35em 0.65em;
        border-radius: 50rem;
        font-size: 0.75em;
        font-weight: 700;
    }
</style>

<div class="container">
    <div class="card shadow mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold">Gestion des utilisateurs</h6>
            <div class="action-buttons">
                <a class="btn btn-success btn-sm" href="?action=addUser">
                    <i class="fas fa-plus me-1"></i> Nouveau
                </a>
                <a class="btn btn-warning btn-sm" href="?action=filterUsersOver18">
                    <i class="fas fa-filter me-1"></i> Filtre Age
                </a>
            </div>
        </div>
        
        <div class="card-body">
            <div class="search-box">
                <form method="POST" action="?action=searchUsers" class="d-flex">
                    <i class="fas fa-search"></i>
                    <input 
                        type="text" 
                        name="search" 
                        class="form-control ps-4" 
                        placeholder="Rechercher un utilisateur..."
                        value="<?= htmlspecialchars($_POST['search'] ?? '') ?>"
                    >
                    <button type="submit" class="btn btn-primary ms-2">
                        <i class="fas fa-search me-1"></i> Rechercher
                    </button>
                </form>
            </div>
            
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nom</th>
                            <th scope="col">Prénom</th>
                            <th scope="col">Age</th>
                            <th scope="col">Login</th>
                            <th scope="col">Rôle</th>
                            <th scope="col" class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($users as $row) { ?>
                            <tr>
                                <td><?= htmlspecialchars($row['id']) ?></td>
                                <td><?= htmlspecialchars($row['nom']) ?></td>
                                <td><?= htmlspecialchars($row['prenom']) ?></td>
                                <td>
                                    <span class="badge bg-primary rounded-pill">
                                        <?= htmlspecialchars($row['age']) ?>
                                    </span>
                                </td>
                                <td><?= htmlspecialchars($row['login']) ?></td>
                                <td>
                                    <span class="badge-role">
                                        <?= htmlspecialchars($row['libelle']) ?>
                                    </span>
                                </td>
                                <td class="text-end">
                                    <a class="btn btn-primary btn-action" href="?action=editUser&&id=<?= $row['id'] ?>">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a class="btn btn-danger btn-action" href="?action=deleteUser&&id=<?= $row['id'] ?>">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>