<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('domain_records', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('domain_name', 63);
            $table->string('domain_extension', 64);
            $table->string('registrar', 120);
            $table->date('registration_date');
            $table->date('expiry_date')->index();
            $table->string('status', 20)->default('active')->index();
            $table->boolean('auto_renewal')->default(false);
            $table->decimal('price', 10, 2)->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
            $table->index(['user_id', 'expiry_date']);
            $table->index(['user_id', 'status']);
            $table->index(['domain_name', 'domain_extension']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('domain_records');
    }
};
