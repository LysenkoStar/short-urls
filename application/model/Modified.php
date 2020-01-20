<?php

namespace app\model;

use RedBeanPHP\R as R;

class Modified extends AppModel
{
    public $attributes = array(
        'original'     => '',
        'modified'  => '',
        'date'      => '',
        'hits'      => '',
    );

    public function getAll()
    {
        $links =  R::findAll('modified');
        return $links;
    }

    public function removeLink($id)
    {
        $url = R::load('modified', $id);
        R::trash( $url );
    }

}