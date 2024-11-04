<?php

$Login = new Login();

if (isset($_POST['subFormUpdate'])) {
    unset($_POST['subFormUpdate']);
    $error = $Login->checkDataUpdate($_POST);

    if ($error) {
        $e = count($error) == 1 ? "l'erreur contenue" : "les " . count($error) . " erreurs contenues";
        setFlash("Désolé !", "Veuillez corriger " . $e . " dans le formulaire.", "danger");
    } else {
        $updateMDP = $Login->updateMDP($_POST['passwordMembre']);

        if ($updateMDP["result"]) {
            setFlash("Félicitations.", $updateMDP["response"]);
            header("location:?slug=index" . $_SESSION['Logged']['level']);
            die();
        } else {
            setFlash("Désolé !", $updateMDP["response"], "danger");
        }
    }
}

$Title = $Description = "Gesion de mon profil";
require '../views/header.php';
?>


<?php require 'sidebar1.php'; ?>

<div class="container-fluid">
    <?php require 'sidebartop.php'; ?>

    <div class="row">
        <div class="col-lg-4 col-md-10 col-sm-10 cols-xs-12">
            <form action="#" method="POST" class="card">
                <div class="card-header">
                    <div class="card-title">Gestion du mot de passe</div>
                    <li class="card-subtitle">Mise à jour</li>
                </div>
                <div class="card-body">
                    <div class="mb-2">
                        <label class="form-label" for="passwordMembre">Mot de passe *</label>
                        <div class="input-group is-<?= isset($error['passwordMembre']) ? 'invalid' : (isset($_POST['subFormUpdate']) ? 'valid' : ''); ?>">
                            <input type="password" class="form-control is-<?= isset($error['passwordMembre']) ? 'invalid' : (isset($_POST['subFormUpdate']) ? 'valid' : ''); ?>" aria-label="Password" id="passwordMembre" name="passwordMembre" value="<?= $_POST['passwordMembre'] ?? ''; ?>">
                            <div class="input-group-append pointer scale" onclick="Show_Password('passwordMembre')">
                                <span class="input-group-text"><i class="fa fa-eye"></i></span>
                            </div>
                        </div>
                        <div class="invalid-feedback">
                            <?= $error['passwordMembre'] ?? ''; ?>
                        </div>
                    </div>
                    <div class="mb-2">
                        <label class="form-label" for="confirmation">Confirmation *</label>
                        <div class="input-group is-<?= isset($error['confirmation']) ? 'invalid' : (isset($_POST['subFormUpdate']) ? 'valid' : ''); ?>">
                            <input type="password" class="form-control is-<?= isset($error['confirmation']) ? 'invalid' : (isset($_POST['subFormUpdate']) ? 'valid' : ''); ?>" aria-label="Password" id="confirmation" name="confirmation" value="<?= $_POST['confirmation'] ?? ''; ?>">
                            <div class="input-group-append pointer scale" onclick="Show_Password('confirmation')">
                                <span class="input-group-text"><i class="fa fa-eye"></i></span>
                            </div>
                        </div>
                        <div class="invalid-feedback">
                            <?= $error['confirmation'] ?? ''; ?>
                        </div>
                    </div>

                </div>
                <div class="card-footer">
                    <a href="?slug=updatemdp" class="btn btn-secondary" onclick="Processing()">Annuler</a>

                    <button type="submit" class="btn btn-primary" name="subFormUpdate" onclick="Processing()">Modifier</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php require '../views/scripts.php'; ?>
<?php require '../views/footer.php'; ?>