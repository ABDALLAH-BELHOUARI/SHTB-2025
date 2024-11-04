<?php
session_destroy();
unset($_SESSION["Auth"]);
unset($_SESSION["csrf"]);

setcookie('userLogged', '', time() - 3600, null, null, false, false);
unset($_COOKIE["userLogged"]);

header("location:?slug=login");
die();
