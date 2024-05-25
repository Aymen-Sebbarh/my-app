<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laptop extends Model
{
    use HasFactory;
    protected $table ="laptops";
    protected $fillable=[
        'laptop_name',
        'model',
        'proccessor',
        'ram',
        'storage',
        'quantité',
        'screen_size',
        'graphics_card',
        'battery_life',
        'guarantee',
        'status'
    ];
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
