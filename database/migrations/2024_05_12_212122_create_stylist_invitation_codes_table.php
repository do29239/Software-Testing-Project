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
        Schema::create('stylist_invitation_codes', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->boolean('used')->default(false);
            $table->dateTime('expires_at');

            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('used_by')->nullable();  // This is nullable because it starts as unused

            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('used_by')->references('id')->on('users')->onDelete('set null');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stylist_invitation_codes');
    }
};
