<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public static function generateSeoURL($string)
    {
        $string = trim($string); // Trim String
        $string = strtolower($string); //Unwanted:  {UPPERCASE} ; / ? : @ & = + $ , . ! ~ * ' ( )
        $string = preg_replace("/[^a-z0-9_\s-]/", "", $string);  //Strip any unwanted characters
        $string = preg_replace("/[\s-]+/", " ", $string); // Clean multiple dashes or whitespace
        $string = preg_replace("/[\s_]/", "-", $string); //Convert whitespace and underscore to das
        return $string;
    }
}
