<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('tenants', function (Blueprint $table) {
            $table->foreignId('tipo_estabelecimento_id')->nullable()->constrained('tipos_estabelecimentos')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::table('tenants', function (Blueprint $table) {
            $table->dropForeign(['tipo_estabelecimento_id']);
            $table->dropColumn('tipo_estabelecimento_id');
        });
    }
};
