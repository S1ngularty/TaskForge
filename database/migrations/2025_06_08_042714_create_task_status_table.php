<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('task_status', function (Blueprint $table) {
            $table->id("ts_id");
            $table->unsignedBigInteger("task_id");
            $table->tinyInteger("is_complete")->default(0);
            $table->date("task_start");
            $table->date("task_end");

            $table->foreign("task_id")->references("task_id")->on("tasks")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('task_status');
    }
};
