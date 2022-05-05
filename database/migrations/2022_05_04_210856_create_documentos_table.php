<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documentos', function (Blueprint $table) {
            $table->id('IDCODIGO', 11);
            $table->foreignId('IDCLIENTE')->constrained('clientes');
            $table->string('RAZON_SOCIAL', 60);
            $table->string('RFC', 15);
            $table->double('SUBTOTAL', 13, 3);
            $table->double('IVA', 13, 3);
            $table->double('TOTAL', 13, 3);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('documentos');
    }
}
