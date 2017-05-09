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

namespace Tests\Unit\Database\Contents;

use Ionize\Database\Contents\ContentRepository;
use Tests\TestCase;
use Mockery;

/**
 * Class ContentsTest
 * @package Tests\Unit\Database\Contents
 * @author: Ádám Liszkai <adaliszk@gmail.com>
 * @since: 2017.05.08.
 */
class ContentRepositoryTest extends TestCase
{
    public function tearDown()
    {
        parent::tearDown();
        Mockery::close();
    }

    /**
     * Data Provider for Collection
     *
     * @return array
     */
    public function contentDataProvider()
    {
        return [
            'Content#1' =>  [1, (object) [
                'id'        =>  1,
                'name'      =>  'home',
                'uri_short' =>  '/',
                'uri_long'  =>  '/home'
            ]],
            'Content#2' =>  [2, (object) [
                'id'        =>  2,
                'name'      =>  'article-1',
                'uri_short' =>  '/article-1',
                'uri_long'  =>  '/topic/article-1'
            ]],
            'Content#3' =>  [3, (object) [
                'id'        =>  3,
                'name'      =>  'contact',
                'uri_short' =>  '/contact',
                'uri_long'  =>  '/contact'
            ]]
        ];
    }

    /**
     * Mocking Collection
     *
     * @param array $datas
     * @return Mockery\MockInterface
     */
    private function getCollectionMock($datas)
    {
        $mock = Mockery::mock('Illuminate\Support\Collection');
        $mock->shouldReceive('count')->once()->andReturn(1);
        $mock->shouldReceive('all')->once()->andReturn($datas);

        return $mock;
    }

    /**
     * Asserting an Iterable
     *
     * @param $object
     * @param null|string $message
     */
    private function assertIterable($object, ?string $message=NULL)
    {
        $this->assertTrue(is_iterable($object), $message);
        $this->assertNotEmpty($object, $message);
    }

    /**
     *
     * @param int $id
     * @param object $data
     *
     * @dataProvider contentDataProvider
     * @test
     */
    public function canGetById(int $id, $data)
    {
        $contentDatas = [$data];
        $content = $this->getCollectionMock($contentDatas);

        $contentModel = Mockery::mock('Ionize\Database\Contents\Content');
        $contentModel->shouldReceive('getById')->once()
                     ->andReturn($content);

        /** @noinspection PhpParamsInspection */
        $contentRepository = new ContentRepository($contentModel);

        $contents = $contentRepository->getById($id);

        $this->assertIterable($contents, get_class($contentRepository).' is not Iterable!');
    }

    /**
     *
     * @param int $id
     * @param object $data
     *
     * @dataProvider contentDataProvider
     * @test
     */
    public function canGetByName(int $id, $data)
    {
        $contentDatas = [$data];
        $content = $this->getCollectionMock($contentDatas);

        $contentModel = Mockery::mock('Ionize\Database\Contents\Content');
        $contentModel->shouldReceive('getByName')->once()
            ->andReturn($content);

        /** @noinspection PhpParamsInspection */
        $contentRepository = new ContentRepository($contentModel);

        $contents = $contentRepository->getByName($data->name);

        $this->assertIterable($contents, get_class($contentRepository).' is not Iterable!');
    }

    /**
     *
     * @param int $id
     * @param object $data
     *
     * @dataProvider contentDataProvider
     * @test
     */
    public function canGetByShortURL(int $id, $data)
    {
        $contentDatas = [$data];
        $content = $this->getCollectionMock($contentDatas);

        $contentModel = Mockery::mock('Ionize\Database\Contents\Content');
        $contentModel->shouldReceive('getByURI')->once()
            ->andReturn($content);

        /** @noinspection PhpParamsInspection */
        $contentRepository = new ContentRepository($contentModel);

        $contents = $contentRepository->getByURI($data->uri_short);

        $this->assertIterable($contents, get_class($contentRepository).' is not Iterable!');
    }
}
/* End of file ContentsTest.php */
/* Location: Tests\Unit\Database\Contents */
