<?php
ControlAccess([1]);


$Title = $Description = "Gesion de mon profil";
require '../views/header.php';
?>


<?php require 'sidebar' . $_SESSION['Logged']['level'] . '.php'; ?>

<div class="container-fluid">
    <?php require 'navbartop.php'; ?>
    <?= flash(); ?>

    <div class="row">
        <div class="col-lg-4 col-md-11 col-sm-10 cols-xs-12">
            <form action="#" method="POST" class="card">
                <div class="card-header">
                    <div class="card-title">Informations personnelles</div>
                    <div class="card-subtitle">Formulaire</div>
                </div>
                <div class="card-body">
                    <div class="form-row mb-1">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label class="form-label" for="genreMembre">Civilité</label>
                            <table style="width: 100%; table-layout: fixed;">
                                <tr>
                                    <td class="text-center" style="padding : 5px 0 11px;">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" value="1" id="madame" name="genreMembre" <?= isset($_POST['genreMembre']) && $_POST['genreMembre'] == 1 ? 'checked' : ''; ?> aria-describedby="Civilité">
                                            <label class="form-check-label ml-1" for="madame">
                                                <span class="pointer ml-1">Mme</span>
                                            </label>
                                        </div>
                                    </td>

                                    <td class="text-center" style="padding : 5px 0 11px;">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" value="2" id="monsieur" name="genreMembre" <?= isset($_POST['genreMembre']) && $_POST['genreMembre'] == 2 ? 'checked' : ''; ?> aria-describedby="Civilité">
                                            <label class="form-check-label ml-1" for="monsieur">
                                                <span class="pointer ml-1">Mr</span>
                                            </label>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                            <div class="invalid-feedback" style="display: block;">
                                <?= $error['genreMembre'] ?? ''; ?>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

                        </div>
                    </div>

                    <div class="form-row mb-1">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label class="form-label" for="nomMembre">Nom</label>
                            <input type="text" class="form-control is-<?= isset($error['nomMembre']) ? 'invalid' : (isset($_POST['subFormProfil']) ? 'valid' : ''); ?>" id="nomMembre" name="nomMembre" value="<?= $_POST['nomMembre'] ?? ''; ?>">
                            <div class="invalid-feedback">
                                <?= $error['nomMembre'] ?? ''; ?>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label class="form-label" for="prenomMembre">Prénom</label>
                            <input type="text" class="form-control is-<?= isset($error['prenomMembre']) ? 'invalid' : (isset($_POST['subFormProfil']) ? 'valid' : ''); ?>" id="prenomMembre" name="prenomMembre" value="<?= $_POST['prenomMembre'] ?? ''; ?>">
                            <div class="invalid-feedback">
                                <?= $error['prenomMembre'] ?? ''; ?>
                            </div>
                        </div>
                    </div>

                    <div class="form-row mb-1">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label class="form-label" for="naissanceMembre">Date de naissance</label>
                            <input type="date" class="form-control text-center is-<?= isset($error['naissanceMembre']) ? 'invalid' : (isset($_POST['subFormProfil']) ? 'valid' : ''); ?>" id="naissanceMembre" name="naissanceMembre" value="<?= $_POST['naissanceMembre'] ?? ''; ?>">
                            <div class="invalid-feedback">
                                <?= $error['naissanceMembre'] ?? ''; ?>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label class="form-label" for="mobileMembre">N° de mobile</label>
                            <input type="text" class="form-control text-center is-<?= isset($error['mobileMembre']) ? 'invalid' : (isset($_POST['subFormProfil']) ? 'valid' : ''); ?>" id="mobileMembre" name="mobileMembre" value="<?= $_POST['mobileMembre'] ?? ''; ?>">
                            <div class="invalid-feedback">
                                <?= $error['mobileMembre'] ?? ''; ?>
                            </div>
                        </div>
                    </div>

                    <div class="mb-1">
                        <label class="form-label" for="emailMembre">Email</label>
                        <input type="text" class="form-control is-<?= isset($error['emailMembre']) ? 'invalid' : (isset($_POST['subFormProfil']) ? 'valid' : ''); ?>" id="emailMembre" name="emailMembre" value="<?= $_POST['emailMembre'] ?? ''; ?>">
                        <div class="invalid-feedback">
                            <?= $error['emailMembre'] ?? ''; ?>
                        </div>
                    </div>

                    <div class="mb-1">
                        <label class="form-label" for="adresseMembre">Adresse</label>
                        <input type="text" class="form-control is-<?= isset($error['adresseMembre']) ? 'invalid' : (isset($_POST['subFormProfil']) ? 'valid' : ''); ?>" id="adresseMembre" name="adresseMembre" value="<?= $_POST['adresseMembre'] ?? ''; ?>">
                        <div class="invalid-feedback">
                            <?= $error['adresseMembre'] ?? ''; ?>
                        </div>
                    </div>

                    <div class="form-row mb-1">
                        <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                            <label class="form-label" for="cpMembre">Code postal</label>
                            <input type="text" class="form-control is-<?= isset($error['cpMembre']) ? 'invalid' : (isset($_POST['subFormProfil']) ? 'valid' : ''); ?>" id="cpMembre" name="cpMembre" value="<?= $_POST['cpMembre'] ?? ''; ?>">
                            <div class="invalid-feedback">
                                <?= $error['cpMembre'] ?? ''; ?>
                            </div>
                        </div>

                        <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
                            <label class="form-label" for="villeMembre">Ville</label>
                            <input type="text" class="form-control is-<?= isset($error['villeMembre']) ? 'invalid' : (isset($_POST['subFormProfil']) ? 'valid' : ''); ?>" id="villeMembre" name="villeMembre" value="<?= $_POST['villeMembre'] ?? ''; ?>">
                            <div class="invalid-feedback">
                                <?= $error['villeMembre'] ?? ''; ?>
                            </div>
                        </div>
                    </div>

                    <div class="form-row mb-1">
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <div class="mb-1">
                                <label class="form-label" for="poidsMembre">Poids en Kg</label>
                                <input type="text" class="form-control text-center is-<?= isset($error['poidsMembre']) ? 'invalid' : (isset($_POST['subFormProfil']) ? 'valid' : ''); ?>" id="poidsMembre" name="poidsMembre" value="<?= $_POST['poidsMembre'] ?? ''; ?>" onkeypress="return VerifCasse(event,'number');" maxlength="3">
                                <div class="invalid-feedback">
                                    <?= $error['poidsMembre'] ?? ''; ?>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <div class="mb-1">
                                <label class="form-label" for="tailleMembre">Taille en cm</label>
                                <input type="text" class="form-control text-center is-<?= isset($error['tailleMembre']) ? 'invalid' : (isset($_POST['subFormProfil']) ? 'valid' : ''); ?>" id="tailleMembre" name="tailleMembre" value="<?= $_POST['tailleMembre'] ?? ''; ?>" onkeypress="return VerifCasse(event,'number');" maxlength="3">
                                <div class="invalid-feedback">
                                    <?= $error['tailleMembre'] ?? ''; ?>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <div class="mb-1">
                                <label class="form-label" for="pointureMembre">Pointure</label>
                                <input type="text" class="form-control text-center is-<?= isset($error['pointureMembre']) ? 'invalid' : (isset($_POST['subFormProfil']) ? 'valid' : ''); ?>" id="pointureMembre" name="pointureMembre" value="<?= $_POST['pointureMembre'] ?? ''; ?>" onkeypress="return VerifCasse(event,'number');" maxlength="2">
                                <div class="invalid-feedback">
                                    <?= $error['pointureMembre'] ?? ''; ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mb-1">
                        <label class="form-label" for="clubMembre">Club</label>
                        <input type="text" class="form-control is-<?= isset($error['clubMembre']) ? 'invalid' : (isset($_POST['subFormProfil']) ? 'valid' : ''); ?>" id="clubMembre" name="clubMembre" value="<?= $_POST['clubMembre'] ?? ''; ?>">
                        <div class="invalid-feedback">
                            <?= $error['clubMembre'] ?? ''; ?>
                        </div>
                    </div>

                    <div class="form-row mb-1">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="mb-1">
                                <label class="form-label" for="niveauMembre">Niveau</label>
                                <input type="text" class="form-control is-<?= isset($error['niveauMembre']) ? 'invalid' : (isset($_POST['subFormProfil']) ? 'valid' : ''); ?>" id="niveauMembre" name="niveauMembre" value="<?= $_POST['niveauMembre'] ?? ''; ?>">
                                <div class="invalid-feedback">
                                    <?= $error['niveauMembre'] ?? ''; ?>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="mb-1">
                                <label class="form-label" for="categorieMembre">Catégorie</label>
                                <input type="text" class="form-control is-<?= isset($error['categorieMembre']) ? 'invalid' : (isset($_POST['subFormProfil']) ? 'valid' : ''); ?>" id="categorieMembre" name="categorieMembre" value="<?= $_POST['categorieMembre'] ?? ''; ?>">
                                <div class="invalid-feedback">
                                    <?= $error['categorieMembre'] ?? ''; ?>
                                </div>
                            </div>
                        </div>
                    </div>>

                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input is-invalid" type="checkbox" value="" id="invalidCheck3" aria-describedby="invalidCheck3Feedback">
                            <label class="form-check-label form-label" for="invalidCheck3">
                                Agree to terms and conditions
                            </label>
                            <div id="invalidCheck3Feedback" class="invalid-feedback">
                                You must agree before submitting.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="?slug=profil" class="btn btn-sm btn-secondary" onclick="Processing()">Annuler</a>

                    <button type="submit" class="btn btn-sm btn-primary" name="subFormProfil" onclick="Processing()">Valider</button>
                </div>
            </form>
        </div>

        <div class="col-lg-8 col-md-12 col-sm-12 cols-xs-12 mt-3">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Titre</div>
                    <div class="card-subtitle">Sous titre</div>
                </div>
                <div class="card-body">
                    <div class="ce_ixelgen_progress_bar">
                        <div class="progress_bar">
                            <div class="progress_bar_item grid-x">
                                <div class="item_label cell auto">Performance</div>
                                <div class="item_value cell shrink">0 %</div>
                                <div class="item_bar cell">
                                    <div class="progress" data-progress="20"></div>
                                </div>
                            </div>
                            <div class="progress_bar_item grid-x">
                                <div class="item_label cell auto">Rapidité</div>
                                <div class="item_value cell shrink">0 %</div>
                                <div class="item_bar cell">
                                    <div class="progress" data-progress="98"></div>
                                </div>
                            </div>
                            <div class="progress_bar_item grid-x">
                                <div class="item_label cell auto">Accélération</div>
                                <div class="item_value cell shrink">0 %</div>
                                <div class="item_bar cell">
                                    <div class="progress" data-progress="100"></div>
                                </div>
                            </div>
                            <div class="progress_bar_item grid-x">
                                <div class="item_label cell auto">Dribles</div>
                                <div class="item_value cell shrink">0 %</div>
                                <div class="item_bar cell">
                                    <div class="progress" data-progress="63"></div>
                                </div>
                            </div>
                            <div class="progress_bar_item grid-x">
                                <div class="item_label cell auto">Choot</div>
                                <div class="item_value cell shrink">0 %</div>
                                <div class="item_bar cell">
                                    <div class="progress" data-progress="42"></div>
                                </div>
                            </div>
                        </div>
                        <button onclick="progress_bar()" class="btn btn-sm btn-dark">Démarrer</button>

                        <a href="#" class="btn btn-sm btn-danger" onclick="sweetAlert('Vous confirmez ?', 'La supression de ce versement sera définitive !', '?slug=profil&membre=2&delete=3', 'warning')"><i class="bi bi-trash-fill"></i>Supprimer</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
require '../views/footer.php';
?>