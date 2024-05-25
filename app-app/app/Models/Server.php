<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Server extends Model
{
    use HasFactory;
    protected $table = 'servers';
    protected $fillable=[
        'server_name',
        'host_name',
        'ip_address',
        'port',
        'quantity',
        'guarantee',
        'status'
    ];
    public function users()
    {
        return $this->belongsToMany(User::class);
    }

}
