<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{
    protected $table = 'Clientes';
    protected $primaryKey = 'cliente';
    protected $fillable = ['clientenombre', 'clientecedula'];
    public $timestamps = false;

    // Relación con Tickets
    public function tickets()
    {
        return $this->hasMany(Tickets::class, 'cliente');
    }
}
