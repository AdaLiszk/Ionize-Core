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

namespace Tests\Documentation;

use Tests\TestCase;

/**
 * Class MarkupTest
 * @package Tests\Documentation
 * @author: Ádám Liszkai <adaliszk@gmail.com>
 * @since: 2017.04.27.
 */
class MarkupTest extends TestCase
{
    /**
     * Provide md files list based on the sitemap.md
     * return array
     */
    public function linksProvider() : array
    {
        $sitemap = file_get_contents(__DIR__ . '/../../docs/sitemap.md');
        preg_match_all('/\[([^\]]+)\]\(([^\)]+)\)/', $sitemap, $matches);

        $links = [];

        foreach ($matches[1] as $idx => $name) {
            if (strpos($name, '![') !== false)
            {
                continue;
            }

            $links[$name] = [ $name, $matches[2][$idx] ];
        }

        return $links;
    }

    /**
     *
     * @dataProvider linksProvider
     * @test
     * @param string $name
     * @param string $path
     */
    public function checkLinks(string $name, string $path)
    {
        $realpath = realpath(__DIR__.'/../../docs/').'/'.$path;
        $location = explode('#', $realpath);

        $filename = $location[0];
        $hash = isset($location[1]) ? $location[1] : '';

        $message = "{$name} link is 404: {$filename}";
        $this->assertFileExists($filename, $message);

        if (!empty($hash))
        {
            $fileContent = file_get_contents($filename);
            if (strpos($fileContent, '<a name="'.$hash.'"></a>') === false)
            {
                $message = "{$name} link is pointing an undefined anchor: #{$hash} in file {$filename}";
                $this->fail($message);
            }
        }
    }
}
/* End of file MarkupTest.php */
/* Location: Tests\Documentation */
