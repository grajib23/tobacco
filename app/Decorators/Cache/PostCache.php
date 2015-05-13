<?php
/**
 * Created by PhpStorm.
 * User: jabedbangali
 * Date: 5/13/15
 * Time: 11:52 PM
 */

namespace App\Decorators\Cache;


use App\Repositories\Post\PostRepository;
use Illuminate\Contracts\Cache\Repository as Cache;

class PostCache extends BaseCache implements PostRepository{

    protected $baseCacheKey = 'posts';

    function __construct(Cache $cache, PostRepository $model)
    {
        parent::__construct($cache,$model);
    }

}