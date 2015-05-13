<?php
/**
 * Created by PhpStorm.
 * User: jabedbangali
 * Date: 5/14/15
 * Time: 12:29 AM
 */

namespace App\Decorators\Cache;


use App\Repositories\News\NewsRepository;
use Illuminate\Contracts\Cache\Repository as Cache;

class NewsCache extends BaseCache implements NewsRepository{

    protected $baseCacheKey = 'news';

    function __construct(Cache $cache, NewsRepository $model)
    {
        parent::__construct($cache,$model);
    }

}