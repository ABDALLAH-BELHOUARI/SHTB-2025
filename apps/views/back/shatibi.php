<?php
$Shatibi = new Shatibi();

if (isset($_POST['subFormShatibi'])) {
    $checkData = $Shatibi->checkData($_POST);

    $error = $checkData['errors'];
    $_POST = $checkData['data'];

    if ($error) {
        $e = count($error) == 1 ? "l'erreur contenue" : "les " . count($error) . " erreurs contenues";
        setFlash("Désolé !", "Veuillez corriger " . $e . " dans le formulaire.", "danger");
    } else {
        unset($_POST['subFormShatibi']);
        $saveShatibi = $Shatibi->saveShatibi($_POST);

        if ($saveShatibi['result']) {
            setFlash("Opération terminée.", $saveShatibi['response']);
        } else {
            setFlash("Désolé !", $saveShatibi['response'], "danger");
        }
        unset($_POST);
        header("Location:?slug=shatibi");
        die();
    }
} else {
    $_POST = $Params;
}

$Title = $Description = "Informations Shatibi ";
require '../views/header.php';
?>


<?php require 'sidebar' . $_SESSION['Logged']['level'] . '.php'; ?>

<div class="container-fluid">
    <?php require 'navbartop.php'; ?>

    <form action="#" method="POST" class="row">
        <div class="col-lg-4 col-md-10 col-sm-8 cols-xs-12 mt-3">
            <div class="card-header">
                <div class="card-title">Informations Générales</div>
                <div class="card-subtitle">Renseignements</div>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="form-row mb-1">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label class="form-label" for="civiliteShatibi">Civilité du responsable</label>
                            <table style="width: 100%; table-layout: fixed;">
                                <tr>
                                    <td class="text-center" style="padding : 5px 0 11px;">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" value="1" id="madame" name="civiliteShatibi" <?= isset($_POST['civiliteShatibi']) && $_POST['civiliteShatibi'] == 1 ? 'checked' : ''; ?> aria-describedby="Civilité">
                                            <label class="form-check-label ml-1" for="madame">
                                                <span class="pointer ml-1">Mme</span>
                                            </label>
                                        </div>
                                    </td>

                                    <td class="text-center" style="padding : 5px 0 11px;">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" value="2" id="monsieur" name="civiliteShatibi" <?= isset($_POST['civiliteShatibi']) && $_POST['civiliteShatibi'] == 2 ? 'checked' : ''; ?> aria-describedby="Civilité">
                                            <label class="form-check-label ml-1" for="monsieur">
                                                <span class="pointer ml-1">Mr</span>
                                            </label>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                            <div class="invalid-feedback" style="display: block;">
                                <?= $error['genreShatibi'] ?? ''; ?>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label class="form-label" for="phoneShatibi">Téléphone</label>
                            <input type="text" class="form-control text-center is-<?= isset($error['phoneShatibi']) ? 'invalid' : (isset($_POST['subFormShatibi']) ? 'valid' : ''); ?>" id="phoneShatibi" name="phoneShatibi" value="<?= $_POST['phoneShatibi'] ?? ''; ?>">
                            <div class="invalid-feedback">
                                <?= $error['phoneShatibi'] ?? ''; ?>
                            </div>
                        </div>
                    </div>

                    <div class="mb-1">
                        <label class="form-label" for="responsableShatibi">Nom / Prénom du responsable</label>
                        <input type="text" class="form-control is-<?= isset($error['responsableShatibi']) ? 'invalid' : (isset($_POST['subFormShatibi']) ? 'valid' : ''); ?>" id="responsableShatibi" name="responsableShatibi" value="<?= $_POST['responsableShatibi'] ?? ''; ?>">
                        <div class="invalid-feedback">
                            <?= $error['responsableShatibi'] ?? ''; ?>
                        </div>
                    </div>

                    <div class="mb-1">
                        <label class="form-label" for="emailShatibi">Email</label>
                        <input type="text" class="form-control is-<?= isset($error['emailShatibi']) ? 'invalid' : (isset($_POST['subFormShatibi']) ? 'valid' : ''); ?>" id="emailShatibi" name="emailShatibi" value="<?= $_POST['emailShatibi'] ?? ''; ?>">
                        <div class="invalid-feedback">
                            <?= $error['emailShatibi'] ?? ''; ?>
                        </div>
                    </div>

                    <div class="mb-1">
                        <label class="form-label" for="adresseShatibi">Adresse</label>
                        <input type="text" class="form-control is-<?= isset($error['adresseShatibi']) ? 'invalid' : (isset($_POST['subFormShatibi']) ? 'valid' : ''); ?>" id="adresseShatibi" name="adresseShatibi" value="<?= $_POST['adresseShatibi'] ?? ''; ?>">
                        <div class="invalid-feedback">
                            <?= $error['adresseShatibi'] ?? ''; ?>
                        </div>
                    </div>

                    <div class="form-row mb-1">
                        <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                            <label class="form-label" for="cpShatibi">Code postal</label>
                            <input type="text" class="form-control is-<?= isset($error['cpShatibi']) ? 'invalid' : (isset($_POST['subFormShatibi']) ? 'valid' : ''); ?>" id="cpShatibi" name="cpShatibi" value="<?= $_POST['cpShatibi'] ?? ''; ?>">
                            <div class="invalid-feedback">
                                <?= $error['cpShatibi'] ?? ''; ?>
                            </div>
                        </div>

                        <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
                            <label class="form-label" for="villeShatibi">Ville</label>
                            <input type="text" class="form-control is-<?= isset($error['villeShatibi']) ? 'invalid' : (isset($_POST['subFormShatibi']) ? 'valid' : ''); ?>" id="villeShatibi" name="villeShatibi" value="<?= $_POST['villeShatibi'] ?? ''; ?>">
                            <div class="invalid-feedback">
                                <?= $error['villeShatibi'] ?? ''; ?>
                            </div>
                        </div>
                    </div>

                    <div class="mb-1">
                        <label class="form-label" for="accueil">Horaires de l'accueil</label>
                        <textarea rows="4" class="form-control is-<?= isset($error['accueil']) ? 'invalid' : (isset($_POST['subFormShatibi']) ? 'valid' : ''); ?>" id="accueil" name="accueil"><?= $_POST['accueil'] ?? ''; ?></textarea>
                        <div class="invalid-feedback">
                            <?= $error['accueil'] ?? ''; ?>
                        </div>
                    </div>

                    <div class="mb-1">
                        <label class="form-label" for="bureau">Horaires du bureau</label>
                        <textarea rows="4" class="form-control is-<?= isset($error['bureau']) ? 'invalid' : (isset($_POST['subFormShatibi']) ? 'valid' : ''); ?>" id="bureau" name="bureau"><?= $_POST['bureau'] ?? ''; ?></textarea>
                        <div class="invalid-feedback">
                            <?= $error['bureau'] ?? ''; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-10 col-sm-8 cols-xs-12 mt-3">
            <div class="card-header">
                <div class="card-title">Réseaux Sociaux</div>
                <div class="card-subtitle">Indiquer les URL</div>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <div class="input-group-text text-center py-0" id="iconWhatsapp" style="width: 60px;">
                                <i class="fa fa-whatsapp" style="font-size: 25pt;"></i>
                            </div>
                        </div>
                        <input type="text" class="form-control is-<?= isset($error['whatsapp']) ? 'invalid' : (isset($_POST['subFormShatibi']) ? 'valid' : ''); ?>" placeholder="Whatsapp" id="whatsapp" name="whatsapp" value="<?= $_POST['whatsapp'] ?? ''; ?>" aria-label=" whatsapp" aria-describedby="iconWhatsapp">
                        <div class="invalid-feedback">
                            <?= $error['whatsapp'] ?? ''; ?>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <div class="input-group-text text-center py-0" id="iconFacebook" style="width: 60px;">
                                <i class="fa fa-facebook-square" style="font-size: 25pt;"></i>
                            </div>
                        </div>
                        <input type="text" class="form-control is-<?= isset($error['facebook']) ? 'invalid' : (isset($_POST['subFormShatibi']) ? 'valid' : ''); ?>" placeholder="Facebook" id="facebook" name="facebook" value="<?= $_POST['facebook'] ?? ''; ?>" aria-label=" facebook" aria-describedby="iconFacebook">
                        <div class="invalid-feedback">
                            <?= $error['facebook'] ?? ''; ?>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <div class="input-group-text text-center py-0" id="iconInstagram" style="width: 60px;">
                                <i class="fa fa-instagram" style="font-size: 25pt;"></i>
                            </div>
                        </div>
                        <input type="text" class="form-control is-<?= isset($error['instagram']) ? 'invalid' : (isset($_POST['subFormShatibi']) ? 'valid' : ''); ?>" placeholder="instagram" id="instagram" name="instagram" value="<?= $_POST['instagram'] ?? ''; ?>" aria-label=" instagram" aria-describedby="iconInstagram">
                        <div class="invalid-feedback">
                            <?= $error['instagram'] ?? ''; ?>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <div class="input-group-text text-center py-0" id="iconYoutube" style="width: 60px;">
                                <i class="fa fa-youtube-play" style="font-size: 25pt;"></i>
                            </div>
                        </div>
                        <input type="text" class="form-control is-<?= isset($error['youtube']) ? 'invalid' : (isset($_POST['subFormShatibi']) ? 'valid' : ''); ?>" placeholder="You Tube" id="youtube" name="youtube" value="<?= $_POST['youtube'] ?? ''; ?>" aria-label="youtube" aria-describedby="iconYoutube">
                        <div class="invalid-feedback">
                            <?= $error['youtube'] ?? ''; ?>
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    <a href="?slug=Shatibi" class="btn btn-secondary" onclick="Processing()">Annuler</a>

                    <button type="submit" class="btn btn-primary" name="subFormShatibi" onclick="Processing('Enregistrement des données...')">Valider</button>
                </div>
            </div>
        </div>
    </form>


</div>
<?php require '../views/scripts.php'; ?>
<?php require '../views/footer.php'; ?>