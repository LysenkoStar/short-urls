<?php

namespace app\controller\admin;

use app\core\Cache;
use app\model\Modified;
use RedBeanPHP\R as R;

class MainController extends AppController
{

    public function indexAction()
    {
        $base = new Modified();
        $links = $base->getAll();

        $this->setData(compact('links'));
    }

    public function removeAction()
    {
        $this->ajax = true;

        $repository = new Modified();
        $id = $this->route['alias'];
        $repository->removeLink($id);
    }
}