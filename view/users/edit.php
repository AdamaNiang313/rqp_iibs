<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<style>
    :root {
        --primary-color: #4e73df;
        --secondary-color: #f8f9fc;
        --accent-color: #2e59d9;
        --text-dark: #5a5c69;
        --warning-color: #f6c23e;
    }
    
    body {
        background-color: #f8f9fc;
    }
    
    .form-container {
        max-width: 800px;
        margin: 2rem auto;
    }
    
    .card {
        border: none;
        border-radius: 15px;
        box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15);
    }
    
    .card-header {
        background-color: var(--warning-color);
        color: #000;
        font-weight: 600;
        padding: 1.25rem;
        border-radius: 15px 15px 0 0 !important;
    }
    
    .form-label {
        font-weight: 600;
        color: var(--text-dark);
        margin-top: 1rem;
    }
    
    .form-control {
        border-radius: 0.35rem;
        border: 1px solid #d1d3e2;
        padding: 0.75rem 1rem;
    }
    
    .form-control:focus {
        border-color: var(--warning-color);
        box-shadow: 0 0 0 0.2rem rgba(246, 194, 62, 0.25);
    }
    
    .btn-update {
        background-color: var(--warning-color);
        border: none;
        padding: 0.5rem 1.5rem;
        font-weight: 600;
        color: #000;
    }
    
    .btn-update:hover {
        background-color: #e0a800;
    }
    
    .btn-cancel {
        background-color: #e74a3b;
        border: none;
        padding: 0.5rem 1.5rem;
        font-weight: 600;
    }
    
    .required-field::after {
        content: " *";
        color: #e74a3b;
    }
    
    .password-container {
        position: relative;
    }
    
    .password-toggle {
        position: absolute;
        right: 10px;
        top: 50%;
        transform: translateY(-50%);
        cursor: pointer;
        color: #b7b9cc;
    }
</style>

<div class="form-container">
    <div class="card shadow">
        <div class="card-header">
            <h5 class="m-0 font-weight-bold"><i class="fas fa-user-edit me-2"></i>Modifier l'utilisateur</h5>
        </div>
        
        <div class="card-body">
            <form action="?action=updateUser" method="POST">
                <input type="hidden" name="id" value="<?= htmlspecialchars($user['id']) ?>">
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="nom" class="form-label required-field">Nom</label>
                            <input type="text" name="nom" class="form-control" id="nom" 
                                   value="<?= htmlspecialchars($user['nom']) ?>" required>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="prenom" class="form-label required-field">Prénom</label>
                            <input type="text" name="prenom" class="form-control" id="prenom" 
                                   value="<?= htmlspecialchars($user['prenom']) ?>" required>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="age" class="form-label">Âge</label>
                            <input type="number" name="age" class="form-control" id="age" 
                                   value="<?= htmlspecialchars($user['age']) ?>" min="18" max="100">
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="login" class="form-label required-field">Login</label>
                            <input type="text" name="login" class="form-control" id="login" 
                                   value="<?= htmlspecialchars($user['login']) ?>" required>
                        </div>
                    </div>
                </div>
                
                <div class="mb-3">
                    <label for="password" class="form-label">Mot de passe</label>
                    <div class="password-container">
                        <input type="password" name="password" class="form-control" id="password" 
                               value="<?= htmlspecialchars($user['password']) ?>">
                        <span class="password-toggle" id="togglePassword">
                            <i class="fas fa-eye"></i>
                        </span>
                    </div>
                    <div class="form-text">Laissez vide pour ne pas modifier</div>
                </div>
                
                <div class="mb-4">
                    <label for="role" class="form-label required-field">Rôle</label>
                    <select class="form-select" name="id_r" id="role" required>
                        <?php foreach($roles as $row): ?>
                            <option value="<?= $row['id'] ?>" 
                                <?= ($row['id'] == $user['id_r']) ? 'selected' : '' ?>>
                                <?= htmlspecialchars($row['libelle']) ?>
                            </option>
                        <?php endforeach ?>
                    </select>
                </div>
                
                <div class="d-flex justify-content-end gap-3 mt-4">
                    <a href="?action=listUsers" class="btn btn-cancel text-white">
                        <i class="fas fa-times me-2"></i>Annuler
                    </a>
                    <button type="submit" class="btn btn-update">
                        <i class="fas fa-save me-2"></i>Enregistrer
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Fonction pour afficher/masquer le mot de passe
    document.getElementById('togglePassword').addEventListener('click', function() {
        const passwordInput = document.getElementById('password');
        const icon = this.querySelector('i');
        
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            icon.classList.remove('fa-eye');
            icon.classList.add('fa-eye-slash');
        } else {
            passwordInput.type = 'password';
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');
        }
    });
</script>