<?php

/*
Модель для админки
*/

/*
Авторизация админа
*/

function loginadminAdmin($email, $pwd){
	global $db;
	$email = htmlspecialchars(mysqli_real_escape_string($db, $email));
	$pwd = md5($pwd);

	$sql = "SELECT *
			FROM admin
			WHERE (`email` = '{$email}' and `pwd` = '{$pwd}')
			LIMIT 1";

	$rs = mysqli_query($db, $sql);
	$rs = createSmartyRsArray($rs);
	
	if(isset($rs[0])){
		$rs['success'] = 1;
	} else {
		$rs['success'] = 0;
	}
	return $rs;
}