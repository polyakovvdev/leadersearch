<?php

class HomeController {

    public static function actionIndex() {

        $products = array();
        $products = Product::getProducts();
        require_once(ROOT.'/views/home/index.php');
        return true;
    }
}