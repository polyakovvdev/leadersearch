<?php

class CartController {
    
    //если форма заполнена правильно, то будет отображен попап
    public static $isVisiblePopup = false;

    public static function actionIndex() {
        $productsInCart = Cart::getProducts();

        if ($productsInCart) {
            $productsIds = array_keys($productsInCart);
            $products = Product::getProductByIds($productsIds);

            $totalPrice = Cart::getTotalPrice($products);
        }

        require_once(ROOT.'/views/cart/index.php');
        return true;
    }

    public static function actionAdd($id) {
        Cart::addProduct($id);
        $referrer = $_SERVER['HTTP_REFERER'];
        header("Location: $referrer");
        return true;
    }

    public function actionDelete($id) {
        Cart::deleteProduct($id);
        header("Location: /cart/");
        return true;
    }

    public function actionItemDecrement($id) {
        Cart::decrementItem($id);
        $referrer = $_SERVER['HTTP_REFERER'];
        header("Location: $referrer");
        return true;
    }

    public function actionItemIncrease($id) {
        Cart::increaseItem($id);
        $referrer = $_SERVER['HTTP_REFERER'];
        header("Location: $referrer");
        return true;
    }

    public function checkName($userName) {
        $pattern = "/^[а-яА-Я]+$/ui";
        return preg_match($pattern, $userName);
    }

    public function checkTel($userTel) {
        return strlen($userTel) == 18;
    }

    public function checkEmail($userEmail) {
        $pattern = "/\S+@\S+\.\S+/";
        return preg_match($pattern, $userEmail);
    }

    public static function visiblePopup() {
        return self::$isVisiblePopup;
    }

    public function actionCheck() {
        $productsInCart = Cart::getProducts();
        // Находим общую стоимость
        $productsIds = array_keys($productsInCart);
        $products = Product::getProductByIds($productsIds);
        $price = Cart::getTotalPrice($products);

        $userName = false;
        $userTel = false;
        $userEmail = false;
        $result = false;
        
        $errName = 'Неправильное имя! Используйте только русские буквы.';
        $errTel = 'Поле заполнено неверно';
        $errEmail = 'Поле заполнено неверно';

        if (isset($_POST['feedback__btn'])) {
            $userName = $_POST['user-name'];
            $userTel = $_POST['user-tel'];
            $userEmail = $_POST['user-email'];

            if (self::checkName($userName)) {
                $errName = '';
            }

            if (self::checkTel($userTel)) {
                $errTel = '';
            }

            if (self::checkEmail($userEmail)) {
                $errEmail = '';
            }

            if ($errName == '' && $errEmail == '' && $errTel == '')  {
                //Генерируем псевдо-рандомный id заказа:
                $randomId = rand(1, 1000000);
                $result = Order::save($randomId, $price, $productsInCart, $userName, $userTel, $userEmail);
                if ($result) {
                    self::$isVisiblePopup = true;
                    self::visiblePopup();
                    $message = 'Спасибо, ' . $userName . ', ваш заказ №' . $randomId . ' оформлен. '
                     . 'В ближайшее время мы свяжемся с вами по телефону ' . $userTel . '.';
                    $subject = 'Тестовое задание, заказ №' . $randomId;
                    mail($userEmail, $subject, $message);
                }
            }
        }

        require_once(ROOT . '/views/cart/index.php');
        return true;
    }

    public static function actionClose() {
        Cart::clear();
        header("Location: /");
        return true;
    }
}