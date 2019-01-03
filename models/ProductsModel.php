<?php

/*
Модель для таблицы продукции (products)
*/

/*
Получаем последние добавленные товары
*/

function getLastProducts($limit = null) 
{
    global $db;
    $sql = "SELECT *
        FROM `products`
        ORDER BY `id` DESC";
    if ($limit) {
        $sql .= " LIMIT {$limit}";
    }

    $rs = mysqli_query($db, $sql);

    return createSmartyRsArray($rs);
}

function getProductsByCat($itemId)
{
    global $db;
    $itemId = intval($itemId);
    $sql = "SELECT *
        FROM `products`
        WHERE `category_id` = '{$itemId}'
        ORDER BY `id` DESC";

    $rs = mysqli_query($db, $sql);
    
    return createSmartyRsArray($rs);
}

function getProductById ($itemId)
{
    global $db;
    $itemId = intval($itemId);
    $sql = "SELECT *
        FROM `products`
        WHERE `id` = '{$itemId}'";

    $rs = mysqli_query($db, $sql);
    
    return mysqli_fetch_assoc($rs);
}

/*
Получить список продуктов из массива идентификаторов
*/

function getProductsFromArray($itemsIds)
{
    global $db;
    $strIds = implode($itemsIds, ', ');
    $sql = "SELECT *
        FROM `products`
        WHERE `id` in ({$strIds})";

    $rs = mysqli_query($db, $sql);
    
    return createSmartyRsArray($rs);
}

function getProducts()
{
    global $db;
    $sql = "SELECT *
        FROM `products`
        ORDER BY `category_id`";

    $rs = mysqli_query($db, $sql);
    
    return createSmartyRsArray($rs);
}

/*
Добавление нового товара
*/

function insertProducts($itemName, $itemPrice, $itemDesc, $itemCat)
{
    global $db;
    $sql = "INSERT INTO `products`
        SET
        `name` = '{$itemName}',
        `price` = '{$itemPrice}',
        `description` = '{$itemDesc}',
        `category_id` = '{$itemCat}'";

    $rs = mysqli_query($db, $sql);
    
    return $rs;
}

function updateProduct($itemId, $itemName, $itemPrice, $itemStatus, 
                    $itemDesc, $itemCat, $newFileName = null)
{
    global $db;
    $set =array();

    if ($itemCat) {
        $set[] = "`category_id` = '{$itemCat}'";
    }


    if ($itemName) {
        $set[] = "`name` = '{$itemName}'";
    }

    if ($itemDesc) {
        $set[] = "`description` = '{$itemDesc}'";
    }

    if ($itemPrice > 0 ){
        $set[] = "`price` = '{$itemPrice}'";
    }

    if ($newFileName) {
        $set[] = "`image` = '{$newFileName}'";
    }

    if ($itemStatus !== null) {
        $set[] = "`status` = '{$itemStatus}'";
    }

    $setStr = implode($set, ", ");
    
    $sql = "UPDATE `products`
        SET {$setStr}
        WHERE `id` = '{$itemId}'";

    $rs = mysqli_query($db, $sql);

    return $rs;
}

function updateProductImage($itemId, $newFileName)
{
    $rs = updateProduct($itemId, null, null, null, null, null, $newFileName);
    return $rs;
}