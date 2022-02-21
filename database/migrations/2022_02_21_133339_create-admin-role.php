<?php

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $user = new User();

        $user->name = "Super Admin";
        $user->email = "admin@admin.com";
        $user->phone = "07061246688";
        $user->user_type =  true;
        $user->email_verified_at = Carbon::now();
        $user->password =  bcrypt('password');
        $user->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};