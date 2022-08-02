<?php

class Order {

    public static function save($randomId, $price, $products, $userName, $userTel, $userEmail) {
        $db = Db::getConnection();
        $sql = 'INSERT INTO orders (id_order, price, products, user_name, user_tel, user_email) ' 
        . 'VALUES (:id_order, :price, :products, :user_name, :user_tel, :user_email)';

        $products = json_encode($products);

        $result = $db->prepare($sql);
        $result->bindParam(':id_order', $randomId, PDO::PARAM_STR);
        $result->bindParam(':price', $price, PDO::PARAM_STR);
        $result->bindParam(':products', $products, PDO::PARAM_STR);
        $result->bindParam(':user_name', $userName, PDO::PARAM_STR);
        $result->bindParam(':user_tel', $userTel, PDO::PARAM_STR);
        $result->bindParam(':user_email', $userEmail, PDO::PARAM_STR);

        return $result->execute();
    }
}