<?php

/*
 * контроллер продуктов
 */
include_once ROOT.'/models/category.php';
include_once ROOT.'/models/Product.php';

class ProductController {
    
//put your code here
    public function actionView($productId) { //функция вывода одного товара с подробным описание по Id
        
        $categories = array();
        $categories = Category::getCategoriesList();
        
        $product = Product::getProductById($productId);
        
        require_once(ROOT .'/'. TMPL . 'product.php'); //вызываем файл вида страницы с товаром и передаем Id
        
        return true;
    }
}
