<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->integer('id')->unsigned();
            $table->bigInteger('pitch_id')->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->date('date');
            $table->enum('hour', ['9', '10', '11', '12', '17', '18', '19', '20', '21']);
            $table->primary(['id', 'pitch_id', 'date', 'hour']);
            $table->string('owner_name');
            $table->string('owner_email');
        });

        DB::statement('ALTER TABLE bookings MODIFY id INTEGER NOT NULL AUTO_INCREMENT');

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookings');
    }
}
