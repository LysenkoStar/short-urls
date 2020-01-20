<?php

namespace app\controller;

use app\core\Cache;
use app\services\ShortUrl;
use Exception;
use \RedBeanPHP\R as R;

class MainController extends AppController
{

    public function indexAction()
    {

    }

    public function rewriteAction()
    {
        $this->ajax = true;

        $code = trim(strip_tags($this->route['alias']));
        $service = new ShortUrl();
        try {
            $url = $service->shortCodeToUrl($code);
            if ($url && !empty($url))
            {
                // Redirect to the original URL
                header("Location: ".$url);
                exit;
            } else {
                throw new Exception('Wrong code or page doesn\'t exist', 404);
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }

    }

}