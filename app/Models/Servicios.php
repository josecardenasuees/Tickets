<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Servicios extends Model
{
    protected $table = 'Servicios';
    protected $primaryKey = 'servicio';
    protected $fillable = ['servicio', 'servicionombre'];    
    public $timestamps = false;

    // Relación con Tickets
    public function tickets()
    {
        return $this->hasMany(Tickets::class, 'servicio');
    }
}
