<?php

namespace app\controllers;

use app\models\Main;
use fw\libs\Pagination;
use R;

class MainController extends AppController
{
    public function indexAction()
    {
        $model = new Main;

        $total = R::count($model->tableInfoAnimals);
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $perPage = 3; // записей на странице при пагинации
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

        $cardAnimal = R::getAll("SELECT id, title, summary, pictures FROM $model->tableInfoAnimals ORDER BY $sort $desc LIMIT ?,?", [$start, $perPage]);
        $catAnimal = R::getAll("SELECT id, description FROM $model->tableCatAnimals ORDER BY category");
        $tagAnimal= R::getAll("SELECT DISTINCT tag FROM $model->tableTagAnimal ORDER BY tag");

        $this->setMeta('Main', 'Cat breeds', 'Cat breeds, cat category');
        $meta = $this->meta;

        $this->set(compact('meta', 'cardAnimal', 'catAnimal', 'tagAnimal', 'pagination', 'sort', 'desc'));
    }
}
