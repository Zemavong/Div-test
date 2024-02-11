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
        Schema::create('user_requests', function (Blueprint $table) {
            $table->id()->comment('Уникальный идентификатор');
            $table->foreignId('user_id')->references('id')->on('users')->comment('ID пользователя');
            $table->enum('status', ['active', 'resolved'])->default('active')->comment('Статус заявки');
            $table->string('message')->nullable('false')->comment('Сообщение пользователя');
            $table->string('comment')->nullable('true')->comment('Ответ ответственного лица');
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
        Schema::dropIfExists('user_requests');
    }
};
