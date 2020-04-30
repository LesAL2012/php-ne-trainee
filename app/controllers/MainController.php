<?php

namespace app\controllers;

use app\models\Main;
use R;

class MainController extends AppController
{
    public function indexAction()
    {
        $model = new Main;

        $cardAnimal = R::getAll("SELECT id, title, summary, pictures FROM $model->tableInfoAnimals ORDER BY id DESC");
        $catAnimal = R::getAll("SELECT id, description FROM $model->tableCatAnimals ORDER BY category");
        $tagAnimal= R::getAll("SELECT DISTINCT tag FROM $model->tableTagAnimal ORDER BY tag");

        $this->setMeta('Main', 'Cat breeds', 'Cat breeds, cat category');
        $meta = $this->meta;

        $this->set(compact('meta', 'cardAnimal', 'catAnimal', 'tagAnimal'));
    }
}
