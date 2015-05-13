<?php
/**
 * Created by PhpStorm.
 * User: jabedbangali
 * Date: 5/14/15
 * Time: 2:28 AM
 */

namespace App\Decorators\Cache;


use App\Repositories\User\UserRepository;
use Illuminate\Contracts\Cache\Repository as Cache;

class UserCache extends BaseCache implements UserRepository{

    protected $baseCacheKey = 'users';

    function __construct(Cache $cache, UserRepository $model)
    {
        parent::__construct($cache,$model);
    }
}