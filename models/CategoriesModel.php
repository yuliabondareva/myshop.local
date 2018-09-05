<?php

/*
Модель для таблицы категорий (categories)
*/


/*
Получаем главные категории с привязкой к дочерним
*/

function getChildrenForCat($catId){
	global $db;
	$sql = "SELECT * 
  		  FROM `categories` 
  		  WHERE `parent_id` = '{$catId}'";

	$rs = mysqli_query($db, $sql);

	return createSmartyRsArray($rs);

}

/*
Получаем главные категории с дочерними
*/

function getAllMainCatsWithChildren(){
  global $db;
  $sql = "SELECT * 
  		  FROM `categories` 
  		  WHERE `parent_id` = 0";

  $rs = mysqli_query($db, $sql);
  $smartyRs = array();

	  while ($row = mysqli_fetch_assoc($rs)) {
	  	
	  	$rsChildren = getChildrenForCat($row['id']);
	  	
	  	if ($rsChildren) {
	  			$row['children'] = $rsChildren; 
	  	}

	    $smartyRs[] = $row;
	  }

	  return $smartyRs;
}

/*
Выбираем категории по id
*/

function getCatById($catId){
	global $db;
	$catId = intval($catId);
	$sql = "SELECT * 
  		  	FROM `categories` 
  		  	WHERE `id` = '{$catId}'";

  	$rs = mysqli_query($db, $sql);

  	return mysqli_fetch_assoc($rs);
}

/*
Получить все главные категории
*/

function getAllMainCategories(){
	global $db;
	$sql = 'SELECT *
			FROM categories
			WHERE `parent_id` = 0';

	$rs = mysqli_query($db, $sql);

	return createSmartyRsArray($rs);
}

/*
Добавление новой категории
*/

function insertCat($catName, $catParentId = 0){
	global $db;
	$sql = "INSERT INTO
			categories (`parent_id`, `name`)
			VALUES ('{$catParentId}', '{$catName}')";
			 
			
	$rs = mysqli_query($db, $sql);
	$id = mysqli_insert_id($db);

	return $id;

}

/*
Получить все категории
*/

function getAllCategories(){
	global $db;
	$sql = 'SELECT *
			FROM `categories`
			ORDER BY `parent_id` ASC';

	$rs = mysqli_query($db, $sql);

	return createSmartyRsArray($rs);
}

/*
Получить все дочерние категории
*/

function getAllSubCategories(){
	global $db;
	$sql = 'SELECT *
			FROM `categories`
			WHERE `parent_id` > 0
			ORDER BY `parent_id` ASC';

	$rs = mysqli_query($db, $sql);

	return createSmartyRsArray($rs);
}

/*
Обновление категорий
*/

function updateCategoryData($itemId, $parentId = -1, $newName = ''){
	global $db;
	$set = array();

	if($newName){
		$set[] = "`name` = '{$newName}'";
	}

	if($parentId > -1){
		$set[] = "`parent_id` = '{$parentId}'";
	}

	$setStr = implode($set, ", ");
	$sql = "UPDATE `categories`
			SET {$setStr}
			WHERE id = '{$itemId}'";

	$rs = mysqli_query($db, $sql);
	return $rs;
}