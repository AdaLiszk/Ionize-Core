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

class CreateContentRevisionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('content_revisions', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            // Identify the Revision
            $table->increments('id');
            $table->integer('id_content')->unsigned();
            $table->foreign('id_content')->references('id')
                  ->on('content_heads')->onUpdate('cascade')->onDelete('no action');
            $table->integer('revision')->unsigned()->default(0);

            // Author information
            $table->integer('id_author')->unsigned()->nullable();
            $table->foreign('id_author')->references('id')
                  ->on('users')->onUpdate('cascade')->onDelete('no action');

            $table->string('author', 20)->nullable();
            $table->foreign('author')->references('name')
                  ->on('users')->onUpdate('cascade')->onDelete('no action');

            $table->timestamp('created_at')->nullable();

            $table->boolean('accepted')->default(false);

            // Filter the searchable contents by this field
            $table->boolean('indexed')->default(true);

            // for adding custom hook functionality to the frontend
            $table->string('flag', 30)->nullable();

            // Extended informations
            $table->json('extends')->nullable();

            $table->softDeletes();

            // Unique keys
            $table->unique(['id_content','revision'], 'UNQ_CONTENT_REVISION');

            // Indexes
            $table->index('revision', 'IDX_CONTENT_REVISION');
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
        Schema::dropIfExists('content_revisions');
    }
}
