<?php

class Cart {
    public static function addProduct($id) {
        $id = intval($id);
        $productsInCart = array();

        //Если в корзине уже есть товары 
        if (isset($_SESSION['products'])) {
            $productsInCart = $_SESSION['products'];
        }

        //Если в корзине пусто
        if (!array_key_exists($id, $productsInCart)) {
            $productsInCart[$id] = 1;
        }

        $_SESSION['products'] = $productsInCart;

        return self::countItems();
    } 

    public static function countItems() {
        if (isset($_SESSION['products'])) {
            $count = 0;
            foreach ($_SESSION['products'] as $id => $quantity) {
                $count = $count + $quantity;
            }
            return $count;
        } else {
            return 0;
        }
    }

    public static function getProducts() {
        if (isset($_SESSION['products'])) {
            return $_SESSION['products'];
        }
        return false;
    }

    public static function isHavingInCart($id) {
        if (array_key_exists($id, $_SESSION['products'])) {
            return true;
        }
        return false;
    }

    public static function getTotalPrice($products) {
        $productsInCart = self::getProducts();
        $total = 0;

        if ($productsInCart) {
            foreach ($products as $item) {
                $total += $item['price']*$productsInCart[$item['id_product']];
            }  
        }
        return $total;
    }

    public static function deleteProduct($id) {
        $productsInCart = self::getProducts();
        unset($productsInCart[$id]);
        $_SESSION['products'] = $productsInCart;
    }

    public static function decrementItem($id) {
        if (isset($_SESSION['products'])) {
            $_SESSION['products'][$id]--;
        }
        return true;
    }

    public static function increaseItem($id) {
        if (isset($_SESSION['products'])) {
            $_SESSION['products'][$id]++;
        }
        return true;
    }

    public static function clear() {
        if (isset($_SESSION['products'])) {
            unset($_SESSION['products']);
        }
    }
}