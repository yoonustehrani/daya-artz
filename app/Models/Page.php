<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Zeus\Models\ZeusModel;

class Page extends ZeusModel
{
    public static function booted() {
        static::saved(function($page) {
            \Cache::forever("website.pages.{$page->slug}", $page);
        });
        static::deleted(function($page) {
            \Cache::forget("website.pages.{$page->slug}");
        });
    }
    use HasFactory;
}
