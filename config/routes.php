<?php
/**
 * Created by PhpStorm.
 * User: Andrey
 * Date: 01.04.2016
 * Time: 18:04
 */

return array(
    'product/([0-9]+)' => 'product/view/$1',
    'catalog' => 'catalog/index',
    'category/([0-9]+)/page-([0-9]+)' => 'catalog/category/$1/$2',
    'category/([0-9]+)' => 'catalog/category/$1',
    'user/register' => 'user/register',
    'user/login' => 'user/login',
    'user/logout' => 'user/logout',
    'cabinet/edit' => 'cabinet/edit',
    'cabinet' => 'cabinet/index',
    '' => 'site/index',
    /*'news/([0-9]*)' => 'news/view',
    'news' => 'news/index',
    'articles' => 'articles/list',
    'news/archive' => 'news/archive',

     * 'news/([0-9]+)' => 'news/view/$1',
    'news' => 'news/index',     */
);