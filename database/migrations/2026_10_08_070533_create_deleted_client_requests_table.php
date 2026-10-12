<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('deleted_client_requests', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('original_id')->nullable();

            $table->string('client_name');
            $table->string('service');
            $table->string('priority');
            $table->string('status');
            $table->text('description')->nullable();

            $table->string('deleted_by')->nullable();
            $table->timestamp('deleted_at')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('deleted_client_requests');
    }
};
