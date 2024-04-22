<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Setting extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;
    protected $fillable = [
        'phone_number',
        'email',
        'whatsapp',
        'linkedin',
        'facebook',
        'instagram',
        'tiktok',
    ];

    public static function getSetting(){
        $settings = self::all();
        if (count($settings) < 1) {
            $data = [
                "id" => 1,
            ];
            self::create($data);
        }
        return self::first();
    }
}
