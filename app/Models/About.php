<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;
    protected $fillable = [
        'about_us',
        'mission',
        'vision',
        'value',
    ];

    public static function getAbout(){
        $About = self::all();
        if (count($About) < 1) {
            $data = [
                "id" => 1,
                'about_us' => 'About Us section',
                'mission' => 'Mission section',
                'vision' => 'Vision section',
                'value' => 'Value section',
            ];
            self::create($data);
        }
        return self::first();
    }
}
