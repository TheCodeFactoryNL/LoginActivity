<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('failed_logins', function (Blueprint $table) {
            $table->id();
            $table->string('email')->index();
            $table->string('ip_address')->nullable();
            $table->string('device_info')->nullable();
            $table->timestamp('attempted_at')->useCurrent();
        });
    }

    public function down()
    {
        Schema::dropIfExists('failed_logins');
    }
};