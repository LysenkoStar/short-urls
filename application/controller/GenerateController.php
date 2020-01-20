<?php

namespace app\controller;

use app\services\ShortUrl;
use Exception;

class GenerateController extends AppController
{

    public function indexAction()
    {
        $this->ajax = true;
        try {
            $service = new ShortUrl();

            $url = !empty(trim($_POST['url'])) ? trim($_POST['url']) : null;
            if (!empty($url))
            {
                $code = $service->urlToShortCode($url);
                $newUrl = PATH . '' . $code;
                echo json_encode(array(
                    'success' => true,
                    'message' => $newUrl,
                    'code'    => 200
                ));
            } else {
                throw new Exception('URL was not passed', 400);
            }
        } catch (Exception $e) {
            echo json_encode(array(
                'success' => false,
                'message' => $e->getMessage(),
                'code'    => $e->getCode()
            ));
        }
    }

}