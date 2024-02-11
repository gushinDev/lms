<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('statements', function (Blueprint $table) {
//            $table->uuid('id')->primary();
            $table->string('actor');
            $table->string('verb', 50);
            $table->uuid('object');
            $table->timestamp('created_at');

            $table->index('actor');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('statements');
    }
};


