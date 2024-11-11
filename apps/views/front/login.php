<?php

$Login = new Login();

if (isset($_COOKIE['userLogged'])) {
    $cooky = json_decode($_COOKIE['userLogged'], true);
    if ($cooky['key'] == sha1($cooky['identifiant'] . $cooky['password'])) {
        $cooky = unserialize($_COOKIE['userLogged']);
        $passwordMembre = $db->quote($cooky['password']);
        $Connexion = $Login->Connexion($cooky['identifiant'], $cooky['password'], true);

        if ($Connexion) {
            if ((int)$_SESSION['Auth']['activerMembre'] == 1) {
                setFlash("As Salemou 'alaikoum", "Bienvenue, <span>" . $_SESSION["Auth"]["username"] . "</span>, vous êtes maintenant connecté" . ((int)$_SESSION['Auth']["genreMembre"] == "1" ? "e" : "") . ".");
                header("Location:index" . $_SESSION["Auth"]["level"] . ".php");
            } else {
                header("Location:desactived.php");
                die();
            }
            die();
        } else {
            setFlash('Désolé ! ', "Aucun compte correspondant n'a été trouvé.", "info");
            header("Location:?slug=index");
            die();
        }
    }
} else {
    if (isset($_POST['subFormLogin'])) {
        unset($_POST['subFormLogin']);
        $error = $Login->checkData($_POST);

        if ($error) {
            $e = count($error) == 1 ? "l'erreur contenue" : "les " . count($error) . " erreurs contenues";
            setFlash("Désolé !", "Veuillez corriger " . $e . " dans le formulaire.", "danger");
        } else {
            $connexion = $Login->connexion($_POST);
            if ($connexion["result"]) {
                setFlash("Félicitations.", $connexion["response"]);
                header("location:?slug=index" . $_SESSION['Logged']['level']);
                die();
            } else {
                setFlash("Désolé !", $connexion["response"], "danger");
            }
        }
    } elseif (isset($_POST['subFormForget'])) {
        unset($_POST['subFormForget']);
        if (empty($_POST['emailMembre'])) {
            $error['emailMembre'] = "Saisir votre email";
            setFlash("Oops !", "Veuillez saisir votre email...", "danger");
        } else {
            $generatePassword = $Login->generatePassword($_POST['emailMembre']);
            if ($generatePassword["result"]) {
                setFlash("Félicitations.", $generatePassword["response"]);
            } else {
                setFlash("Désolé !", $generatePassword["response"], "danger");
            }
            unset($_POST);
            header("location:?slug=login");
            die();
        }
    }
}

$Title = "Se connecter";
$Description = "";

require '../views/header.php';
?>

<div class="container-fluid">
    <?= flash(); ?>

    <div class="d-flex align-items-center justify-content-center" style="height: 100vh;">
        <div class="p-3 m-2" style="width: 330px;">
            <h5 class="text-center">Mon Espace Membre</h5>
            <hr>
            <img src="assets/img/loader.png" alt="logo" class="login-logo my-4">

            <form action="#" method="POST">
                <div class="mb-2">
                    <label class="form-label" for="emailMembre">Email ou Identifiant *</label>
                    <input type="text" class="form-control is-<?= isset($error['emailMembre']) ? 'invalid' : (isset($_POST['subFormLogin']) ? 'valid' : ''); ?>" id="emailMembre" name="emailMembre" value="<?= $_POST['emailMembre'] ?? ''; ?>">
                    <div class="invalid-feedback">
                        <?= $error['emailMembre'] ?? ''; ?>
                    </div>
                </div>

                <div class="mb-2">
                    <label class="form-label" for="passwordMembre">Mot de passe *</label>
                    <div class="input-group is-<?= isset($error['passwordMembre']) ? 'invalid' : (isset($_POST['subFormLogin']) ? 'valid' : ''); ?>">
                        <input type="password" class="form-control is-<?= isset($error['passwordMembre']) ? 'invalid' : (isset($_POST['subFormLogin']) ? 'valid' : ''); ?>" aria-label="Password" id="passwordMembre" name="passwordMembre" value="<?= $_POST['passwordMembre'] ?? ''; ?>">
                        <div class="input-group-append pointer scale" onclick="Show_Password('passwordMembre')">
                            <span class="input-group-text"><i class="fa fa-eye"></i></span>
                        </div>
                    </div>
                    <div class="invalid-feedback">
                        <?= $error['passwordMembre'] ?? ''; ?>
                    </div>
                </div>

                <div class="form-group">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="1" id="sessionOuverte" name="sessionOuverte" <?= isset($_POST['sessionOuverte']) ? 'checked' : ''; ?> aria-describedby="sessionOuverte">
                        <label class="form-check-label form-label" for="sessionOuverte">
                            <span class="pointer ml-1">Garder ma session ouverte</span>
                        </label>
                    </div>
                </div>

                <div class="form-group text-right my-4">
                    <button class="btn btn-primary" type="submit" name="subFormLogin" onclick="Processing()">Se connecter</button>
                </div>

                <div class="form-group text-center">
                    <div class="my-2">
                        <button type="submit" class="btn-text" name="subFormForget" onclick="Processing(); ">Mot de pase oublié</button>
                    </div>
                    <button type="button" onclick="Processing(); window.location.href='../../'" class="btn-text">Retour au site</button>
                </div>
            </form>

        </div>
    </div>
</div>

<?php
require '../views/scripts.php';
require '../views/footer.php';
?>