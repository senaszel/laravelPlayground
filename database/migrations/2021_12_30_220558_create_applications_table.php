<?php

use App\Enums\ApplicationStatus;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patient_id')->nullable()->references('id')->on('users')->nullOnDelete();
            $table->foreignId('vaccine_id')->nullable()->references('id')->on('vaccines')->nullOnDelete();
            $table->foreignId('doctor_id')->nullable()->references('id')->on('users')->nullOnDelete();
            $table->enum('status',ApplicationStatus::TYPES);
            $table->timestamp('date_vaccination');
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
        Schema::dropIfExists('applications');
    }
}
