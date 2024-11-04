<form action="#" method="POST" class="card">
    <div class="card-body">
        <div class="form-row mb-1">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="form-label" style="margin-top: 4px !important;">Civilité</div>
                <table style="width: 100%; table-layout: fixed;">
                    <tr>
                        <td class="text-center" style="padding : 5px 0">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="1" id="madame" name="genreMembre" <?= isset($_POST['genreMembre']) && $_POST['genreMembre'] == 1 ? 'checked' : ''; ?> aria-describedby="Civilité">
                                <label class="form-check-label ml-1" for="madame">
                                    <span class="pointer ml-1">Mme</span>
                                </label>
                            </div>
                        </td>

                        <td class="text-center" style="padding : 5px 0">
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
                <label class="form-label" for="idMembre">Identifiant</label>
                <input type="text" class="form-control text-center" id="idMembre" name="idMembre" value="<?= $_POST['idMembre'] ?? ''; ?>" onfocus="blur()" style="background: #f8f8f8; color: #d00; letter-spacing: 3px; font-weight: 500; font-size: 19pt; height: 40px;">
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

        <?php if ($_SERVER['QUERY_STRING'] == 'slug=profil') : ?>
            <input type="hidden" name="levelsMembre" value="<?= implode(',', $_SESSION['Logged']['levelsMembre']); ?>">
            <input type="hidden" name="idMembre_1" value="<?= $_SESSION['Logged']['idMembre_1']; ?>">
            <?php if ($_SESSION['Logged']['age'] < 18) : ?>
                rattachement & lien parenté
            <?php endif; ?>
        <?php else : ?>

        <?php endif; ?>

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

        <?php if ((int)$_SESSION['Logged']['level'] == 5) : ?>
            <div class="form-row mb-1">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label class="form-label" for="poidsMembre">Poids en Kg</label>
                    <input type="text" class="form-control text-center is-<?= isset($error['poidsMembre']) ? 'invalid' : (isset($_POST['subFormProfil']) ? 'valid' : ''); ?>" id="poidsMembre" name="poidsMembre" value="<?= $_POST['poidsMembre'] ?? ''; ?>" onkeypress="return VerifCasse(event,'number');" maxlength="3">
                    <div class="invalid-feedback">
                        <?= $error['poidsMembre'] ?? ''; ?>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label class="form-label" for="tailleMembre">Taille en cm</label>
                    <input type="text" class="form-control text-center is-<?= isset($error['tailleMembre']) ? 'invalid' : (isset($_POST['subFormProfil']) ? 'valid' : ''); ?>" id="tailleMembre" name="tailleMembre" value="<?= $_POST['tailleMembre'] ?? ''; ?>" onkeypress="return VerifCasse(event,'number');" maxlength="3">
                    <div class="invalid-feedback">
                        <?= $error['tailleMembre'] ?? ''; ?>
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
                    <label class="form-label" for="niveauMembre">Niveau</label>
                    <select name="niveauMembre" id="niveauMembre" class="form-control is-<?= isset($error['niveauMembre']) ? 'invalid' : (isset($_POST['subFormProfil']) ? 'valid' : ''); ?>">
                        <?php for ($n = 0; $n < count($Niveaux); $n++) : ?>
                            <option <?= isset($_POST['niveauMembre']) && $_POST['niveauMembre'] == $n ? 'selected' : ''; ?> value="<?= $n; ?>"><?= $Niveaux[$n]; ?></option>
                        <?php endfor; ?>
                    </select>
                    <div class="invalid-feedback">
                        <?= $error['niveauMembre'] ?? ''; ?>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label class="form-label" for="categorieMembre">Catégorie</label>
                    <select name="categorieMembre" id="categorieMembre" class="form-control is-<?= isset($error['categorieMembre']) ? 'invalid' : (isset($_POST['subFormProfil']) ? 'valid' : ''); ?>">
                        <?php for ($c = 0; $c < count($Categories); $c++) : ?>
                            <option <?= isset($_POST['categorieMembre']) && $_POST['categorieMembre'] == $c ? 'selected' : ''; ?> value="<?= $c; ?>"><?= $Categories[$c]; ?></option>
                        <?php endfor; ?>
                    </select>
                    <div class="invalid-feedback">
                        <?= $error['categorieMembre'] ?? ''; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>

    <div class="card-footer">
        <a href="?slug=profil" class="btn btn-sm btn-secondary" onclick="Processing()">Annuler</a>

        <button type="submit" class="btn btn-sm btn-primary" name="subFormProfil" onclick="Processing()">Valider</button>
    </div>
</form>