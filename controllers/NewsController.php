<?php

/**
 * Created by PhpStorm.
 * User: andrey
 * Date: 01.04.16
 * Time: 22:55
 */

include_once ROOT.'/models/News.php';

class NewsController{

    public function actionIndex(){

        $newsList = array();
        $newsList = News::getNewsList();

        require_once (ROOT.'/views/news/index.php');

        

        return true;
    }

    public function actionView($id){

        if($id){
            $newsItem = News::getNewsItemById($id);

            echo '<pre>';
            print_r($newsItem);
            echo '</pre>';

            echo 'actionView';
        }

        return true;
    }

}