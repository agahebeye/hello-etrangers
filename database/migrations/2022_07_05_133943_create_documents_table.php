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
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->string('mother_firstname');
            $table->string('mother_lastname');
            $table->string('father_firstname');
            $table->string('father_lastname');
            $table->string('birth');
            $table->string('gender');
            $table->string('marital_status');
            $table->string('citizenship');
            $table->string('profession');
            $table->string('passport_number');
            $table->string('passport_issue');
            $table->timestamp('passport_validity');
            $table->string('stay_purpose');
            $table->string('person_reference');
            $table->timestamp('arrival_date')->nullable();
            $table->string('current_occupation');
            $table->string('stay_duration');
            $table->tinyInteger('has_been');
            $table->timestamp('has_been_period')->nullable();
            $table->string('visa_kind');
            $table->timestamp('validated_at')->nullable();

            $table->foreignId('user_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('documents');
    }
};
