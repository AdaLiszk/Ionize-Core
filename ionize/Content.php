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

namespace Ionize;

use Ionize\Illuminate\Database\Model as DatabaseModel;

/**
 * Content Handler
 *
 * @package Ionize
 * @author: Ádám Liszkai <adaliszk@gmail.com>
 * @since: v2.0.0
 */
class Content
{
    protected $id = null;

    protected $data = [];

    public function __construct(array $data = [])
    {
        if (!empty($data))
        {
            $this->initialize($data);
        }
    }

    private function initialize(array $data)
    {
        $this->id = $data['id'];
        $this->data = $data;
    }

    public function getById(int $id)
    {
        $result = Database\Contents::where('id', $id)->get();
        if ($result->count()>0)
        {
            $data = $result->get(0)->getAttributes();
            $this->initialize((array)$data);
        }

        return $this;
    }

    public function __get($name)
    {
        if (isset($this->data[$name]))
        {
            return $this->data[$name];
        }

        return null;
    }

    public function __toString()
    {
        return (string) $this->data['body'] ?? '';
    }
}
/* End of file: Content.php */
/* Location: Ionize */
