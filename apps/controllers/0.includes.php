<?php
session_start();
date_default_timezone_set("Europe/Paris");
header("Content-Type: text/html; charset=utf-8");
error_reporting(E_ALL);
ini_set("display_errors", 1);


$Params = file_exists("../params.txt") ? parse_ini_file("../params.txt", true) : false;
