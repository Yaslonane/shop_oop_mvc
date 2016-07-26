<?php

/* 
 *
 */
include_once ROOT.'/models/category.php';
include_once ROOT.'/models/Product.php';

class SiteController{
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
        $latestProduct = Product::getLatestProducts();
        
        require_once(ROOT . TMPL .'index.php');
        
        return true;
    }
        /* 
         * конец вывода главной страницы 
         */
}
