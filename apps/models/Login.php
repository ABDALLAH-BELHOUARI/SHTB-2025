<?php

class Login
{
    public function checkData($data)
    {
        $error = [];
        if (empty($data["emailMembre"])) {
            $error['emailMembre'] = "Saisir votre email ou votre identifiant";
        } else {
            if (is_numeric($data["emailMembre"])) {
                if (strlen($data["emailMembre"]) != 6) {
                    $error['emailMembre'] = "Identifiant à 6 chiffres";
                }
            } elseif (!preg_match('/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/', $data["emailMembre"])) {
                $error['emailMembre'] = "Format d'email invalide";
            }
        }
        if (empty($data["passwordMembre"])) {
            $error['passwordMembre'] = "Saisir votre mot de passe";
        }
        return $error;
    }

    public function connexion($data)
    {
        global $db;
        $emailMembre = $db->quote($data['emailMembre']);
        $passwordMembre = $db->quote(sha1($data['passwordMembre']));
        $SELECT = "SELECT *, 
                    (DATE_FORMAT(FROM_DAYS(TO_DAYS(NOW())-TO_DAYS(`naissanceMembre`)), '%Y')+0) as age
                                    ";
        $Membre = $db->query("$SELECT FROM membre 
                                    WHERE idMembre = $emailMembre
                                    AND  passwordMembre = $passwordMembre
                                ")->fetch();
        if (!$Membre) {
            $Membre = $db->query("$SELECT FROM membre 
                                    WHERE emailMembre = $emailMembre
                                    AND  passwordMembre = $passwordMembre
                                ")->fetch();
        }
        if ($Membre) {
            $_SESSION['Logged'] = $Membre;

            if (isset($data["sessionOuverte"])) {
                $cooky = [
                    'identifiant' => trim($data['emailMembre']),
                    'password' => sha1(trim($data['passwordMembre'])),
                    'key' => sha1(trim($data['emailMembre']) . trim($data['passwordMembre']))
                ];
                setcookie('userLogged', json_encode($cooky), time() + 2 * 24 * 3600, null, null, false, false);
            } else {
                setcookie('userLogged', '', time() - 3600, null, null, false, false);
                unset($_COOKIE["userLogged"]);
            }
            $_SESSION['nameMembre'] = ((int)$_SESSION['Logged']['genreMembre'] == 1 ? 'Mme ' : 'Mr ') . $_SESSION['Logged']['nomMembre'] . " " . $_SESSION['Logged']['prenomMembre'];
            $_SESSION['Logged']['levelsMembre'] = explode(',', $_SESSION['Logged']['levelsMembre']);
            $_SESSION['Logged']['level'] = $_SESSION['Logged']['levelsMembre'][0];
            return [
                'result' => true,
                'response' => "<span>" . $_SESSION['nameMembre'] . "</span> vous êtes maintenant connecté" . ((int)$_SESSION['Logged']['genreMembre'] == 1 ? 'e' : '') . '.'
            ];
        } else {
            return [
                'result' => false,
                'response' => "Aucun membre correspondant n'a été trouvé avec ces identifiants."
            ];
        }
    }

    public function generatePassword($email)
    {
        global $db;
        /**
         * 	RECHERCHE DU MEMBRE
         */
        $emailMembre = $db->quote($email);
        $Membre = $db->query("SELECT idMembre, genreMembre, nomMembre, prenomMembre 
										FROM membre 
										WHERE emailMembre = $emailMembre
									")->fetch();
        if ($Membre) {
            /**
             * 	GÉNÉRATION D'UN NOUVEAU MOT DE PASSE À 10 CARACTÈRES
             */
            $characters = array(1, 2, 3, 4, 5, 6, 7, 8, 9, "a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z", "&", "#", "@", "%");
            $newpass = "";
            for ($p = 0; $p < 8; $p++) {
                $newpass .= $characters[array_rand($characters)];
            }
            /**
             * 	MISE À JOUR DU MOT DE PASSE + PROVISOIRE
             */
            $passwordMembre = $db->quote(sha1($newpass));
            $provisoireMembre = $db->quote($newpass);
            $idMembre = $db->quote($Membre['idMembre']);

            $sql = $db->prepare("UPDATE membre SET 
										provisoireMembre = $provisoireMembre, 
										passwordMembre = $passwordMembre 
										WHERE idMembre = $idMembre
									");
            if ($sql->execute()) {
                $nameMembre = ((int)$Membre['genreMembre'] == 1 ? 'Mme ' : 'Mr ') . $Membre['nomMembre'] . " " . $Membre['prenomMembre'];
                /**
                 * 	ENVOI D'UN EMAIL DE CONFIRMATION
                 */
                $initpass = "Mot de passe intialisé avec succès.";

                $message = "Félicitations <b>" . $nameMembre . "</b>,";
                $message .= "<p>Votre mot de passe a été intialisé avec succès.</p>";
                $message .= "Veuillez trouvez ci-joints vos identifiants de connexion :";
                $message .= "<li><b><small>Votre identifiant : </b></small>" . $email . "</li>";
                $message .= "<li><b><small>Votre mot de passe provisoire : </b></small>" . $newpass . "</li>";
                $message .= "<p>Votre mot de passe étant provisoire, il vous faudra le mettre à jour lors de votre prochaine connexion.</p>";
                $message .= $_SESSION["Footer_Email"];

                $sendMailing = sendMailing("Initialisation du mot de passe.", $message, $email);
                $initpass .= "<li>" . ($sendMailing ? "L'email de confirmation a été envoyé à cette adresse <span>" . $email . "</span>." : "Cependant, l'email de confirmation n'a pas été envoyé.") . "</li>";

                return [
                    'result' => true,
                    'response' => $initpass
                ];
            } else {
                return [
                    'result' => false,
                    'response' => "Votre mot de passe n'a pas été intialisé."
                ];
            }
        } else {
            return [
                'result' => false,
                'response' => "Aucun compte correspondant n'a été trouvé."
            ];
        }
    }

    public function checkDataUpdate($data)
    {
        $error = [];
        $data["passwordMembre"] = trim(preg_replace('/\s\s+/', ' ', $data["passwordMembre"]));
        $data["confirmation"] = trim(preg_replace('/\s\s+/', ' ', $data["confirmation"]));

        if (empty($data["passwordMembre"])) {
            $error['passwordMembre'] = "Saisir votre mot de passe";
        } elseif (strlen($data["passwordMembre"]) < 6) {
            $error['passwordMembre'] = "6 caractères minimum";
        }
        if (empty($data["confirmation"])) {
            $error['confirmation'] = "Saisir la confirmation";
        } elseif ($data["confirmation"] != $data["passwordMembre"]) {
            $error['confirmation'] = "Erreur dans la confirmation";
        }
        return $error;
    }

    public function updateMDP($pass)
    {
        global $db;
        $idMembre = $db->quote($_SESSION['Logged']['idMembre']);
        $pass = sha1(trim(preg_replace('/\s\s+/', ' ', $pass)));
        $passwordMembre = $db->quote($pass);

        $Sql = $db->prepare("UPDATE membre SET 
                                passwordMembre = $passwordMembre,
                                provisoireMembre = NULL
                                WHERE idMembre = $idMembre
                            ");

        if ($Sql->execute()) {
            $_SESSION['Logged']['passwordMembre'] = $pass;
            $_SESSION['Logged']['provisoireMembre'] = NULL;
            return [
                'result' => true,
                'response' => "Votre mot de passe a été intialisé avec succès."
            ];
        } else {
            return [
                'result' => false,
                'response' => "Votre mot de passe n'a pas été intialisé."
            ];
        }
    }
}
