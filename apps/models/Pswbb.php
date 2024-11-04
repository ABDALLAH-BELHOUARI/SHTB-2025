<?php

class PSWBB
{
    public function checkData($data)
    {
        $error = [];

        if (!isset($data["civilitePSWBB"])) {
            $error['civilitePSWBB'] = "Définir la civilité";
        }
        if (empty($data["phonePSWBB"])) {
            $error['phonePSWBB'] = "Saisir le téléphone";
        }
        $data["responsablePSWBB"] = mb_convert_case(trim($data["responsablePSWBB"]), MB_CASE_TITLE, "UTF-8");
        if (empty($data["responsablePSWBB"])) {
            $error['responsablePSWBB'] = "Renseigner le(a) responsable";
        }
        $data["emailPSWBB"] = mb_convert_case(trim($data["emailPSWBB"]), MB_CASE_LOWER, "UTF-8");
        if (empty($data["emailPSWBB"])) {
            $error['emailPSWBB'] = "Saisir l'adresse email";
        } elseif (!preg_match('/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/', $data["emailPSWBB"])) {
            $error['emailPSWBB'] = "Format d'email invalide";
        }
        $data["adressePSWBB"] = mb_convert_case(trim($data["adressePSWBB"]), MB_CASE_TITLE, "UTF-8");
        if (empty($data["adressePSWBB"])) {
            $error['adressePSWBB'] = "Saisir l'adresse'";
        }
        if (empty($data["cpPSWBB"])) {
            $error['cpPSWBB'] = "Code Postal";
        }
        $data["villePSWBB"] = mb_convert_case(trim($data["villePSWBB"]), MB_CASE_TITLE, "UTF-8");
        if (empty($data["villePSWBB"])) {
            $error['villePSWBB'] = "Saisir la ville";
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

    public function savePSWBB($data)
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
