<?php
class Helper
{
    public static function getRndImage($database, $path)
    {
        $string = file_get_contents(__DIR__ . $database);
        $list = json_decode($string, true);
        $rndIndex = rand(0, count($list) - 1);
        $list[$rndIndex];
        $image = $list[$rndIndex][$path];
        return $image;
    }
}
