<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->string('profile_photo_path', 2048)->nullable();
            $table->string('tc_kimlik');
            $table->string('mezuniyet_yili');
            $table->string('sehir');
            $table->string('calistigi_yer')->nullable();
            $table->string('pozisyon')->nullable();
            $table->string('medeni_durumu')->nullable();
            $table->string('tel_no');
            $table->integer('fakulte_id');
            $table->integer('bolum_id');

            $table->string('image')->nullable();
            //seçilebilir her sayı bir durumu gösteriyor
            $table->tinyInteger('is_admin')->default(0)->comment('0:User 1:Admin');
            $table->tinyInteger('onay')->default(0)->comment('0 : Onaysız 1 : Onaylı');
            $table->timestamps();
        });
        \Illuminate\Support\Facades\DB::table('users')->insert([
            'name' => "Admin",
            'email' => "admin@firat.edu.tr",
            'password' => bcrypt(10101010),
            'tc_kimlik' => "0",
            'mezuniyet_yili' => "0",
            'sehir' => "0",
            'tel_no' => "0",
            'fakulte_id' => 0,
            'bolum_id' =>0,
            'is_admin' => 1,
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}

