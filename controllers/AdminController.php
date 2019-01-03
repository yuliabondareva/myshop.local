<?php
/*
Контроллер админки
*/

//подключаем модели
include_once '../models/AdminsModel.php';
include_once '../models/CategoriesModel.php';
include_once '../models/OrdersModel.php';
include_once '../models/ProductsModel.php';
include_once '../models/PurchaseModel.php';


$smarty->setTemplateDir(TemplateAdminPrefix);
$smarty->assign('templateAdminWebPath', TemplateAdminWebPath);

if (isset($_SESSION['admin'])) {
		$smarty->assign('arUser', $_SESSION['admin']);
}

function indexAction($smarty)
{
	$rsCategories = getAllMainCategories();

	$smarty->assign('rsCategories', $rsCategories);
	$smarty->assign('pageTitle', 'Управление сайтом');

	loadAdminTemplate($smarty, 'adminHeader');
	loadAdminTemplate($smarty, 'adminFooter');
}

/*
Добавление новой категории
*/

function addnewcatAction()
{
	$catName = $_POST['newCategoryName'];
	$catParentId = $_POST['generalCatId'];

	$res = insertCat($catName, $catParentId);
	if($res){
		$resData['success'] = 1;
		$resData['message'] = 'Категория добавлена';
	} else {
		$resData['success'] = 0;
		$resData['message'] = 'Ошибка добавления категории';
	}
	echo json_encode($resData);
	return;
}

/*
Страница управления категориями
*/

function categoryAction($smarty)
{
	$rsCategories = getAllCategories();
	$rsMainCategories = getAllMainCategories();

	$smarty->assign('rsCategories', $rsCategories);
	$smarty->assign('rsMainCategories', $rsMainCategories);
	$smarty->assign('pageTitle', 'Управление сайтом');

	loadAdminTemplate($smarty, 'adminHeader');
	loadAdminTemplate($smarty, 'adminCategory');
	loadAdminTemplate($smarty, 'adminFooter');
}

/*
Обновление категории
*/

function updatecategoryAction()
{
	$itemId = $_POST['itemId'];
	$parentId = $_POST['parentId'];
	$newName = $_POST['newName'];

	$res = updateCategoryData($itemId, $parentId, $newName);

	if ($res) {
		$resData['success'] = 1;
		$resData['message'] = 'Категория обновлена';
	} else {
		$resData['success'] = 0;
		$resData['message'] = 'Ошибка изменения данных категории';
	}

	echo json_encode($resData);
	return;
}

/*
Страница управления товаром
*/

function productsAction($smarty)
{
	$rsCategories = getAllSubCategories();
	$rsProducts = getProducts();

	$smarty->assign('rsCategories', $rsCategories);
	$smarty->assign('rsProducts', $rsProducts);
	$smarty->assign('pageTitle', 'Управление сайтом');

	loadAdminTemplate($smarty, 'adminHeader');
	loadAdminTemplate($smarty, 'adminProducts');
	loadAdminTemplate($smarty, 'adminFooter');
}

/*
Добавление нового продукта
*/

function addproductAction()
{
	$itemName = $_POST['itemName'];
	$itemPrice = $_POST['itemPrice'];
	$itemDesc = $_POST['itemDesc'];
	$itemCat = $_POST['itemCatId'];

	if ($itemCat != null & $itemName != null & $itemPrice != null & $itemDesc != null) {
		$res = insertProducts($itemName, $itemPrice, $itemDesc, $itemCat);
	}

	if ($res) {
		$resData['success'] = 1;
		$resData['message'] = 'Изменения успешно внесены';
	} else {
		$resData['success'] = 0;
		$resData['message'] = 'Ошибка изменения данных';
	}

	echo json_encode($resData);
	return;

}

/*
Обновление продукта
*/

