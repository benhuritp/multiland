<?php
# ++++++++++++++++++++++++++++++++++++++++

# Значения формы:

# Имя
$name = $_REQUEST['name'];
# Номер телефона
$phone = $_REQUEST['phone'];
# ID товара
$product_id_1 = $_REQUEST['product_id_1'];
# Ціна
$price_1 = $_REQUEST['price_1'];


$custom_sizeProdOrder = $_REQUEST['custom_sizeProdOrder'];
$custom_colorProdOrder = $_REQUEST['custom_colorProdOrder'];

// +++++++++++++++++++++++++++++++++++++++

$data = array(
            'login' => 'ваш логин',
            'password' => 'ваш апи',
            'clientnamefirst' => $name,
            'clientphone' => $phone,
            'productArray[1][id]' => $product_id_1,
            'productArray[1][price]' => $price_1,
            'productArray[1][custom_sizeProdOrder]' => $custom_sizeProdOrder,
            'productArray[1][custom_colorProdOrder]' => $custom_colorProdOrder,
            'source' => 'mysite.com',
            'customorder_SMStoClient' => 'да',
            'customorder_tocall' => 'да',
            'customorder_partnerid' => 'ваш id',
            'customorder_Ordertype' => 'Дроп',
);

$curlNT = curl_init('https://newtrend.team/api/dropshipping/orders/add/json/');
curl_setopt($curlNT, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curlNT, CURLOPT_POST, true);
curl_setopt($curlNT, CURLOPT_POSTFIELDS,  http_build_query($data));
curl_setopt($curlNT, CURLOPT_TIMEOUT, 30);
curl_setopt($curlNT, CURLOPT_CONNECTTIMEOUT, 30);
curl_setopt($curlNT, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curlNT, CURLOPT_SSL_VERIFYHOST, false);
$response = curl_exec($curlNT);
$result = json_decode($response, true);
curl_close($curlNT);
header("Location: success.html");
?>