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
            $table->bigIncrements('id');//
            $table->string('invoice_number', 50); // #invoice
            $table->date('invoice_Date')->nullable();//Data of create invoice
            $table->date('Due_date')->nullable();// date الاستحقاق
            $table->string('product', 50);
            $table->bigInteger( 'section_id' )->unsigned(); // القسم
            //$table->foreign('section_id')->references('id')->on('sections')->onDelete('cascade');
            $table->decimal('Amount_collection',8,2)->nullable();;
            $table->decimal('Amount_Commission',8,2);
            $table->decimal('Discount',8,2); // الخصم
            $table->decimal('Value_VAT',8,2); // قيمه الضريبة
            $table->string('Rate_VAT', 999);// نسبة الضريبة
            $table->decimal('Total',8,2); // المجموع
            $table->string('Status', 50);//
            $table->integer('Value_Status');// 1  مدفوعه غير مدفوعه  جزئيا 2 3
            $table->text('note')->nullable();
            $table->date('Payment_Date')->nullable();
            $table->softDeletes();
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
