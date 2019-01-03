<?php

/*
Модель таблицы заказов
*/

/*
Создание заказа (без привязки товара)
*/

function makeNewOrder($name, $phone, $adress)
{
    global $db;
    
    $name = htmlspecialchars(mysqli_real_escape_string($db, $name));
    $phone = htmlspecialchars(mysqli_real_escape_string($db, $phone));
    $adress = htmlspecialchars(mysqli_real_escape_string($db, $adress));
    //инициализация переменных
    $userId = $_SESSION['user']['id'];
    $comment = "id пользователя: {$userId}<br>
        Имя: {$name}<br>
        Телефон: {$phone}<br>
        Адрес: {$adress}";
    $dateCreated = date('Y.m.d H:i:s');
    $userIp = $_SERVER['REMOTE_ADDR'];

    //формирование запроса к БД

    $sql = "INSERT INTO orders
        (`user_id`, `date_created`, `date_payment`, `status`, `comment`, `user_ip`)
        VALUES('{$userId}', '{$dateCreated}', null, '0', '{$comment}', '{$userIp}')";

    $rs = mysqli_query($db, $sql);

    //получить id созданного заказа
    if ($rs) {
        $sql = "SELECT id
            FROM orders
            ORDER BY id DESC
            LIMIT 1";
        $rs = mysqli_query($db, $sql);
        //преобразование результатов запроса
        $rs = createSmartyRsArray($rs);

        //возвращаем id созданного запроса
        if (isset($rs[0])) {
            return $rs[0]['id'];
        }
    }
    return false;
}

/*
Получить заказ с продуктами пользователя
*/

function getOrdersWithProductsByUser($userId)
{
    global $db;
    $userId = intval($userId);
    $sql = "SELECT * FROM orders
        WHERE `user_id` = '{$userId}'
        ORDER BY id DESC";

    $rs = mysqli_query($db, $sql);

    $smartyRs =array();
    while ($row = mysqli_fetch_assoc($rs)) {
        $rsChildren = getPurchaseForOrder($row['id']);
        
        if ($rsChildren) {
            $row['children'] = $rsChildren;
            $smartyRs[] = $row;
        }    
    }
    return $smartyRs;
}

/*
Получить информацию о пользователе, который совершил заказ
*/

function getOrders()
{
    global $db;
    $sql = "SELECT o.*, u.name, u.email, u.phone, u.adress
        FROM orders AS `o`
        LEFT JOIN users AS `u`
        ON o.user_id = u.id
        ORDER BY id DESC";

    $rs = mysqli_query($db, $sql);
    $smartyRs = array();
    while ($row = mysqli_fetch_assoc($rs)) {
            $rsChildren = getProductsForOrder($row['id']);

            if ($rsChildren) {
                $row['children'] = $rsChildren;
                $smartyRs[] = $row;
            }
    }
    return $smartyRs;    
}

/*
Получить продукты заказа
*/

function getProductsForOrder($orderId)
{
    global $db;
    $sql ="SELECT *
        FROM purchase AS pe
        LEFT JOIN products AS ps
        ON pe.product_id = ps.id
        WHERE (`order_id` = '{$orderId}')";

    $rs = mysqli_query($db, $sql);

    return createSmartyRsArray($rs);
}

/*
Обновить статус заказа
*/

function updateOrderStatus($itemId, $status)
{
    global $db;
    $status = intval($status);
    $sql = "UPDATE orders
        SET `status` = '{$status}'
         WHERE id = '{$itemId}'";
    $rs = mysqli_query($db, $sql);
    return $rs;
}

/*
Обновить дату оплаты заказа
*/

function updateOrderDatePayment($itemId, $datePayment)
{
    global $db;
    $sql = "UPDATE orders
            SET `date_payment` = '{$datePayment}'
            WHERE id = '{$itemId}'";
    $rs = mysqli_query($db, $sql);
    return $rs;
}