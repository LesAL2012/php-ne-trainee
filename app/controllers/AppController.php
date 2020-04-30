<?php

namespace app\controllers;

class AppController extends \fw\core\base\Controller
{
    public $meta =[];

    public function __construct($route)
    {
        parent::__construct($route);
    }

    protected function setMeta($title = '', $desc = '', $keywords = '')
    {
        $this->meta['title'] = $title;
        $this->meta['desc'] = $desc;
        $this->meta['keywords'] = $keywords;
    }
}
