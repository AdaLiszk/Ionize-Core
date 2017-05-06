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
 * Class LanguageSeeder
 * @author: Ádám Liszkai <adaliszk@gmail.com>
 * @since: 2017.04.30.
 */
class LanguageSeeder extends Seeder
{
    private $languages = [
        'en_GB'     =>  'en',
        'fr_FR'     =>  'fr',
        'de_DE'     =>  'de',
        'hu_HU'     =>  'hu',
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $firstRecord = true;
        foreach ($this->languages as $name => $uri) {
            DB::table('languages')->insert([
                'name' => $name,
                'uri' => $uri,
                'ordering' => 0,
                'default' => $firstRecord
            ]);

            $firstRecord = false;
        }
    }
}
/* End of file LanguageSeeder.php */
/* Location: Database\Seeders */
