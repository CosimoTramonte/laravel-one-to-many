<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('projects', function (Blueprint $table) {
            //creao la colonna dove andrà la fk
            $table->unsignedBigInteger('type_id')->nullable()->after('id');

            //assegno la fk
            $table->foreign('type_id')
                    ->references('id')
                    ->on('types')
                    //evita l'eliminazione a cascata
                    ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('projects', function (Blueprint $table) {
            //elimino prima la fk
            //oppure 'projects_typy_id_foreign'
            $table->dropForeign(['type_id']);

            //elimino la colonna
            $table->dropColumn('type_id');
        });
    }
};
