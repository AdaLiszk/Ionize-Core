<?php
/*
 * The MIT License (MIT) Copyright (C) 2009-2017 Ionize Team
 *
 * Permission is hereby granted, free of charge, to any person  obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without  restriction, including without limitation the rights
 * to use,  copy,  modify,  merge, publish,  distribute, sublicense, and/or sell
 * copies  of  the  Software, and  to  permit  persons  to whom  the Software is
 * furnished to do so, subject to the following conditions:
 *
 * 1. The above copyright  notice and this  permission notice  shall be included
 *    in all copies or substantial portions of the Software.
 *
 * 2. In the case ionize is  used by a company  for its own  clients,  it is not
 *    permitted  to suggest that  ionize is  the property  of the  company or to
 *    suggest that  Ionize  has been  created and  developed  by any other  team
 *    than the official Ionize team, (members listed on the website).
 *
 * THE SOFTWARE IS PROVIDED "AS IS",  WITHOUT WARRANTY  OF ANY KIND,  EXPRESS OR
 * IMPLIED,  INCLUDING  BUT NOT  LIMITED  TO THE WARRANTIES  OF MERCHANTABILITY,
 * FITNESS FOR A  PARTICULAR  PURPOSE AND NONINFINGEMENT.  IN NO EVENT SHALL THE
 * AUTHORS OR  COPYRIGHT HOLDERS  BE LIABLE  FOR ANY  CLAIM,  DAMAGES  OR  OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
 * SOFTWARE.
 */

namespace Tests\Unit\Controllers;

use Tests\TestCase;

/**
 * Class OutputTest
 * @package Tests\Unit\Controllers
 * @author: Ádám Liszkai <adaliszk@gmail.com>
 * @since: 2017.04.25.
 */
class OutputTest extends TestCase
{
    /**
     * It should print out at least something to the user, so let's check that real quick.
     *
     * @test
     */
    public function isDoingSomething()
    {
        $this->get('/');
        $this->assertNotEmpty(
            $this->response->getContent(),
            'Empty Output, we should print out something to the user by default!'
        );
    }
}
/* End of file OutputTest.php */
/* Location: Tests\Unit\Controllers */
