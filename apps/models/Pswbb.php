<?php

class Shatibi
{
    public function checkData($data)
    {
        $error = [];

        if (!isset($data["civiliteShatibi"])) {
            $error['civiliteShatibi'] = "Définir la civilité";
        }
        if (empty($data["phoneShatibi"])) {
            $error['phoneShatibi'] = "Saisir le téléphone";
        }
        $data["responsableShatibi"] = mb_convert_case(trim($data["responsableShatibi"]), MB_CASE_TITLE, "UTF-8");
        if (empty($data["responsableShatibi"])) {
            $error['responsableShatibi'] = "Renseigner le(a) responsable";
        }
        $data["emailShatibi"] = mb_convert_case(trim($data["emailShatibi"]), MB_CASE_LOWER, "UTF-8");
        if (empty($data["emailShatibi"])) {
            $error['emailShatibi'] = "Saisir l'adresse email";
        } elseif (!preg_match('/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/', $data["emailShatibi"])) {
            $error['emailShatibi'] = "Format d'email invalide";
        }
        $data["adresseShatibi"] = mb_convert_case(trim($data["adresseShatibi"]), MB_CASE_TITLE, "UTF-8");
        if (empty($data["adresseShatibi"])) {
            $error['adresseShatibi'] = "Saisir l'adresse'";
        }
        if (empty($data["cpShatibi"])) {
            $error['cpShatibi'] = "Code Postal";
        }
        $data["villeShatibi"] = mb_convert_case(trim($data["villeShatibi"]), MB_CASE_TITLE, "UTF-8");
        if (empty($data["villeShatibi"])) {
            $error['villeShatibi'] = "Saisir la ville";
        }
        $data["whatsapp"] = mb_convert_case(trim($data["whatsapp"]), MB_CASE_LOWER, "UTF-8");
        $data["facebook"] = mb_convert_case(trim($data["facebook"]), MB_CASE_LOWER, "UTF-8");
        $data["instagram"] = mb_convert_case(trim($data["instagram"]), MB_CASE_LOWER, "UTF-8");
        $data["youtube"] = mb_convert_case(trim($data["youtube"]), MB_CASE_LOWER, "UTF-8");

        return [
            'errors' => $error,
            'data' => $data
        ];
    }

    public function saveShatibi($data)
    {
        $row = "";
        foreach ($_POST as $k => $v) {
            $row .= $k . " = \"" . str_replace("'", "&#146;", trim($v)) . "\"\n";
        }

        $fichier = file_exists("../params.txt") ? fopen("../params.txt", "w+") : fopen("../params.txt", "c+b");

        if (fwrite($fichier, $row)) {
            $return = [
                'result' => true,
                'response' => "Les paramètrages ont été mis à jour avec succés."
            ];
        } else {
            $return = [
                'result' => false,
                'response' => "Désolé ! Les paramètrages n'ont pas été mis à jour."
            ];
        }
        fclose($fichier);
        return $return;
    }
}
