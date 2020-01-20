<?php


namespace app\core;


class Cache
{
    use TSingletone;

    public function setCache($key, $data, $time = 3600)
    {
        if ($time)
        {
            $content['data'] = $data;
            $content['end_time'] = time() + $time;
            if ( file_put_contents(CACHE . '/' . md5($key) . '.txt', serialize($content)) )
            {
                return true;
            }
        }

        return false;
    }

    public function getCache($key)
    {
        $file = $this->getFilePath($key);
        if (file_exists($file))
        {
            $content = unserialize(file_get_contents($file));
            if (time() <= $content['end_time'])
            {
                return $content;
            }
            unlink($file);
        }
        return false;
    }

    public function deleteCache($key)
    {
        $file = $this->getFilePath($key);
        if (file_exists($file))
        {
            unlink($file);
        }
    }

    private function getFilePath($key)
    {
        return CACHE . '/' . md5($key) . '.txt';
    }

}