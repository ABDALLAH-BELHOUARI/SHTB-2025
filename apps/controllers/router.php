<?php

//	BACKEND ROUTER

require_once '../public/autoload.php';

if (isset($_SESSION["Logged"])) {
	if (isset($_GET['slug']) && $_GET['slug']) {
		$slug = "../views/back/" . $_GET["slug"] . '.php';
		if (file_exists($slug)) {
			require_once $slug;
		} else {
			require_once "../views/back/404.php";
		}
	} else {
		require_once "../views/back/index" . $_SESSION['Logged']['level'] . ".php";
	}
} else {
	if (isset($_GET['slug']) && $_GET['slug']) {
		$slug = "../views/front/" . $_GET["slug"] . ".php";
		if (file_exists($slug)) {
			require_once $slug;
		} else {
			require_once "../views/front/404.php";
		}
	} else {
		require_once '../views/front/login.php';
	}
}
