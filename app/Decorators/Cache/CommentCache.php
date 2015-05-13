<?php
/**
 * Created by PhpStorm.
 * User: jabedbangali
 * Date: 5/14/15
 * Time: 1:04 AM
 */

namespace App\Decorators\Cache;


use App\Repositories\Comment\CommentRepository;
use Illuminate\Contracts\Cache\Repository as Cache;

class CommentCache extends  BaseCache implements CommentRepository{

    protected $baseCacheKey = 'comments';

    function __construct(Cache $cache, CommentRepository $model)
    {
        parent::__construct($cache,$model);
    }
}