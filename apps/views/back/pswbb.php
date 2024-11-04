<?php
$PSWBB = new PSWBB();

if (isset($_POST['subFormPSWBB'])) {
    $checkData = $PSWBB->checkData($_POST);

    $error = $checkData['errors'];
    $_POST = $checkData['data'];

    if ($error) {
        $e = count($error) == 1 ? "l'erreur contenue" : "les " . count($error) . " erreurs contenues";
        setFlash("Désolé !", "Veuillez corriger " . $e . " dans le formulaire.", "danger");
    } else {
        unset($_POST['subFormPSWBB']);
        $savePSWBB = $PSWBB->savePSWBB($_POST);

        if ($savePSWBB['result']) {
            setFlash("Opération terminée.", $savePSWBB['response']);
        } else {
            setFlash("Désolé !", $savePSWBB['response'], "danger");
        }
        unset($_POST);
        header("Location:?slug=PSWBB");
        die();
    }
} else {
    $_POST = $Params;
}

$Title = $Description = "Informations PSWBB ";
require '../views/header.php';
?>


<?php require 'sidebar' . $_SESSION['Logged']['level'] . '.php'; ?>

<div class="container-fluid">
    <?php require 'navbartop.php'; ?>

    <form action="#" method="POST" class="row">
        <div class="col-lg-4 col-md-10 col-sm-8 cols-xs-12 mt-3">
            <div class="card-header">
                <div class="card-title">Informations Générales</div>
                <div class="card-subtitle">Identification</div>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="form-row mb-1">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label class="form-label" for="civilitePSWBB">Civilité du responsable</label>
                            <table style="width: 100%; table-layout: fixed;">
                                <tr>
                                    <td class="text-center" style="padding : 5px 0 11px;">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" value="1" id="madame" name="civilitePSWBB" <?= isset($_POST['civilitePSWBB']) && $_POST['civilitePSWBB'] == 1 ? 'checked' : ''; ?> aria-describedby="Civilité">
                                            <label class="form-check-label ml-1" for="madame">
                                                <span class="pointer ml-1">Mme</span>
                                            </label>
                                        </div>
                                    </td>

                                    <td class="text-center" style="padding : 5px 0 11px;">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" value="2" id="monsieur" name="civilitePSWBB" <?= isset($_POST['civilitePSWBB']) && $_POST['civilitePSWBB'] == 2 ? 'checked' : ''; ?> aria-describedby="Civilité">
                                            <label class="form-check-label ml-1" for="monsieur">
                                                <span class="pointer ml-1">Mr</span>
                                            </label>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                            <div class="invalid-feedback" style="display: block;">
                                <?= $error['genrePSWBB'] ?? ''; ?>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label class="form-label" for="phonePSWBB">Téléphone</label>
                            <input type="text" class="form-control text-center is-<?= isset($error['phonePSWBB']) ? 'invalid' : (isset($_POST['subFormPSWBB']) ? 'valid' : ''); ?>" id="phonePSWBB" name="phonePSWBB" value="<?= $_POST['phonePSWBB'] ?? ''; ?>">
                            <div class="invalid-feedback">
                                <?= $error['phonePSWBB'] ?? ''; ?>
                            </div>
                        </div>
                    </div>

                    <div class="mb-1">
                        <label class="form-label" for="responsablePSWBB">Nom / Prénom du responsable</label>
                        <input type="text" class="form-control is-<?= isset($error['responsablePSWBB']) ? 'invalid' : (isset($_POST['subFormPSWBB']) ? 'valid' : ''); ?>" id="responsablePSWBB" name="responsablePSWBB" value="<?= $_POST['responsablePSWBB'] ?? ''; ?>">
                        <div class="invalid-feedback">
                            <?= $error['responsablePSWBB'] ?? ''; ?>
                        </div>
                    </div>

                    <div class="mb-1">
                        <label class="form-label" for="emailPSWBB">Email</label>
                        <input type="text" class="form-control is-<?= isset($error['emailPSWBB']) ? 'invalid' : (isset($_POST['subFormPSWBB']) ? 'valid' : ''); ?>" id="emailPSWBB" name="emailPSWBB" value="<?= $_POST['emailPSWBB'] ?? ''; ?>">
                        <div class="invalid-feedback">
                            <?= $error['emailPSWBB'] ?? ''; ?>
                        </div>
                    </div>

                    <div class="mb-1">
                        <label class="form-label" for="adressePSWBB">Adresse</label>
                        <input type="text" class="form-control is-<?= isset($error['adressePSWBB']) ? 'invalid' : (isset($_POST['subFormPSWBB']) ? 'valid' : ''); ?>" id="adressePSWBB" name="adressePSWBB" value="<?= $_POST['adressePSWBB'] ?? ''; ?>">
                        <div class="invalid-feedback">
                            <?= $error['adressePSWBB'] ?? ''; ?>
                        </div>
                    </div>

                    <div class="form-row mb-1">
                        <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                            <label class="form-label" for="cpPSWBB">Code postal</label>
                            <input type="text" class="form-control is-<?= isset($error['cpPSWBB']) ? 'invalid' : (isset($_POST['subFormPSWBB']) ? 'valid' : ''); ?>" id="cpPSWBB" name="cpPSWBB" value="<?= $_POST['cpPSWBB'] ?? ''; ?>">
                            <div class="invalid-feedback">
                                <?= $error['cpPSWBB'] ?? ''; ?>
                            </div>
                        </div>

                        <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
                            <label class="form-label" for="villePSWBB">Ville</label>
                            <input type="text" class="form-control is-<?= isset($error['villePSWBB']) ? 'invalid' : (isset($_POST['subFormPSWBB']) ? 'valid' : ''); ?>" id="villePSWBB" name="villePSWBB" value="<?= $_POST['villePSWBB'] ?? ''; ?>">
                            <div class="invalid-feedback">
                                <?= $error['villePSWBB'] ?? ''; ?>
                            </div>
                        </div>
                    </div>

                    <div class="mb-1">
                        <label class="form-label" for="horaires">Horaires</label>
                        <textarea rows="4" class="form-control is-<?= isset($error['horaires']) ? 'invalid' : (isset($_POST['subFormPSWBB']) ? 'valid' : ''); ?>" id="horaires" name="horaires"><?= $_POST['horaires'] ?? ''; ?></textarea>
                        <div class="invalid-feedback">
                            <?= $error['horaires'] ?? ''; ?>
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
                        <input type="text" class="form-control is-<?= isset($error['whatsapp']) ? 'invalid' : (isset($_POST['subFormPSWBB']) ? 'valid' : ''); ?>" placeholder="Whatsapp" id="whatsapp" name="whatsapp" value="<?= $_POST['whatsapp'] ?? ''; ?>" aria-label=" whatsapp" aria-describedby="iconWhatsapp">
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
                        <input type="text" class="form-control is-<?= isset($error['facebook']) ? 'invalid' : (isset($_POST['subFormPSWBB']) ? 'valid' : ''); ?>" placeholder="Facebook" id="facebook" name="facebook" value="<?= $_POST['facebook'] ?? ''; ?>" aria-label=" facebook" aria-describedby="iconFacebook">
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
                        <input type="text" class="form-control is-<?= isset($error['instagram']) ? 'invalid' : (isset($_POST['subFormPSWBB']) ? 'valid' : ''); ?>" placeholder="instagram" id="instagram" name="instagram" value="<?= $_POST['instagram'] ?? ''; ?>" aria-label=" instagram" aria-describedby="iconInstagram">
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
                        <input type="text" class="form-control is-<?= isset($error['youtube']) ? 'invalid' : (isset($_POST['subFormPSWBB']) ? 'valid' : ''); ?>" placeholder="You Tube" id="youtube" name="youtube" value="<?= $_POST['youtube'] ?? ''; ?>" aria-label="youtube" aria-describedby="iconYoutube">
                        <div class="invalid-feedback">
                            <?= $error['youtube'] ?? ''; ?>
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    <a href="?slug=pswbb" class="btn btn-secondary" onclick="Processing()">Annuler</a>

                    <button type="submit" class="btn btn-primary" name="subFormPSWBB" onclick="Processing('Enregistrement des données...')">Valider</button>
                </div>
            </div>
        </div>
    </form>


</div>
<?php require '../views/scripts.php'; ?>
<?php require '../views/footer.php'; ?>