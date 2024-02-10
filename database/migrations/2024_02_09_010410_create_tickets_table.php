<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->bigIncrements('Ticket');
            $table->dateTime('TicketFecha');
            $table->string('TicketHora', 8);
            $table->decimal('cliente', 10);
            $table->smallInteger('servicio');
            $table->char('TicketEstado', 1);
            $table->timestamps();
        
            $table->foreign('cliente')->references('cliente')->on('clientes');
            $table->foreign('servicio')->references('servicio')->on('servicios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tickets');
    }
}
