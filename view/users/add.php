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
        background-color: var(--primary-color);
        color: white;
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
        border-color: var(--primary-color);
        box-shadow: 0 0 0 0.2rem rgba(78, 115, 223, 0.25);
    }
    
    .btn-submit {
        background-color: var(--primary-color);
        border: none;
        padding: 0.5rem 1.5rem;
        font-weight: 600;
    }
    
    .btn-submit:hover {
        background-color: var(--accent-color);
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
</style>

<div class="form-container">
    <div class="card shadow">
        <div class="card-header">
            <h5 class="m-0 font-weight-bold"><i class="fas fa-user-plus me-2"></i>Ajouter un nouvel utilisateur</h5>
        </div>
        
        <div class="card-body">
            <form action="?action=saveUser" method="POST">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="nom" class="form-label required-field">Nom</label>
                            <input type="text" name="nom" class="form-control" id="nom" required>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="prenom" class="form-label required-field">Prénom</label>
                            <input type="text" name="prenom" class="form-control" id="prenom" required>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="age" class="form-label">Âge</label>
                            <input type="number" name="age" class="form-control" id="age" min="18" max="100">
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="login" class="form-label required-field">Login</label>
                            <input type="text" name="login" class="form-control" id="login" required>
                        </div>
                    </div>
                </div>
                
                <div class="mb-3">
                    <label for="password" class="form-label required-field">Mot de passe</label>
                    <div class="input-group">
                        <input type="password" name="password" class="form-control" id="password" required>
                        <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                    <div class="form-text">Minimum 8 caractères</div>
                </div>
                
                <div class="mb-4">
                    <label for="role" class="form-label required-field">Rôle</label>
                    <select class="form-select" name="id_r" id="role" required>
                        <option value="" selected disabled>Sélectionnez un rôle</option>
                        <?php foreach($roles as $row): ?>
                            <option value="<?= $row['id'] ?>"><?= htmlspecialchars($row['libelle']) ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                
                <div class="d-flex justify-content-end gap-3 mt-4">
                    <button type="reset" class="btn btn-cancel text-white">
                        <i class="fas fa-times me-2"></i>Annuler
                    </button>
                    <button type="submit" class="btn btn-submit text-white">
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