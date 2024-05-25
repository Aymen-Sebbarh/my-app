<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NetworkEquipement extends Model
{
    use HasFactory;
    protected $table='network_equipments';
    protected $fillable=[
        'device_Name',
        'Model',
        'Manufacturer',
        'number_ports',
        'security_Features',
        'Management_Interface',
        'quantity',
        'guarantee',
        'status'
    ];
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
