<?php
namespace App\MyFunctions;

class Func
{
    public static function arrHash($arr)
    {
        return \Nette\Utils\ArrayHash::from($arr);
    }
}