<?php
$Profil = new Profil();

if (isset($_POST['subFormProfil'])) {
    $checkData = $Profil->checkData($_POST, $_SESSION['Logged']['level'], $_SESSION['Logged']['age'], $_SESSION['Logged']['idMembre']);

    $error = $checkData['errors'];
    $_POST = $checkData['data'];

    if ($error) {
        $e = count($error) == 1 ? "l'erreur contenue" : "les " . count($error) . " erreurs contenues";
        setFlash("Désolé !", "Veuillez corriger " . $e . " dans le formulaire.", "danger");
    } else {
        $updateProfil = $Profil->updateProfil($_POST, $_SESSION['Logged']['idMembre'], $_SESSION['Logged']['age'], $_SESSION['Logged']['level']);

        if ($updateProfil['result']) {
            $_SESSION['Logged']['genreMembre'] = $_POST['genreMembre'];
            $_SESSION['Logged']['idMembre'] = $_POST['idMembre'];
            $_SESSION['Logged']['nomMembre'] = $_POST['nomMembre'];
            $_SESSION['Logged']['prenomMembre'] = $_POST['prenomMembre'];
            $_SESSION['Logged']['naissanceMembre'] = $_POST['naissanceMembre'];
            $_SESSION['Logged']['mobileMembre'] = $_POST['mobileMembre'];
            $_SESSION['Logged']['levelsMembre'] = explode(',', $_POST['levelsMembre']);
            $_SESSION['Logged']['idMembre_1'] = empty($_POST['idMembre_1']) ? NULL : $_POST['idMembre_1'];
            $_SESSION['Logged']['emailMembre'] = $_POST['emailMembre'];
            $_SESSION['Logged']['adresseMembre'] = $_POST['adresseMembre'];
            $_SESSION['Logged']['cpMembre'] = $_POST['cpMembre'];
            $_SESSION['Logged']['villeMembre'] = $_POST['villeMembre'];

            if ((int)$_SESSION['Logged']['level'] == 5) {
                $_SESSION['Logged']['poidsMembre'] = $_POST['poidsMembre'];
                $_SESSION['Logged']['tailleMembre'] = $_POST['tailleMembre'];
                $_SESSION['Logged']['clubMembre'] = $_POST['clubMembre'];
                $_SESSION['Logged']['niveauMembre'] = $_POST['niveauMembre'];
                $_SESSION['Logged']['categorieMembre'] = $_POST['categorieMembre'];
            }
            unset($_POST);
            setFlash("Opération terminée.", $updateProfil['response']);
            header("Location:?slug=index" . $_SESSION['Logged']['level']);
        } else {
            unset($_POST);
            setFlash("Désolé !", $updateProfil['response'], "danger");
            header("Location:?slug=profil");
        }
        die();
    }
} else {
}
$_POST = empty($_POST) ? $_SESSION['Logged'] : $_POST;

$Title = $Description = "Gestion de mon profil";
require '../views/header.php';
?>


<?php require 'sidebar' . $_SESSION['Logged']['level'] . '.php'; ?>

<div class="container-fluid">
    <?php require 'navbartop.php'; ?>

    <div class="row">
        <div class="col-lg-4 col-md-11 col-sm-10 cols-xs-12">
            <div class="card-header">
                <div class="card-title">MON PROFIL</div>
                <div class="card-subtitle">Informations personnelles</div>
            </div>
            <?php require 'form_profil.php'; ?>
        </div>
    </div>


</div>
<?php require '../views/scripts.php'; ?>
<?php require '../views/footer.php'; ?>