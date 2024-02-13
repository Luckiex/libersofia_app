<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use function Laravel\Prompts\table;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('libros', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->unsignedBigInteger('editoriale_id')->nullable();

            $table->foreign('editoriale_id')
                    ->references('id')
                    ->on('editoriales')
                    ->onDelete('set null')
                    ->onUpdate('cascade');

            $table->integer('anyo_publicacion')->unsigned();
            $table->string('genero');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('libros');
    }
};
