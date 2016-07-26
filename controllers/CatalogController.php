<?php
/* 
 *
 */
include_once ROOT.'/models/category.php';
include_once ROOT.'/models/Product.php';
include_once ROOT.'/components/Pagination.php';

class CatalogController{
        /*
         * 
         * вывод главной страницы
         * 
         */
    public function actionIndex(){ 
        
        $categories = array(); //инициализируем переменную для вывода списка категорий
        $categories = category::getCategoriesList(); // вызываем метод получения массива категорий из модели категории
        /* выводим дерево категорий
        $x = new Category(); // вызываем класс
        $a = $x->treeCategory(); // выбираем из базы список категорий и подкатегорий
        $categories2 = category::create_tree($a, 0); // вызываем функцию и строим дерево
         */
        
        $latestProduct = array();
        $latestProduct = Product::getLatestProducts(12);
        
        require_once(ROOT . TMPL .'catalog.php');
        
        return true;
    }
    
    public function actionCategory($categoryId, $page = 1){
        
        $categories = array();
        $categories = category::getCategoriesList();
        
        $categoryProducts = array();
        $categoryProducts = Product::getProductsListByCategory($categoryId, $page);
        
        $total = Product::getTotalProductsInCategory($categoryId);
        
        $pagination = new Pagination($total, $page, Product::SHOW_BY_DEFAULT, 'page-');
        
        require_once (ROOT . TMPL .'category.php');
        
        return true;
    }
        /* 
         * конец вывода  главной страниц
         */
}


