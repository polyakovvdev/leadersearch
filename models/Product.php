<?php 

    class Product {
        
        public static function getProducts() {
            $db = Db::getConnection();
            $products = array();
            $result = $db->query('SELECT DISTINCT id_product, img, desc_product, price FROM products');

            $i = 0;

            while($row = $result->fetch()) {
                $products[$i]['id_product'] = $row['id_product'];
                $products[$i]['img'] = $row['img'];
                $products[$i]['desc_product'] = $row['desc_product'];
                $products[$i]['price'] = $row['price'];
                $i++;
            }

            return $products;
        }

        public static function getProductByIds($idsArray) {
            $products = array();
            $db = Db::getConnection();
            $idsString = implode(',', $idsArray);
    
            $sql = "SELECT * FROM products WHERE id_product IN ($idsString)";
    
            $result = $db->query($sql);
            $result->setFetchMode(PDO::FETCH_ASSOC);
    
            $i = 0;
            while ($row = $result->fetch()) {
                $products[$i]['id_product'] = $row['id_product'];
                $products[$i]['img'] = $row['img'];
                $products[$i]['desc_product'] = $row['desc_product'];
                $products[$i]['price'] = $row['price'];
                $i++;
            }
    
            return $products;
        }
    }
?>