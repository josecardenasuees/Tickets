<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tickets extends Model
{
    protected $table = 'Tickets';
    protected $primaryKey = 'Ticket';
    protected $fillable = ['ticketfecha', 'tickethora', 'cliente', 'servicio', 'ticketestado'];    
    public $timestamps = false;

    // Relación con Cliente
    public function cliente()
    {
        return $this->belongsTo(Clientes::class, 'cliente');
    }

    // Relación con Servicio
    public function servicio()
    {
        return $this->belongsTo(Servicios::class, 'servicio');
    }

     // Relación con Cliente
     public function cli()
     {
         return $this->belongsTo(Clientes::class, 'cliente');
     }
 
     // Relación con Servicio
     public function ser()
     {
         return $this->belongsTo(Servicios::class, 'servicio');
     }
}
