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

namespace Ionize\Database\Contents;

use Illuminate\Support\Facades\Cache;
use Ionize\Illuminate\Contents\Contents as ContentsInterface;
use Ionize\Illuminate\Iterating;


/**
 * Database Model for Contents Handling
 *
 * @project: IonizeCMS
 * @homepage: https://ionizecms.com
 *
 * @package: Ionize\Database
 * @author: Ádám Liszkai <adaliszk@gmail.com>
 * @since: v2.0.0
 *
 * @inheritdoc
 */
class ContentRepository implements ContentsInterface
{
    use Iterating;

    private $db;

    public function __construct(Content $databaseModel)
    {
        $this->db = $databaseModel;
    }

    public function getByName(string $name): iterable
    {
        $result = $this->db->getByName($name);

        if ($result->count() > 0)
        {
            foreach($result->all() as $item)
            {
                $this->items[] = $item;
            }
        }

        return $this;
    }

    public function getByURI(string $uri): iterable
    {
        $result = $this->db->getByURI($uri);

        if ($result->count() > 0)
        {
            foreach($result->all() as $item)
            {
                $this->items[] = $item;
            }
        }

        return $this;
    }

    public function getById(int $id): iterable
    {
        $result = $this->db->getById($id);

        if ($result->count() > 0)
        {
            foreach($result->all() as $item)
            {
                $this->items[] = $item;
            }
        }

        return $this;
    }
}
/* End of file: Contents.php */
/* Location: Ionize\Database */
