<?php

/*
Основные функции
*/


/*
Формирование запрашиваемой страницы
*/
function loadPage($smarty, $controllerName, $actionName = 'index')
{
	include_once PathPrefix . $controllerName . PathPostfix;

	$function = $actionName . 'Action';
	$function($smarty);
}

function loadTemplate($smarty, $templateName)
{
	$smarty->display(TemplatePrefix . $templateName . TemplatePostfix);
}

function loadAdminTemplate($smarty, $templateName)
{
	$smarty->display(TemplateAdminPrefix . $templateName . TemplatePostfix);
}

/*
Функция отладки. Останавливает работу программы выводя значение переменной $value
*/

function d($value = null, $die = 1)
{
	echo 'Debug: <br /><pre>';
	print_r($value);
	echo '</pre>';

	if($die) die;
}

/*
Преобразовываем результаты работы функции выборки в ассоциативный массив
*/

function createSmartyRsArray($rs){
	if(! $rs) return false;

	$smartyRs = array();
	while ($row = mysqli_fetch_assoc($rs)) {
		$smartyRs[] = $row;
	}
	
	 return $smartyRs;
}

/*
Редирект
*/

function redirect($url){
	if(! $url) $url = '/myshop.local/www/index.php';
	header("Location: $url");
	exit;
}