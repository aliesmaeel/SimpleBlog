<?php

namespace App\Helpers;

use Carbon\Carbon;
use Illuminate\Support\Str;

class Utilities {

    public static function ShortBody(string $body)
    {
        return Str::words(strip_tags($body),30);
    }

    public static function getFormattedDate(Carbon $date)
    {
        return $date->format('F jS Y');
    }

    public static function getImageFromUrl(string $link = null)
    {
       if(!str_starts_with($link,'http'))
       {
           $link='/storage/'.$link;
       }

        return $link;
    }

}
