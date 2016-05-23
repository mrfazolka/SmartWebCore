<?php
namespace App\MyFunctions;

class Filters
{
    public static function common($filter, $value)
    {
        if (method_exists(__CLASS__, $filter)) {
            $args = func_get_args();
            array_shift($args);
            return call_user_func_array(array(__CLASS__, $filter), $args);
        }
    }

    public static function tucne($obsah)
    {
        return "<b>" . $obsah . "</b>";
    }
    
    public static function firstLower($str)
    {
        return lcfirst($str);
    }
}