<?php
/**
 * Description of category:
 * класс для работы с категориями
 * @author andrey
 */
class category {
    //put your code here
    public static function getCategoriesList(){ //функция для получения массива категорий из бд
        
        $db = Db::getConnection(); //инициализируем подключение к бд
        
        $categoryList = array(); //инициализируем переменную для списка категорий
        
        $result = $db->query('SELECT id, parent_id, name FROM category ORDER BY parent_id, id'); // получаем из базы список категорий (id, родительский id, имя категори
        
        $i = 0;
        while ($row = $result->fetch()){ //перебираем массив полученный из бд и формируем массив для вывода на страницу сайта
            $categoryList[$i]['id'] = $row['id'];
            $categoryList[$i]['parent_id'] = $row['parent_id'];
            $categoryList[$i]['name'] = $row['name'];
            $i++;
        }
        
        return $categoryList; //возвращаем массив категорий
    }
    
    
    /* Построение дерева категорий с подкатегориями 
    
    public function treeCategory(){
        $db = Db::getConnection();
        $result = $db->query("SELECT `id`, `parent_id`, `name` FROM `category`"); 
 
        $cats = array(); // тут будет наш массив с категориями каталога
        // в цикле формируем нужный нам массив
          while($cat =  $result->fetch())
                $cats[$cat['parent_id']][] =  $cat;
          return $cats;
    }
    
    // далее наша главная, рекурсивная функция, которая сформирует дерево категорий
    public static function create_tree($cats,$parent_id){
        if(is_array($cats) and  isset($cats[$parent_id])){
          $tree = '<ul>';
          foreach($cats[$parent_id] as $cat){
             $tree .= "<li><a href='catalog.html?catid=".$cat['id']."'>".$cat['name']."</a>";
             $tree .=  self::create_tree($cats,$cat['id']);
             $tree .= '</li>';         
          }
          $tree .= '</ul>';
        } 
        else return null;          
      return $tree;        
    } 
     * 
     */
}
