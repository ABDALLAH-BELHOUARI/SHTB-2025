<?php

if (isset($_SESSION['Logged'])) {
    $SwitchInterface = false;
    if (is_null($_SESSION['Logged']['provisoireMembre'])) {
        if (basename($_SERVER['REQUEST_URI']) != '?slug=logout') {
            $SwitchInterface = count($_SESSION['Logged']['levelsMembre']) > 1 ? true : false;

            if (isset($_GET['switchInterface'])) {
                if (in_array($_GET['switchInterface'], $_SESSION['Logged']['levelsMembre'])) {
                    sleep(1);
                    $_SESSION['Logged']['level'] = $_GET['switchInterface'];
                    header("Location:?slug=index" . $_SESSION['Logged']['level']);
                    die();
                }
            }
        }
    } else {
        if (basename($_SERVER['REQUEST_URI']) != '?slug=updatemdp') {
            setFlash('Désolé ! ', 'Vous devez mettre à jour votre mot de passe !', 'info');
            header('Location:?slug=updatemdp');
            die();
        }
    }
} elseif (!isset($_SESSION["Key"]) || ($_SESSION["Key"] != $keysession)) {
    if (substr(basename($_SERVER['REQUEST_URI']), 6, 8) != 'register') {

        if (basename($_SERVER['REQUEST_URI']) != '?slug=login') {
            setFlash('Désolé ! ', 'Vous devez vous connecter pour accéder à votre espace !', 'info');
            header('Location:?slug=login');
            die();
        }
    }
}
