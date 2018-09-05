<?php

session_start(); //стартуем сессию

	include_once '../config/config.php'; 		//инициализация настроек
	include_once '../config/db.php'; 		   	//инициализация базы данных
	include_once '../library/mainFunctions.php'; //основные функции

	//определяем с каким контроллером будем работать
	$controllerName = isset($_GET['controller']) ? ucfirst($_GET['controller']) : 'Admin';

	//определяем с какой функцией будем работать
	$actionName = isset($_GET['action']) ? $_GET['action'] : 'index';

	//если в сессии есть данные об авторизованном пользователе, то передаем их в шаблон

	if (isset($_SESSION['admin'])) {
		$smarty->assign('arUser', $_SESSION['admin']);
	}

	loadPage($smarty, $controllerName, $actionName);