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

class CreateContentBodiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('content_bodies', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            // Identify the Content Body
            $table->increments('id');

            $table->integer('id_content')->unsigned();
            $table->foreign('id_content')->references('id')
                  ->on('content_heads')->onUpdate('cascade')->onDelete('no action');

            $table->integer('id_revision')->unsigned();
            $table->foreign('id_revision')->references('id')
                  ->on('content_revisions')->onUpdate('cascade')->onDelete('cascade');
                  // @think: Should it update with the Revision?

            // Add Language Fields
            Multilingual::addLanguages($table);

            $table->string('title', 100);
            $table->string('subtitle', 100);
            $table->string('title_window', 100);
            $table->string('title_menu', 100);

            $table->string('uri_short', 100);
            $table->string('uri_long', 100);

            $table->string('preview', 300);
            $table->text('content');

            $table->string('seo_keywords', 100);
            $table->string('seo_description', 100);
            $table->string('seo_schema', 100);
            $table->json('seo_schema_data')->nullable();
            $table->smallInteger('seo_priority')->nullable();

            // Extended informations
            $table->json('extends')->nullable();

            $table->softDeletes();

            // Indexes
            $table->index('id_content', 'IDX_CONTENT_HEAD');
            $table->index('id_revision', 'IDX_CONTENT_REVISION');
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
        Schema::dropIfExists('content_bodies');
    }
}
