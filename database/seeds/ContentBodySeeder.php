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

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * Class ContentSeeder
 * @author: Ádám Liszkai <adaliszk@gmail.com>
 * @since: 2017.05.01.
 */
class ContentBodySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $heads = DB::table('content_heads')->get();
        $firstContent = true;

        foreach ($heads as $head) {

            $id_revision = DB::table('content_revisions')->insertGetId([
                'id_content'    =>  $head->id,
                'revision'      =>  1,
                'id_author'     =>  $head->id_author,
                'accepted'      =>  true,
            ]);

            // Save the current Revision
            DB::table('content_heads')->where('id', $head->id)->update(['id_revision' => $id_revision]);

            $title = str_replace('-',' ', ucfirst($head->name));
            $content = file_get_contents('http://loripsum.net/api/5/verylong/headers/link/ul/bq/prude');

            DB::table('content_bodies')->insert([
                'id_content'    =>  $head->id,
                'id_revision'   =>  $id_revision,
                'id_language'   =>  1,
                'language'      =>  'en_GB',
                'title'         =>  $title,
                'uri_short'     =>  $firstContent ? '/' : "/{$head->name}",
                'uri_long'      =>  "/{$head->name}",
                'content'       =>  $content
            ]);

            // Insert Short URL
            DB::table('urls')->insert([
                'id_language'   =>  1,
                'language'      =>  'en_GB',
                'uri'           =>  $firstContent ? '/' : "/{$head->name}",
                'id_content'    =>  $head->id,
            ]);

            // Insert Long URL
            DB::table('urls')->insert([
                'id_language'   =>  1,
                'language'      =>  'en_GB',
                'uri'           =>  "/{$head->name}",
                'id_content'    =>  $head->id,
            ]);

            $firstContent = false;
            //usleep(10);
        }
    }
}
/* End of file ContentSeeder.php */
/* Location: Database\Seeders */