function updateproductAction()
{
	$itemId = $_POST['itemId'];
	$itemName = $_POST['itemName'];
	$itemPrice = $_POST['itemPrice'];
	$itemStatus = $_POST['itemStatus'];
	$itemDesc = $_POST['itemDesc'];
	$itemCat = $_POST['itemCatId'];

	$res = updateProduct($itemId, $itemName, $itemPrice, $itemStatus, $itemDesc, $itemCat);

	if ($res) {
		$resData['success'] = 1;
		$resData['message'] = 'Изменения успешно внесены';
	} else {
		$resData['success'] = 0;
		$resData['message'] = 'Ошибка изменения данных';
	}

	echo json_encode($resData);
	return;
}

/*
Добавление картинки товара
*/

function uploadAction()
{
	$maxSize = 2 * 1024 *1024;
	$itemId = $_POST['itemId'];
	//получаем расширение загружаемого файла
	$ext = pathinfo($_FILES['filename']['name'], PATHINFO_EXTENSION);
	//создаем имя файла
	$newFileName = $itemId. '.' . $ext;

	if ($_FILES['filename']['size'] > $maxSize) {
		echo ('Размер файла превышает два мегабайта');
		return;
	}

	//загружаем файл
	if (is_uploaded_file($_FILES['filename']['tmp_name'])) {
		// если файл загружен, то перенаправляем его из временной директории в конечную
		
		$res = move_uploaded_file($_FILES['filename']['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . '/myshop.local/www/templates/default/images/products/' . $newFileName);
		if ($res) {
			$res = updateProductImage($itemId, $newFileName);
			if ($res) {
				redirect('/myshop.local/www/?controller=admin&action=products');
			}
		}
	} else {
		echo ("Ошибка загрузки файла");
	}
}

/*
Страница заказов
*/

function ordersAction($smarty)
{
	$rsOrders = getOrders();
	$smarty->assign('rsOrders', $rsOrders);
	$smarty->assign('pageTitle', 'Заказы');

	loadAdminTemplate($smarty, 'adminHeader');
	loadAdminTemplate($smarty, 'adminOrders');
	loadAdminTemplate($smarty, 'adminFooter');
}

/*
Статус заказа
*/

function setorderstatusAction()
{
	$itemId = $_POST['itemId'];
	$status = $_POST['status'];

	$res = updateOrderStatus($itemId, $status);

	if ($res) {
		$resData['success'] = 1;
	} else {
		$resData['success'] = 0;
		$resData['message'] = 'Ошибка установки статуса';
	}

	echo json_encode($resData);
	return;
}

/*
Дата оплаты заказа
*/

function setorderdatepaymentAction()
{
	$itemId = $_POST['itemId'];
	$datePayment = $_POST['datePayment'];

	$res = updateOrderDatePayment($itemId, $datePayment);

	if ($res) {
		$resData['success'] = 1;
	} else {
		$resData['success'] = 0;
		$resData['message'] = 'Ошибка установки статуса';
	}

	echo json_encode($resData);
	return;
}

/*
Разлогинивание админа
*/

function logoutadminAction()
{
if (isset($_SESSION['admin'])) {
	unset($_SESSION['admin']);
}
	redirect('/myshop.local/www/admin.php');
}

/*
Авторизация админа
*/

function loginadminAction()
{
	$email = isset($_REQUEST['email']) ? $_REQUEST['email'] : null;
	$email = trim($email);

	$pwd = isset($_REQUEST['pwd']) ? $_REQUEST['pwd'] : null;
	$pwd = trim($pwd);

	$adminData = loginadminAdmin($email, $pwd);

	if ($adminData['success']) {
		$adminData = $adminData[0];

		$_SESSION['admin'] = $adminData;
		$_SESSION['admin']['displayName'] = $adminData['name'] ? $adminData['name'] : $adminData['email'];

		$resData = $_SESSION['admin'];
		$resData['success'] = 1;

	} else {
		$resData['success'] = 0;
		$resData['message'] = 'Неверный логин или пароль';
	}
	echo json_encode($resData);
}