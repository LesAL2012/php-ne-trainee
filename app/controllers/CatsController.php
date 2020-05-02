<?php


namespace app\controllers;

use app\models\Cats;
use fw\core\base\View;
use fw\libs\Pagination;
use RedBeanPHP\R;

class CatsController extends AppController
{
    public function indexAction()
    {
        $model = new Cats();
        $table = $model->tableInfoAnimals;
        $category = $model->tableCatAnimals;
        $tag = $model->tableTagAnimal;

        $total = R::count($table);
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $perPage = isset($_SESSION['perPageCat']) ? (int)$_SESSION['perPageCat'] : 10; // записей на странице при пагинации
        $pagination = new Pagination($page, $perPage, $total);
        $start = $pagination->getStart();

        $sort = 'id';
        $desc = 'DESC';
        if (isset($_GET['sort']) && $_GET['sort'] != '') {
            $sort = $_GET['sort'];
        }
        if (isset($_GET['desc'])) {
            $desc = $_GET['desc'];
        }

        $catsList = R::getAll("SELECT $table.*, $category.category
                FROM $table
                LEFT JOIN $category
                ON $category.id = $table.categoryid                
                ORDER BY $sort $desc  LIMIT ?,?", [ $start, $perPage]);

        $tags = [];
        foreach ($catsList as $item) {
            $tags[] = $item['id'];
        }

        $catsTag = R::findLike($tag, ['public_id' => $tags], 'ORDER BY tag');

        $fullInfo = [];
        foreach ($catsList as $item) {
            foreach ($catsTag as $tags) {
                if ($item['id'] == $tags['public_id']) {
                    $item['tag'][] = $tags['tag'];
                }
            }
            $fullInfo[] = $item;
        }

        View::setMeta("Cats list");

        $this->set(compact('fullInfo', 'pagination', 'sort', 'desc'));
    }

    public function perPageAction()
    {
        $_SESSION['perPageCat'] = $_POST['numberPages'];
        echo json_encode($_POST['numberPages']);
        die;
    }
}
