<?php


namespace app\core;


use Error;

class ErrorHandler
{
    public function __construct()
    {
        if (DEBUG)
        {
            error_reporting(-1);
        } else {
            error_reporting(0);
        }
        set_exception_handler(array($this, 'exceptionHandler'));
    }


    /**
     * @param Error $e
     */
    public function exceptionHandler($e)
    {
        $this->logErrors($e->getMessage(), $e->getFile(), $e->getLine());
        $this->displayError('Exception', $e->getMessage(), $e->getFile(), $e->getLine(), $e->getCode());
    }

    protected function logErrors($message = '', $file = '', $line = '')
    {
        error_log("[" . date('Y-m-d H:i:s') . "] Error message: {$message} | File:  {$file} | Line: {$line} \n===============================\n",
            3, ROOT . '/tmp/errors.log');
    }

    protected function displayError($errno, $errstr, $errfile, $errline, $response = 404)
    {
        http_response_code($response);
        if ($response == 404 && !DEBUG)
        {
            require APP . '/view/errors/404.php';
            die();
        }
        if (DEBUG) {
            require APP . '/view/errors/dev.php';
        } else {
            require APP . '/view/errors/prod.php';
        }
        die();
    }

}