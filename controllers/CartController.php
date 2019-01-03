<?php

/*
Контроллер работы с корзиной
*/

//подключаем модели

	include_once '../models/CategoriesModel.php';
	include_once '../models/ProductsModel.php';
	include_once '../models/OrdersModel.php';
	include_once '../models/PurchaseModel.php';

/*
Добавление продуктов в корзину
*/

function addtocartAction()
{
	$itemId = isset($_GET['id']) ? intval($_GET['id']) : null;
	if (! $itemId) return false;

	$resData = array();

	//если значение не найдено, то добавляем
	if (isset($_SESSION['cart']) && array_search($itemId, $_SESSION['cart']) === false) {
		$_SESSION['cart'][] = $itemId;
		$resData['cntItems'] = count($_SESSION['cart']);
		$resData['success'] = 1;
	} else {
		$resData['success'] = 0;
	}
	echo json_encode($resData);
}

/*
Удаление продукта из корзины
*/

function removefromcartAction()
{
	$itemId = isset($_GET['id']) ? intval($_GET['id']) : null;
	if (! $itemId) exit();

	$resData = array();
	$key = array_search($itemId, $_SESSION['cart']);
	if (key !== false) {
		unset($_SESSION['cart'][$key]);
		$resData['success'] = 1;		
		$resData['cntItems'] = count($_SESSION['cart']);
	} else {
		$resData['success'] = 0;
	}
	echo json_encode($resData);
}

/*
Формирование страницы корзины
*/

function indexAction($smarty)
{
	$itemsIds = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();

	$rsCategories = getAllMainCatsWithChildren();
	$rsProducts = getProductsFromArray($itemsIds);

	$smarty->assign('pageTitle', 'Корзина');
	$smarty->assign('rsCategories', $rsCategories);
	$smarty->assign('rsProducts', $rsProducts);

	loadTemplate($smarty, 'header');
	loadTemplate($smarty, 'cart');
	loadTemplate($smarty, 'footer');
}

/*
Формирование страницы заказа
*/

function orderAction($smarty)
{
	//получаем массив идетнификаторов продуктов корзины
	$itemsIds = isset($_SESSION['cart']) ? $_SESSION['cart'] : null;
	// если корзина пуста, то редиректим в корзину
	if (! $itemsIds) {
		redirect('/myshop.local/www/?controller=cart');
		return;
	}

	//получаем из массива $_POST  количество покупаемых товаров
	$itemsCnt = array();
	foreach ($itemsIds as $item) {
		//формируем ключ для массива POST
		$postVar = 'itemCnt_' . $item;
		//создаем элемент массива количества покупаемого товара
		//ключ массива - ID товара, значение массива - кол-во товара 
		//$itemsCnt[1]=3; товар с ID = 1 покупают 3 штуки
		$itemsCnt[$item] = isset($_POST[$postVar]) ? $_POST[$postVar] : null;

	}
	//получаем список продуктов по массиву корзины

	$rsProducts = getProductsFromArray($itemsIds);

	//добавляем каждому продукту дополнительное поле
	//"realPrice" = количество товаров * на цену товара
	//"cnt" = количество покупаемого товара

	//&$item - для того,чтобы при изменении переменной $item менялся и элемент массива $rsProducts

	$i = null;
	foreach ($rsProducts as $item) {
		$item['cnt'] = isset($itemsCnt[$item['id']]) ? $itemsCnt[$item['id']] : null;
		if ($item['cnt']) {
			$item['realPrice'] = $item['cnt'] * $item['price'];
		} else {
			//если товар есть в корзине, а кол-во = 0, то удаляем товар
			unset($rsProducts[$i]);
		}
		$i++;

	}

	if (! $rsProducts) {
		echo "Корзина пуста";
		return;
	}
	//получаем массив покупаемых товаров, помещаем в сессионую переменную
	$_SESSION['saleCart'] = $rsProducts;

	$rsCategories = getAllMainCatsWithChildren();
	//hideLoginBox - флаг для того, чтобы спрятать блоки авторизации и регистрации в боковой панели
	if (! isset($_SESSION['user'])) {
		$smarty->assign('hideLoginBox', 1);
	}

	$smarty->assign('pageTitle', 'Заказ');
	$smarty->assign('rsCategories', $rsCategories);
	$smarty->assign('rsProducts', $rsProducts);

	loadTemplate($smarty, 'header');
	loadTemplate($smarty, 'order');
	loadTemplate($smarty, 'footer');
}

/*
Функция сохранения заказа
*/

function saveorderAction()
{
	//получаем массив покупаемых товаров
	$cart = isset($_SESSION['saleCart']) ? $_SESSION['saleCart'] : null;
	// если в корзине пусто, то формируем ответ с ошибкой
	if (! $cart) {
		$resData['success'] = 0;
		$resData['message'] = 'Нет товаров для заказа';
		echo json_encode($resData);
		return;
	}

	$name = $_POST['name'];
	$phone = $_POST['phone'];
	$adress = $_POST['adress'];

	//создаем новый заказ и получаем его ID
	$orderId = makeNewOrder($name, $phone, $adress);

	//если заказ не создан, то выдаем ошибку и завершаем функцию
	if (! $orderId) {
		$resData['success'] = 0;
		$resData['message'] = 'Ошибка создания заказа';
		echo json_encode($resData);
		return;
	}
	//сохраняем товары для созданного заказа
	$res = setPurchaseForOrder($orderId, $cart);

	//если успешно, то формируем ответ, удаляем переменные корзины
	if ($res) {
		$resData['success'] = 1;
		$resData['message'] = 'Заказ сохранен';
		unset($_SESSION['saleCart']);
		unset($_SESSION['cart']);
	} else {
		$resData['success'] = 0;
		$resData['message'] = 'Ошибка внесения данных для заказа №' . $orderId;
	}

	echo json_encode($resData);

}