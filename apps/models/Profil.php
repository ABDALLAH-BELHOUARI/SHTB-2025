<?php
class Profil
{
    public function checkData($data, $level, $age, $update = false)
    {
        global $db;
        $error = [];

        if (!isset($data["genreMembre"])) {
            $error['genreMembre'] = "Définir la civilité";
        }
        if (empty($data["nomMembre"])) {
            $error['nomMembre'] = "Saisir le nom";
        } else {
            $data["nomMembre"] = mb_convert_case(trim($data["nomMembre"]), MB_CASE_UPPER, "UTF-8");
        }
        if (empty($data["prenomMembre"])) {
            $error['prenomMembre'] = "Saisir le prénom";
        } else {
            $data["prenomMembre"] = ucwords(trim($data["prenomMembre"]));
        }
        if (empty($data["naissanceMembre"])) {
            $error['naissanceMembre'] = "Saisir la date de naissance";
        }

        if ($_SERVER['QUERY_STRING'] != 'slug=profil') {
            if (!isset($data["levelsMembre"])) {
                $error['levelsMembre'] = "Sélectionner le ou les profils";
            }
        }

        if ($age > 18) {
            if (empty($data["mobileMembre"])) {
                $error['mobileMembre'] = "Saisir le N° de mobile";
            }
            if (empty($data["adresseMembre"])) {
                $error['adresseMembre'] = "Saisir l'adresse";
            } else {
                $data["adresseMembre"] = ucwords($data["adresseMembre"]);
            }
            if (empty($data["cpMembre"])) {
                $error['cpMembre'] = "Code postal";
            }
            if (empty($data["villeMembre"])) {
                $error['villeMembre'] = "Saisir la ville";
            } else {
                $data["villeMembre"] = ucwords($data["villeMembre"]);
            }
            $data["emailMembre"] = mb_convert_case(trim($data["emailMembre"]), MB_CASE_LOWER, "UTF-8");
            if (empty($data["emailMembre"])) {
                $error['emailMembre'] = "Saisir votre email";
            } elseif (!preg_match('/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/', $data["emailMembre"])) {
                $error['emailMembre'] = "Format d'email invalide";
            } else {
                $emailMembre = $db->quote($data["emailMembre"]);
                if ($update) {
                    $idMembre = $db->quote($update);
                    $Sql = $db->query("SELECT idMembre FROM membre 
                                            WHERE emailMembre = $emailMembre 
                                            AND idMembre != $idMembre
                                        ")->fetch();
                } else {
                    $Sql = $db->query("SELECT idMembre FROM membre WHERE emailMembre = $emailMembre")->fetch();
                }

                if ($Sql) {
                    $error['emailMembre'] = "Email déjà enregistrée !";
                }
            }
        }

        if ($level == 5) {
            if (empty($data["poidsMembre"])) {
                $error['poidsMembre'] = "Saisir le poids";
            } elseif (!is_numeric($data["poidsMembre"])) {
                $error['poidsMembre'] = "Poids en chiffres";
            }
            if (empty($data["tailleMembre"])) {
                $error['tailleMembre'] = "Saisir la taille";
            } elseif (!is_numeric($data["tailleMembre"])) {
                $error['tailleMembre'] = "Taille en chiffres";
            }
            if (empty($data["clubMembre"])) {
                $error['clubMembre'] = "Saisir le club";
            } else {
                $data["clubMembre"] = ucwords($data["clubMembre"]);
            }
            if (empty($data["niveauMembre"])) {
                $error['niveauMembre'] = "Saisir le niveau";
            } else {
                $data["niveauMembre"] = ucfirst($data["niveauMembre"]);
            }
            if (empty($data["categorieMembre"])) {
                $error['categorieMembre'] = "Saisir la catégorie";
            } else {
                $data["categorieMembre"] = ucfirst($data["categorieMembre"]);
            }
        }

        return [
            'errors' => $error,
            'data' => $data
        ];
    }

    public function createProfil($data)
    {
        global $db;
        $idMembre = $db->quote($this->generateId());
    }

    public function updateProfil($data, $idMembre, $age, $level)
    {
        global $db;
        $idMembre = $db->quote($idMembre);
        $genreMembre = $db->quote($data['genreMembre']);
        $nomMembre = $db->quote($data['nomMembre']);
        $prenomMembre = $db->quote($data['prenomMembre']);
        $naissanceMembre = $db->quote($data['naissanceMembre']);

        if ((int)$level == 5) {
            $poidsMembre = is_null($data['poidsMembre']) ? 'NULL' : $db->quote($data['poidsMembre']);
            $tailleMembre = is_null($data['tailleMembre']) ? 'NULL' : $db->quote($data['tailleMembre']);

            $parenteMembre = $age > 18 ? 'NULL' : (is_null($data['parenteMembre']) ? 'NULL' : $db->quote($data['parenteMembre']));

            $clubMembre = is_null($data['clubMembre']) ? 'NULL' : $db->quote($data['clubMembre']);
            $niveauMembre = is_null($data['niveauMembre']) ? 'NULL' : $db->quote($data['niveauMembre']);
            $categorieMembre = is_null($data['categorieMembre']) ? 'NULL' : $db->quote($data['categorieMembre']);

            $INFOSJOUEUR = "poidsMembre = $poidsMembre,
                            tailleMembre = $tailleMembre,
                            parenteMembre = $parenteMembre,
                            clubMembre = $clubMembre,
                            niveauMembre = $niveauMembre,
                            categorieMembre = $categorieMembre,";
        } else {
            $INFOSJOUEUR = "";
        }

        if ($age > 17) {
            $adresseMembre = is_null($data['adresseMembre']) ? 'NULL' : $db->quote($data['adresseMembre']);
            $cpMembre = is_null($data['cpMembre']) ? 'NULL' : $db->quote($data['cpMembre']);
            $villeMembre = is_null($data['villeMembre']) ? 'NULL' : $db->quote($data['villeMembre']);
            $mobileMembre = is_null($data['mobileMembre']) ? 'NULL' : $db->quote($data['mobileMembre']);
            $emailMembre = is_null($data['emailMembre']) ? 'NULL' : $db->quote($data['emailMembre']);

            $INFOADULTE = "adresseMembre = $adresseMembre,
                            cpMembre = $cpMembre,
                            villeMembre = $villeMembre,
                            mobileMembre = $mobileMembre,
                            emailMembre = $emailMembre,";
        } else {
            $INFOSJOUEUR = "";
        }
        $levelsMembre = is_null($data['levelsMembre']) ? 'NULL' : $db->quote($data['levelsMembre']);
        $idMembre_1 = is_null($data['idMembre_1']) ? 'NULL' : $db->quote($data['idMembre_1']);

        $db->query("SET FOREIGN_KEY_CHECKS=0");
        $Sql = $db->prepare("UPDATE membre SET 
                                genreMembre = $genreMembre,
                                nomMembre = $nomMembre,
                                prenomMembre = $prenomMembre,
                                naissanceMembre = $naissanceMembre,
                                $INFOSJOUEUR
                                $INFOADULTE
                                levelsMembre = $levelsMembre,
                                idMembre_1 = $idMembre_1
                                WHERE idMembre = $idMembre
                            ");
        if ($Sql->execute()) {
            $db->query("SET FOREIGN_KEY_CHECKS=1");
            return [
                'result' => true,
                'response' => "Profil mis à jour avec succès."
            ];
        } else {
            $db->query("SET FOREIGN_KEY_CHECKS=1");
            return [
                'result' => false,
                'response' => "Le profil n'a pas été mis à jour."
            ];
        }
    }

    public static function generateId()
    {
        global $db;
        $idGenerate = rand(311111, 399999);

        $idMembre = $db->quote($idGenerate);
        $Existe = $db->query("SELECT idMembre FROM membre WHERE idMembre = $idMembre")->fetch();
        if ($Existe) {
            Generer_Id();
            die();
        } else {
            return $idGenerate;
        }
    }
}
