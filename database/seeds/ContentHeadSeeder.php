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

/**
 * Class ContentSeeder
 * @author: Ádám Liszkai <adaliszk@gmail.com>
 * @since: 2017.05.01.
 */
class ContentHeadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $lipsum = file_get_contents('http://loripsum.net/api/3/verylong/plaintext');
        preg_match_all('/(\w+)/', $lipsum, $matches);
        $titles = array_chunk($matches[1],7);

        foreach ($titles as $titleWords)
        {
            $title = implode(' ', $titleWords);
            $name = str_replace(' ', '-', strtolower(trim($title)));

            DB::table('content_heads')->insert([
                'name' => $name,
                'id_author' => 1,
                'scope' => "/{$name}/"
            ]);
        }

        $this->call('ContentBodySeeder');
    }
}
/* End of file ContentSeeder.php */
/* Location: Database\Seeders */
