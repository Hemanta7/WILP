<?php
namespace App\Helper;

class AppHelper
{
    public function trim_word($text, $length, $startPoint=0, $allowedTags=""){
        $text = html_entity_decode(htmlspecialchars_decode($text));
        $text = strip_tags($text, $allowedTags);
        return $text = substr($text, $startPoint, $length);
    }
    public static function instance()
     {
         return new AppHelper();
     }
}