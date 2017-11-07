<?php
/**
 * Created by PhpStorm.
 * User: tintrang
 * Date: 11/7/17
 * Time: 12:06 AM
 */

namespace App;


class Parser
{

    public function getName($text)
    {
        $data = [];
        $p = strpos($text,'name is');
        if ($p!==false){
            $name = substr($text,$p+7);
            $data['name']= $name;
        }
        return $data;

    }

}