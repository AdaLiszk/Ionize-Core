<?php
/*
 * The MIT License (MIT)
 *
 * Copyright (C) 2009-2017 IonizeCMS Team <team@ionizecms.com>
 *
 * Permission is hereby granted,  free of charge,  to any person  obtaining a copy
 * of this software  and associated documentation files  (the "Software"), to deal
 * in the Software  without restriction,  including without limitation  the rights
 * to use,  copy,  modify,  merge,  publish,  distribute,  sublicense, and/or sell
 * copies  of  the  Software, and to  permit  persons  to  whom  the  Software  is
 * furnished to do so, subject to the following conditions:
 *
 * The above  copyright notice  and this  permission  notice  shall be included in
 * all copies  or substantial  portions of the Software.
 *
 * In the case the  software is used  by a  company for its own clients, it is not
 * permitted to  suggest that the  software is the  property of  the company or to
 * suggest  that the  software has  been created  and  developed by any other team
 * than the copyright holder.
 *
 * THE SOFTWARE  IS PROVIDED  "AS IS",  WITHOUT WARRANTY  OF ANY KIND,  EXPRESS OR
 * IMPLIED,  INCLUDING  BUT NOT  LIMITED TO  THE  WARRANTIES  OF  MERCHANTABILITY,
 * FITNESS FOR A  PARTICULAR  PURPOSE AND  NONINFINGEMENT.  IN NO  EVENT SHALL THE
 * AUTHORS  OR COPYRIGHT  HOLDERS  BE  LIABLE  FOR  ANY CLAIM,  DAMAGES  OR  OTHER
 * LIABILITY,  WHETHER IN AN  ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR  IN CONNECTION  WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
 * SOFTWARE.
 *
 */

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Ionize\Illuminate\Database\Migration\Multilingual;

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
            $table->engine = 'InnoDB';

            // Identify the User
            $table->increments('id');
            $table->string('login', 30);
            $table->string('email', 60);
            // @think: Secondary Email addresses?

            // Authenticate the User
            $table->string('password', 300);
            $table->string('hash', 50);
            $table->json('tokens')->nullable();

            // Re-Auth the User
            $table->rememberToken();

            // Basic information
            $table->string('name', 90)->nullable();
            $table->string('forname', 30)->nullable();
            $table->string('lastname', 30)->nullable();
            $table->timeTz('timezone')->nullable();
            $table->enum('gender', ['w','m'])->nullable();
            $table->date('birthday')->nullable();

            // Status information
            $table->timestamp('registered')->nullable();
            $table->dateTime('activated')->nullable();
            $table->dateTime('last_login')->nullable();
            $table->ipAddress('last_ip')->nullable();
            $table->smallInteger('login_try')->unsigned()->default(0);
            $table->dateTime('deactivated')->nullable();

            // User Role
            $table->integer('id_role')->unsigned()->nullable();
            $table->foreign('id_role')->references('id')
                  ->on('roles')->onUpdate('cascade')->onDelete('cascade');

            $table->string('role', 20)->nullable();
            $table->foreign('role')->references('name')
                  ->on('roles')->onUpdate('cascade')->onDelete('cascade');

            // User Language
            Multilingual::addLanguages($table);

            // Extended informations
            $table->json('extends')->nullable();

            // Unique keys
            $table->unique('login', 'UNQ_USER_LOGIN');
            $table->unique('email', 'UNQ_USER_EMAIL');

            // Search indexes
            $table->index(['name','forname','lastname'], 'IDX_USER_NAMES');
            $table->index('role', 'IDX_USER_ROLE');
            $table->index('language', 'IDX_USER_LANGUAGE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('users');
    }
}
