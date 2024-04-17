<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAirlineCompanyIdToUsersTable extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('airline_company_id')->nullable()->after('remember_token');
            $table->foreign('airline_company_id')->references('id')->on('airline_companies')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['airline_company_id']);
            $table->dropColumn('airline_company_id');
        });
    }
}
