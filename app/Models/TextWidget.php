<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
class TextWidget extends Model
{
    use HasFactory;

    protected $fillable=['key','title','content','active','image'];

    public static function  getTitle(string $key) : string
    {
        $widget=Cache::get('text-widget'.$key,function() use ($key){

            return TextWidget::query()->where('active',true)
                ->where('key',$key)
                ->first();
        });

       return $widget ?  $widget->title : '';

    }

    public static function  getContent(string $key) : string
    {
        $widget=Cache::get('text-widget'.$key,function() use ($key){

            return TextWidget::query()->where('active',true)
                ->where('key',$key)
                ->first();
        });

        return $widget ?  $widget->content : '';

    }

}
