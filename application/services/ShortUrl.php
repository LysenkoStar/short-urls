<?php


namespace app\services;

use Exception;
use \RedBeanPHP\R as R;

class ShortUrl
{
    protected static $chars = "abcdfghjkmnpqrstvwxyz|ABCDFGHJKLMNPQRSTVWXYZ|0123456789";
    protected static $table = "modified";
    protected static $checkUrlExists = false;
    protected static $codeLength = 7;

    protected $timestamp;


    public function __construct()
    {
        $this->timestamp = date("Y-m-d H:i:s");
    }

    public function urlToShortCode($url)
    {
        if(empty($url)){
            throw new Exception("No URL was supplied.");
        }

        if(self::validateUrlFormat($url) == false){
            throw new Exception("URL does not have a valid format.");
        }

        if(self::$checkUrlExists){
            if (!$this->verifyUrlExists($url)){
                throw new Exception("URL does not appear to exist.");
            }
        }

        $shortCode = $this->urlExistsInDB($url);
        if($shortCode == false){
            $shortCode = $this->createShortCode($url);
        }

        return $shortCode;
    }

    protected function validateUrlFormat($url)
    {
        return filter_var($url, FILTER_VALIDATE_URL, FILTER_FLAG_HOST_REQUIRED);
    }

    protected function verifyUrlExists($url)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_NOBODY, true);
        curl_setopt($ch,  CURLOPT_RETURNTRANSFER, true);
        curl_exec($ch);
        $response = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        return (!empty($response) && $response != 404);
    }

    public function urlExistsInDB($url)
    {
        $existUrl = R::findOne(self::$table,'original = ? LIMIT 1', [$url] );
        return (empty($existUrl)) ? false : $existUrl['modified'];
    }

    protected function createShortCode($url)
    {
        $shortCode = $this->generateRandomString(self::$codeLength);
        $id = $this->insertUrlInDB($url, $shortCode);
        return $shortCode;
    }

    protected function generateRandomString($length = 6)
    {
        $sets = explode('|', self::$chars);
        $all = '';
        $randString = '';
        foreach($sets as $set){
            $randString .= $set[array_rand(str_split($set))];
            $all .= $set;
        }
        $all = str_split($all);
        for($i = 0; $i < $length - count($sets); $i++){
            $randString .= $all[array_rand($all)];
        }
        $randString = str_shuffle($randString);
        return $randString;
    }

    protected function insertUrlInDB($url, $code)
    {
        $modified = R::dispense(self::$table);
        $modified->original = $url;
        $modified->modified = $code;
        $modified->date = $this->timestamp;

        return R::store( $modified );;
    }

    public function shortCodeToUrl($code, $increment = true)
    {
        if(empty($code)) {
            throw new Exception("No short code was supplied.");
        }

        if(self::validateShortCode($code) == false){
            throw new Exception("Short code does not have a valid format.");
        }

        $urlRow = $this->getUrlFromDB($code);
        if(empty($urlRow)){
            throw new Exception("Short code does not appear to exist.");
        }

        if($increment == true){
            self::incrementCounter($urlRow["id"]);
        }

        return $urlRow["original"];
    }

    protected function validateShortCode($code)
    {
        $rawChars = str_replace('|', '', self::$chars);
        return preg_match("|[".$rawChars."]+|", $code);
    }

    protected function getUrlFromDB($code)
    {
        $existUrl = R::findOne(self::$table,'modified = ? LIMIT 1', [$code] );
        return (empty($existUrl)) ? false : $existUrl;
    }

    protected function incrementCounter($id)
    {
        $url = R::load(self::$table, $id);
        $url->hits = $url->hits + 1;
        R::store($url);
    }
}