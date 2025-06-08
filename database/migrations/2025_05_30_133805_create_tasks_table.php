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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id("task_id");
            $table->unsignedBigInteger("user_id");
            $table->string("title")->unique();
            $table->text("description")->nullable();
            $table->enum("occurence",['daily','weekly','monthly','yearly']);
            $table->tinyInteger("is_complete")->default("0");
            $table->bigInteger("timesCompleted")->nullable();
            $table->bigInteger("timesMissed")->nullable();
            $table->timestamps();

            $table->foreign("user_id")->references("user_id")->on("users")->onDelete("cascade")->onUpdate("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
