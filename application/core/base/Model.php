<?php


namespace app\core\base;


use app\core\Database;

abstract class Model
{

    public $attributes = array();
    public $errors = array();
    public $rules = array();

    public function __construct()
    {
        Database::instance();
    }

    public function load($data)
    {
        foreach ($this->attributes as $name => $value) {
            if (isset($data[$name]))
            {
                $this->attributes[$name] = $data[$name];
            }
        }
    }

    public function save($table)
    {
        $tbl = \R::dispense($table);
        foreach ($this->attributes as $name => $value)
        {
            $tbl->$name = $value;
        }

        return \R::store($tbl);
    }

}