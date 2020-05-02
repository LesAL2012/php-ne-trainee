<?php

namespace app\controllers;

use app\models\Main;
use fw\libs\Pagination;
use \RedBeanPHP\R;

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

        $catAnimal = $this->getAllCatsAnimal();
        $tagAnimal = $this->getAllTagsAnimal();

        $this->setMeta('Main', 'Cat breeds', 'Cat breeds, cat category');
        $meta = $this->meta;

        $this->set(compact('meta', 'cardAnimal', 'catAnimal', 'tagAnimal', 'pagination', 'sort', 'desc'));
    }

    public function articleCatAction()
    {
        $model = new Main;

        $id = $_GET['id'];

        $article = R::getRow("SELECT * FROM $model->tableInfoAnimals WHERE `id` = ? LIMIT ?", [$id, 1]);
        $tag = R::getAll("SELECT * FROM $model->tableTagAnimal WHERE `public_id` = ?", [$id]);

        $tagText = '';
        foreach ($tag as $item) {
            $tagText .= $item['tag'] . '; ';
        }

        $this->setMeta($article['title'], $article['summary'], $tagText);
        $meta = $this->meta;

        $this->set(compact('meta', 'article', 'tag'));
    }

    public function tagSelectionAction()
    {
        $model = new Main;

        $tag = $_GET['tag'];

        $total = R::count($model->tableTagAnimal, 'tag = ?', [$tag]);

        if ($total == 0) {
            $firstTag = R::getRow("SELECT tag FROM $model->tableTagAnimal LIMIT ?", [1]);
            $tag = $_GET['tag'] = $firstTag['tag'];
        }

        $getId = R::getAll("SELECT DISTINCT `public_id` FROM $model->tableTagAnimal WHERE `tag` = ?", [$tag]);

        $arrIdTag = [];
        foreach ($getId as $idTeg) {
            $arrIdTag[] = $idTeg['public_id'];
        }

        $articles = $this->getArticles('id', $arrIdTag);
        $tagAnimal = $this->getAllTagsAnimal();

        $this->setMeta("Tag: $tag");
        $meta = $this->meta;

        $this->set(compact('meta', 'articles', 'tag', 'tagAnimal'));
    }


    public function categorySelectionAction()
    {
        $model = new Main;

        $cat = $_GET['cat'];
        $total = R::count($model->tableCatAnimals);
        if ($cat > $total) {
            $cat = $_GET['cat'] = $total;
        } elseif ($cat < 1) {
            $cat = $_GET['cat'] = 1;
        }

        $catData = R::getRow("SELECT * FROM $model->tableCatAnimals WHERE `id` = ? LIMIT ?", [$cat, 1]);

        $articles = $this->getArticles('category_id', $cat);
        $catAnimal = $this->getAllCatsAnimal();
        $tagAnimal = $this->getAllTagsAnimal();

        $this->setMeta("Category: ${catData['category']}");
        $meta = $this->meta;

        $this->set(compact('meta', 'articles', 'catData', 'tagAnimal', 'catAnimal'));
    }

    protected function getAllTagsAnimal()
    {
        $model = new Main;
        return R::getAll("SELECT DISTINCT tag FROM $model->tableTagAnimal ORDER BY tag");
    }

    protected function getAllCatsAnimal()
    {
        $model = new Main;
        return R::getAll("SELECT id, description FROM $model->tableCatAnimals ORDER BY category");
    }

    protected function getArticles($field, $param)
    {
        $model = new Main;
        return R::findLike($model->tableInfoAnimals, [$field => $param], 'ORDER BY title');
    }
}
