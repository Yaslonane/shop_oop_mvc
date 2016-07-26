<?php
/**
 * Created by PhpStorm.
 * User: andrey
 * Date: 07.04.16
 * Time: 15:14
 */

class News{

    /*
     * Return single news item with specified id
     * @param integer $id
     */
    public static function getNewsItemById($id){
        //запрос к БД
        $id = intval($id);

        if($id){

            $db = Db::getConnection();

            $result = $db->query('SELECT * FROM news WHERE id='.$id);

            // $result->setFetchMode(PDO::FETCH_NUM); //обращение к элементам по номеру столбца
            $result->setFetchMode(PDO::FETCH_ASSOC); //обращение к элементам по имени столбца

            $newsItem = $result->fetch();

            return $newsItem;
        }
    }

    /*
     * return an array of news items
     */
    public static function getNewsList(){

        $db = Db::getConnection();

        $newsList = array();

        $result = $db->query('SELECT id, title, date, short_content '
                . 'FROM news '
                . 'ORDER BY date DESC '
                . 'LIMIT 10 ');

        $i = 0;
        while($row = $result->fetch()){
            $newsList[$i]['id'] = $row['id'];
            $newsList[$i]['title'] = $row['title'];
            $newsList[$i]['date'] = $row['date'];
            $newsList[$i]['short_content'] = $row['short_content'];
            $i++;
        }

        return $newsList;
    }
}

?>