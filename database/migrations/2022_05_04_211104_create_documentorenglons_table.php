<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentorenglonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documentorenglons', function (Blueprint $table) {
            $table->foreignId('IDCODIGO')->constrained('documentos');
            $table->foreignId('IDMATERIAL')->constrained('productos');
            $table->primary(['IDCODIGO', 'IDMATERIAL']);
            $table->string('UNIDAD_MEDIDA', 10);
            $table->double('CANTIDAD', 13, 3);
            $table->double('PRECIO1', 13, 3);
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
        Schema::dropIfExists('documentorenglons');
    }
}
