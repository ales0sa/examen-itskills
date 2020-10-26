<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->enum('letter', ['A', 'B', 'C']);
            $table->enum('type', ['Factura', 'Credito', 'Debito']);
            $table->enum('document_type', ['D.N.I', 'C.U.I.T', 'C.I.', 'L.E.', 'L.C.', 'C.U.I.L']);
            $table->biginteger('document_number');
            $table->enum('impositive_profile', ['Responsable inscripto', 'Responsable monotributo', 'Consumidor final', 'Exento']);
            $table->string('social_reason');
            $table->string('observation')->nullable();
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
        Schema::dropIfExists('invoices');
    }
}
